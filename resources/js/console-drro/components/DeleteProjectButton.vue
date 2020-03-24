<template>
  <div class="delete-project-btn">
    <!-- <v-btn
        v-if="!getIsInCreationMode"
        absolute
        dark
        bottom
        right
        color="#FF5858"
        @click="deleteProject"
      >
        <v-icon>mdi-delete-alert</v-icon>
    </v-btn>-->
    <v-dialog v-model="dialog" persistent max-width="295">
      <template v-slot:activator="{ on }">
        <v-btn color="#FF5858" absolute dark bottom right v-on="on"><v-icon>mdi-delete-alert</v-icon></v-btn>
      </template>
      <v-card>
        <v-card-title class="headline"><span class="deleted-project">{{ getSelectedProject.title }}</span></v-card-title>
        <v-card-text>Vous êtes sûr de vouloir supprimer ce projet ?</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="dialog = false">Annuler</v-btn>
          <v-btn color="red darken-1" text @click="deleteProject()">Supprimer</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "DeleteProjectButton",
  computed: mapGetters(["getIsInCreationMode", "getSelectedProject"]),
  data() {
    return {
      dialog: false,
    };
  },
  methods: {
    ...mapActions(["removeProject"]),
    deleteProject() {
      this.dialog = false;
      this.removeProject(this.getSelectedProject.id);
    }
  }
};
</script>

<style scoped>
.delete-project-btn {
  bottom: 20;
  right: 20;
}
.deleted-project {
  font-weight: bold;
}
</style>