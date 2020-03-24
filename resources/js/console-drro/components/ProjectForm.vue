<template>
  <transition name="fade" appear>
    <EditProjectForm v-if="!getIsInCreationMode" />
    <CreateProjectForm v-else />
  </transition>
</template>

<script>
import EditProjectForm from "./EditProjectForm";
import CreateProjectForm from "./CreateProjectForm";
import { mapGetters } from "vuex";

export default {
  name: "ProjectForm",
  components: {
    EditProjectForm,
    CreateProjectForm
  },
  computed: {
    ...mapGetters(["getIsInCreationMode"])
  }
};
</script>

<style scoped>
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
fade-leave-active {
  transition: opacity 0.7s;
}
</style>
