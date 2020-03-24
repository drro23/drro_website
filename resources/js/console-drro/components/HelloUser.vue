<template>
  <div class="hello-user">
      <h1 class="hello">Bonjour {{ getUser.name }}</h1>
      <h3 class="welcome-msg">Bienvenue dans ton espace personnel</h3>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: 'HelloUser',
    computed: mapGetters(['getUser']),
}
</script>

<style scoped>
.hello {
    color: white;
}

.welcome-msg {
    color: #919191;
    font-size: 1.2em;
    padding-bottom: 15px;
}
</style>