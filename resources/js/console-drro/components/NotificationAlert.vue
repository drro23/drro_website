<template>
    <v-alert
        :type="type"
        transition="fade-transition"
        >{{ message }}</v-alert>
</template>

<script>

export default {
    name: "NotificationAlert",
    props: {
        id: String,
        type: String,
        message: String
    },
    created() {
        setTimeout(() => {
            this.$store.commit('removeNotification', this.id);
        }, 2000);
    },
};
</script>

<style scoped></style>
