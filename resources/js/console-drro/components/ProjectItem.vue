<template>
    <div class="card-border" :class="id === getSelectedProject.id && 'selected-card'" :style="{ borderColor: id === getSelectedProject.id ? randomColor : 'transparent'}">
        <div class="card" :style="{ backgroundColor: randomColor}" :title="name" @click="selectProject">
            <span class="name-initials">{{ nameInitials }}</span>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

const COLOR_PALETTE = [
  "#fec771",
  "#00a8cc",
  "#ff2e63",
  "#ee8572",
  "#7fcd91",
  "#ad62aa",
  "#400082",
  "#0c9463",
  "#801336",
  "#602080",
]

export default {
    name: "ProjectItem",
    props: {
        id: Number,
        name: String,
    },
    computed: {
        ...mapGetters(['getSelectedProject']),
        nameInitials: function() {
            let initials = this.name.match(/\b\w/g) || [];
            initials = (
                (initials.shift() || "") + (initials.pop() || "")
            ).toUpperCase();
            return initials;
        },
        randomColor: function() {
          let randomNumber = Math.floor(Math.random() * 10);
          return COLOR_PALETTE[randomNumber];
        }
    },
    methods: {
        ...mapActions(['changeSelectedProject']),
        selectProject() {
            this.changeSelectedProject(this.id);
        }
    }
};
</script>

<style scoped>
.card-border {
    justify-self: center;
    width: 130px;
    height: 130px;
    border-radius: 15px;
    border: 4px solid transparent;
}

.selected-card {
    border: 4px solid #0f83e2;
}

.card {
    position: relative;
    height: 104px;
    margin: 10px;
    border-radius: 15px;
    background-color: #0f83e2;
    cursor: pointer;
}

.name-initials {
  color: white;
  position: relative;
  margin: auto;
  font-size: 1.5em;
  font-weight: bold;
}
</style>
