<template>
  <div class="add-project-btn">
      <v-btn
        v-if="!getIsInCreationMode"
        absolute
        dark
        top
        right
        color="#228B22"
        @click="addNewProject"
      >
        <v-icon>mdi-plus</v-icon>
      </v-btn>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
  name: "AddNewProjectButton",
  computed: mapGetters(['getIsInCreationMode']),
  methods: {
    ...mapActions(['updateIsInCreationMode']),
    addNewProject() {
      this.updateIsInCreationMode(true);
    }
  }
}
</script>

<style scoped>
.add-project-btn {
    top: 20;
    right: 20;
}
</style>