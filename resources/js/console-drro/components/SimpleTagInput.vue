<template>
    <div class="tag-input-container">
        <v-chip
            class="drro-chip"
            close
            @click:close="remove(t.name)"
            v-for="t in tags"
            :key="t.name"
            >{{ t.name }}</v-chip
        >
        <v-text-field
            dense
            v-model="newTag"
            @keyup.enter="add()"
            placeholder="Tags"
            ></v-text-field
        >
    </div>
</template>

<script>
export default {
    props: {
        tags: Array,
        addNewTag: Function,
        removeTag: Function
    },
    data() {
        return {
            tag: ""
        };
    },
    computed: {
        newTag: {
            get() {
                return this.tag;
            },
            set(val) {
                this.tag = val;
            }
        }
    },
    methods: {
        add() {
            let t = this.newTag;
            this.newTag = '';
            this.addNewTag(t);
        },
        remove(name) {
            this.removeTag(name);
        }
    }
};
</script>

<style scoped>
.drro-chip {
    margin: 5px;
}
</style>
