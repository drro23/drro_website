import { v1 as uuidv1 } from 'uuid';

const state = {
    projects: [{
        title: '',
        description: '',
    }],
    user: {
        id: '',
        name: ''
    },
    isInCreationMode: false,
    selectedProject: {
        title: '',
        description: '',
    },
    categories: {
        id: '',
        label: ''
    },
    errors: {
        tags: false,
        error: false,
        success: false
    },
    notifications: [],
};

const getters = {
    allProjects: state => state.projects,
    getCategories: state => state.categories,
    getUser: state => state.user,
    getSelectedProject: state => state.selectedProject,
    getIsInCreationMode: state => state.isInCreationMode,
    getErrors: state => state.errors,
    getNotifications: state => state.notifications,
};

const actions = {
    async fetchProjects({ commit }) {
        await window.axios.get("/api/projects/").then(response => {
            commit('setProjects', response.data);
        });
    },
    async fetchUser({ commit }) {
        await window.axios.get("/api/user").then(response => {
            commit('setUser', response.data);
        });
    },
    changeSelectedProject({ commit }, projectID) {
        commit('setSelectedProject', projectID);
    },
    updateIsInCreationMode({ commit }, isInCreationMode) {
        commit('setIsInCreationMode', isInCreationMode);
    },
    addTag({ commit }, tag) {
        commit('addTag', tag);
    },
    removeTag({ commit }, tag) {
        commit('removeTag', tag);
    },
    tagError({ commit }, value) {
        commit('setTagError', value);
    },
    async addProject({ commit }, project) {
        let config = {
            headers: { 'Content-Type': 'multipart/form-data' },
            _method: 'put'
        };
        await window.axios.post('/api/projects/', project, config).then(response => {
            commit('updateProjects', response.data);
            commit('addNewNotification', {type: 'success', message: 'Le projet à bien été crée !'});
        }).catch(error => console.log(error));

    },
    async updateProject({ commit }, { id, data }) {
        let config = { headers: { 'Content-Type': 'multipart/form-data' } };
        await window.axios.post(`/api/projects/${id}`, data, config).then(response => {
            commit('updateProjects', response.data.projects);
            commit('addNewNotification', {type: 'info', message: 'Le projet à bien été mis à jour !'});
        }).catch(error => console.log(error));
    },
    async removeProject({ commit }, projectID) {
        await window.axios.delete(`/api/projects/${projectID}`).then(response => {
            commit('updateProjects', response.data);
            commit('addNewNotification', {type: 'success', message: 'Le projet à bien été supprimer'});
        }).catch(error => console.log(error));

    },
};

const mutations = {
    setProjects: (state, payload) => {
        let projects = payload.projects;
        for (let i = 0; i < projects.length; i++) {
            projects[i].used_techs = JSON.parse(projects[i].used_techs);
        }
        state.projects = projects;
        state.categories = payload.categories;
        // Default selected project
        if (state.projects !== undefined && state.projects[0] !== undefined)
            state.selectedProject = Object.assign({}, projects[0]);
    },
    setUser: (state, payload) => (state.user = payload),
    setSelectedProject: (state, payload) => {
        let newSelectedProject = {};
        for (let i = 0; i < state.projects.length; i++) {
            if (state.projects[i].id === payload)
                newSelectedProject = Object.assign({}, state.projects[i]);
        }
        state.selectedProject = Object.assign({}, newSelectedProject);
    },
    setIsInCreationMode: (state, payload) => (state.isInCreationMode = payload),
    setTagError: (state, payload) => {
        let errors = Object.assign({}, state.errors);
        errors.tags = payload;
        state.errors = Object.assign({}, errors);
        setTimeout(() => {
            errors.tags = false;
            state.errors = Object.assign({}, errors);
        }, 3000);
    },
    addTag: (state, payload) => {
        let updateSelectedProject = state.selectedProject;
        let duplicate = false;
        updateSelectedProject.used_techs.forEach(tech => {
            if (tech.name === payload) {
                let notif = {
                    id: uuidv1(),
                    type: 'warning',
                    message: 'Vous ne pouvez pas ajouter le même tag !'
                }
                state.notifications = [...state.notifications, notif];
                duplicate = true;
            }

        });
        if (!duplicate) {
            updateSelectedProject.used_techs = [...updateSelectedProject.used_techs, { "name": payload }];
            state.selectedProject = Object.assign({}, updateSelectedProject);
        }
    },
    removeTag: (state, payload) => {
        let updateSelectedProject = state.selectedProject;
        updateSelectedProject.used_techs = updateSelectedProject.used_techs.filter(tech => tech.name !== payload);
        state.selectedProject = Object.assign({}, updateSelectedProject);
    },
    updateProjects: (state, payload) => {
        let projects = payload;
        for (let i = 0; i < projects.length; i++) {
            projects[i].used_techs = JSON.parse(projects[i].used_techs);
        }
        state.projects = [...projects];
        if (state.projects !== undefined && state.projects[0] !== undefined)
            state.selectedProject = Object.assign({}, projects[0]);
        if (state.isInCreationMode)
            state.isInCreationMode = false;
    },
    addNewNotification: (state, {type, message}) => {
        let notif = {
            id: uuidv1(),
            type: type,
            message: message
        }
        state.notifications = [...state.notifications, notif]
    },
    removeNotification: (state, payload) => {
        let notifications = [...state.notifications];
        let removIndex = null;
        notifications.forEach((notif, index) => {
            if (notif.id === payload) {
                removIndex = index;
            }
        });
        if (removIndex !== null) {
            notifications.splice(removIndex, 1);
            state.notifications = [...notifications];
        }
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}