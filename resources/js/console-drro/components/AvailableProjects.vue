<template>
  <div class="available-projects" v-if="allProjects">
    <v-text-field
      v-model="searchInput"
      prepend-inner-icon="mdi-search-web"
      hide-details
      single-line
      placeholder="Rechercher un projet"
      background-color="#3B3F54"
      solo
      clearable
      dark
    ></v-text-field>
    <h2 class="projects-counter">
      Projets
      <span class="counter">({{ allProjects.length }})</span>
    </h2>
    <div class="project-items">
      <ProjectItem
        v-for="project in searchedProjects"
        :key="project.id"
        :id="project.id"
        :name="project.title"
      />
    </div>
  </div>
</template>

<script>
import ProjectItem from "./ProjectItem.vue";
import { mapGetters } from "vuex";

export default {
  name: "AvailableProjects",
  components: {
    ProjectItem
  },
  data: () => {
    return {
      searchInput: ""
    };
  },
  computed: {
    ...mapGetters(["allProjects"]),
    searchedProjects() {
      if (this.searchInput === '' || this.searchInput === null) {
        return this.allProjects;
      } else {
        return this.allProjects.filter(project => project.title.toLowerCase().indexOf(this.searchInput) > -1);
      }
    }
  }
};
</script>

<style scoped>
.projects-counter {
  font-size: 1.7em;
  color: white;
  margin-top: 40px;
  margin-bottom: 20px;
}

.counter {
  color: #9e9e9e;
}

.project-items {
  display: grid;
  grid-template-columns: repeat(3, 2fr);
}
</style>
