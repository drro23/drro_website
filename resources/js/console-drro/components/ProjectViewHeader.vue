<template>
  <div>
    <transition name="fade" appear>
      <h1 v-if="!getIsInCreationMode">{{ getSelectedProject.title }}</h1>
    </transition>
    <transition name="fade" appear>
      <h1 v-if="getIsInCreationMode">Ajouter un nouveau projet</h1>
    </transition>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "ProjectViewHeader",
  computed: mapGetters(["getIsInCreationMode", "getSelectedProject"])
};
</script>

<style scoped>
h1 {
  color: black;
  text-align: center;
  width: 70%;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 0;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
fade-leave-active {
  transition: opacity 0.7s;
}
</style>