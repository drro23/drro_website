<template>
    <div id="app-container">
        <div class="drro-notifs">
            <NotificationAlert
                v-for="notif in notifications"
                :key="notif.id"
                :id="notif.id"
                :type="notif.type"
                :message="notif.message"
            />
        </div>
        <div id="explore-projects">
            <div class="projects-container">
                <HelloUser />
                <AvailableProjects />
            </div>
        </div>
        <div id="edit-projects-view">
            <div id="project-view">
                <v-container fluid>
                    <div class="edit-view-container">
                        <ReturnEditModeButton />
                        <AddNewProjectButton />
                        <ProjectViewHeader />
                        <div class="form-container">
                            <ProjectForm />
                        </div>
                    </div>

                    <DeleteProjectButton />
                </v-container>
            </div>
        </div>
    </div>
</template>

<script>
import HelloUser from "./components/HelloUser.vue";
import AvailableProjects from "./components/AvailableProjects.vue";
import AddNewProjectButton from "./components/AddNewProjectButton.vue";
import DeleteProjectButton from "./components/DeleteProjectButton.vue";
import ProjectForm from "./components/ProjectForm.vue";
import ProjectViewHeader from "./components/ProjectViewHeader.vue";
import ReturnEditModeButton from "./components/ReturnEditModeButton.vue";
import NotificationAlert from "./components/NotificationAlert.vue";
import { mapActions, mapGetters } from "vuex";

export default {
    name: "ConsoleDrro",
    components: {
        HelloUser,
        AvailableProjects,
        AddNewProjectButton,
        DeleteProjectButton,
        ProjectViewHeader,
        ProjectForm,
        ReturnEditModeButton,
        NotificationAlert
    },
    computed: {
      ...mapGetters(["getErrors", "getNotifications"]),
      notifications() {
        if (this.getNotifications !== undefined)
          return this.getNotifications;
        else
          return [];
      }
    },
    methods: {
        ...mapActions(["fetchProjects", "fetchUser"])
    },
    created() {
        this.fetchUser();
        this.fetchProjects();
    }
};
</script>

<style scoped>
.drro-notifs {
    display: table-column;
    position: fixed;
    right: 10px;
    top: 10px;
    z-index: 1;
}

#app-container {
    height: 100%;
    display: flex;
    background-color: #252a41;
}

#explore-projects {
    padding-top: 40px;
    width: 50vw;
}

#edit-projects-view {
    width: 50vw;
    padding: 8px;
}

.projects-container {
    width: 50%;
    margin: auto;
}

#project-view {
    position: relative;
    width: 100%;
    height: 100%;
    background-color: white;
    border-radius: 15px;
    color: black !important;
}

.edit-view-container {
    margin-top: 20px;
}

.form-container {
    width: 60%;
    margin: 60px auto 0 auto;
}
</style>
