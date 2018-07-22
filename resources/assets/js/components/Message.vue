<template>
    <div class="Message container">
        <div
            class="row  col-12 col-sm-12 col-md-12 alert-success"
            v-show="hasSuccessMessage"
            v-on:click="reset">
            <h2>{{ message }}</h2>
        </div>
        <div
            class="row  col-12 col-sm-12 col-md-12 alert-danger"
            v-show="hasErrorMessage"
            v-on:click="reset">
            <h2>{{ message }}</h2>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        message() {
            return this.$store.getters.message
        },
        hasSuccessMessage() {
            return this.$store.getters.hasSuccessMessage
        },
        hasErrorMessage() {
            return this.$store.getters.hasErrorMessage
        },
    },
    methods: {
        reset() {
            this.$store.commit('resetMessage')
        }
    }
}
</script>
