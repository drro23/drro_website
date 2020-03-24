<template>
    <v-form ref="form">
        <v-text-field
            v-model="getSelectedProject.title"
            :value="projectCopy.title"
            :counter="50"
            :rules="titleRules"
            label="Titre"
            required
            outlined
            dense
        ></v-text-field>
        <v-text-field
            v-model="getSelectedProject.description"
            :value="projectCopy.description"
            :counter="150"
            :rules="descriptionRules"
            label="Description"
            required
            outlined
            dense
        ></v-text-field>
        <SimpleTagInput
            :tags="tags"
            :addNewTag="addTag"
            :removeTag="removeTag"
        />
        <v-img :src="projectCopy.image" width="auto" height="350"></v-img>
        <v-file-input
            id="fileImage"
            :rules="imageRule"
            accept="image/*"
            prepend-icon="mdi-paperclip"
            :placeholder="projectCopy.image"
            label="Télécharger une image"
            show-size
        ></v-file-input>
        <v-text-field
            v-model="getSelectedProject.website_url"
            :value="projectCopy.website_url"
            label="Website URL"
            required
            outlined
            dense
        ></v-text-field>
        <v-text-field
            v-model="getSelectedProject.github_url"
            :value="projectCopy.github_url"
            label="Github URL"
            required
            outlined
            dense
        ></v-text-field>
        <v-text-field
            v-model="getSelectedProject.video_url"
            :value="projectCopy.video_url"
            label="Video URL"
            required
            outlined
            dense
        ></v-text-field>
        <v-select
            v-if="[categories] != undefined"
            :items="categories"
            v-model="defaultCategory"
            item-text="text"
            item-value="value"
            label="Categorie"
            outlined
        ></v-select>
        <v-btn color="primary" class="validate-form-btn" @click="update()"
            >Mettre à jour</v-btn
        >
    </v-form>
</template>

<script>
import SimpleTagInput from "./SimpleTagInput";
import { mapGetters, mapActions } from "vuex";

export default {
    name: "EditProjectForm",
    components: {
        SimpleTagInput
    },
    data() {
        return {
            imageRule: [
                value =>
                    !value ||
                    value.size < 200000 ||
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
                    (v && v.length <= 50) ||
                    "Le titre dois faire moins de 50 caractères"
            ]
        };
    },
    computed: {
        ...mapGetters(["getCategories", "getSelectedProject"]),
        projectCopy: function() {
            return this.getSelectedProject !== undefined
                ? JSON.parse(JSON.stringify(this.getSelectedProject))
                : {};
        },
        tags: function() {
            if (this.getSelectedProject.used_techs === undefined) {
                return [];
            } else {
                return this.getSelectedProject.used_techs;
            }
        },
        categories: function() {
            let c = [];
            for (let i = 0; i < this.getCategories.length; i++) {
                c.push({
                    text: this.getCategories[i].label,
                    value: this.getCategories[i].id
                });
            }
            return c;
        },
        defaultCategory: {
            get() {
                let c;
                if (this.getSelectedProject.category === undefined) c = {};
                else
                    c = {
                        text: this.getSelectedProject.category.label,
                        value: this.getSelectedProject.category.id
                    };
                return c;
            },
            set(val) {
                let selectedCategory = {
                    text: this.getSelectedProject.category.label,
                    value: this.getSelectedProject.category.id
                };
                for (let i = 0; i < this.getCategories.length; i++) {
                    if (val === this.getCategories[i].id) {
                        this.getSelectedProject.category = {
                            id: this.getCategories[i].id,
                            label: this.getCategories[i].label
                        };
                        selectedCategory = {
                            text: this.getCategories[i].label,
                            value: this.getCategories[i].id
                        };
                    }
                }
                return selectedCategory;
            }
        }
    },
    methods: {
        ...mapActions(["addTag", "removeTag", "updateProject"]),
        update() {
            if (this.$refs.form.validate()) {
                let file = document.getElementById("fileImage").files[0];
                let updatedProject = Object.assign({}, this.getSelectedProject);
                let formData = new FormData();
                formData.set("title", updatedProject.title);
                formData.set("description", updatedProject.description);
                formData.set("used_techs", JSON.stringify(this.tags));
                formData.set("image", updatedProject.image);
                if (file !== undefined) formData.append("imageFile", file);
                else formData.append("imageFile", "");
                formData.set("website_url", updatedProject.website_url);
                formData.set("github_url", updatedProject.github_url);
                formData.set("video_url", updatedProject.video_url);
                formData.set("category_id", this.defaultCategory.value);
                this.updateProject({ id: updatedProject.id, data: formData });
            }
        }
    }
};
</script>

<style scoped>
.validate-form-btn {
    display: block;
    margin-right: auto;
    margin-left: auto;
    margin-top: 0;
}
</style>
