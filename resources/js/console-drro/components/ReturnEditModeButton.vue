<template>
    <div class="return-edit-btn">
        <v-btn v-if="getIsInCreationMode" absolute top dark left color="#0964a0" @click="enterEditMode">
            <v-icon>mdi-keyboard-backspace</v-icon>
        </v-btn>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
export default {
    name: "ReturnEditModeButton",
    computed: mapGetters(['getIsInCreationMode']),
    methods: {
        ...mapActions(['updateIsInCreationMode']),
        enterEditMode() {
            this.updateIsInCreationMode(false);
        }
    }
};
</script>

<style scoped>
.return-edit-btn {
    top: 10;
    left: 10;
    margin-top: 5px;
    margin-right: 5px;
}
</style>
