<template>
  <v-form ref="form" id="creation-form">
    <v-text-field
      v-model="title"
      :counter="50"
      :rules="titleRules"
      label="Titre"
      required
      outlined
      dense
    ></v-text-field>
    <v-text-field
      v-model="description"
      :counter="150"
      :rules="descriptionRules"
      label="Description"
      required
      outlined
      dense
    ></v-text-field>
    <SimpleTagInput :tags="tags" :addNewTag="addNewTag" :removeTag="removeTag" />
    <v-file-input
      v-model="fileImage"
      :error="fileError"
      @change="updateFileError"
      :rules="imageRule"
      accept="image/*"
      prepend-icon="mdi-paperclip"
      label="Télécharger une image"
      show-size
    ></v-file-input>
    <v-text-field v-model="websiteURL" label="Website URL" required outlined dense></v-text-field>
    <v-text-field v-model="githubURL" label="Github URL" required outlined dense></v-text-field>
    <v-text-field v-model="videoURL" label="Video URL" required outlined dense></v-text-field>
    <v-select
      v-if="[categories] != undefined"
      v-model="category"
      :items="categories"
      item-text="text"
      item-value="value"
      label="Categorie"
      outlined
    ></v-select>
    <v-btn color="primary" class="validate-form-btn" @click.prevent="addNewProject()">Ajouter</v-btn>
  </v-form>
</template>

<script>
import SimpleTagInput from "./SimpleTagInput";
import { mapGetters, mapActions } from "vuex";

export default {
  name: "CreateProjectForm",
  components: {
    SimpleTagInput
  },
  data: () => {
    return {
      title: "",
      description: "",
      fileError: false,
      imageRule: [
        value =>
          !value ||
          value.size < 2000000 ||
          "La taille de l'image doit être inférieure à 2MB !"
      ],
      descriptionRules: [
        v => !!v || "La description est obligatoire",
        v =>
          (v && v.length <= 150) ||
          "La description doit faire moins de 150 caractères"
      ],
      titleRules: [
        v => !!v || "Le titre est obligatoire",
        v =>
          (v && v.length <= 50) || "Le titre dois faire moins de 50 caractères"
      ],
      websiteURL: "",
      githubURL: "",
      videoURL: "",
      tags: [],
      category: "",
      fileImage: null
    };
  },
  computed: {
    ...mapGetters(["getCategories"]),
    categories: function() {
      let categories = [];
      if (this.getCategories === undefined) return categories;
      for (let i = 0; i < this.getCategories.length; i++) {
        categories.push({
          text: this.getCategories[i].label,
          value: this.getCategories[i].id
        });
      }
      return categories;
    }
  },
  methods: {
    ...mapActions(["tagError", "addProject"]),
    addNewProject() {
      if (this.$refs.form.validate()) {
        let formData = new FormData();
        formData.set('title', this.title);
        formData.set('description', this.description);
        formData.set('used_techs', JSON.stringify(this.tags));
        formData.append('image', this.fileImage);
        formData.set('website_url', this.websiteURL);
        formData.set('github_url', this.githubURL);
        formData.set('video_url', this.videoURL);
        formData.set('category_id', this.category);
        this.addProject(formData);
      }
    },
    addNewTag(tag) {
      let duplicate = false;
      for (let i = 0; i < this.tags.length; i++) {
        if (this.tags[i].name === tag) {
          this.$store.commit('addNewNotification', {type: 'warning', message: 'Vous ne pouvez pas ajouter le même tag !'});
          duplicate = true;
        }
      }
      if (!duplicate) this.tags.push({ name: tag });
    },
    removeTag(tag) {
      for (let i = 0; i < this.tags.length; i++) {
        if (this.tags[i].name === tag) {
          this.tags.splice(i, 1);
          break;
        }
      }
    },
    updateFileError() {
      if (this.fileImage === null) {
        this.fileError = true;
      } else {
        this.fileError = false;
      }
    }
  }
};
</script>

<style>
.validate-form-btn {
  display: block;
  margin-right: auto;
  margin-left: auto;
  margin-top: 0;
}
</style>