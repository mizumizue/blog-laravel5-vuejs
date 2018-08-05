<template>
<div class="row">
    <header class="col-12 col-sm-12 col-md-12 text-center mt-3">
        <h1><router-link :to="'/'">{{ title }}</router-link></h1>
        <p>{{ description }}</p>
        <hr class="col-5 col-sm-5 col-md-2 text-center">
        <div id="search" class="mb-4">
            <div class="col-4 col-sm-4 col-md-4 mx-auto">
                <input type="text" class="form-control text-center p-0" placeholder="しぼりこみけんさく" v-on:keyup.enter="pushFilteredIndex">
            </div>
        </div>
    </header>
</div>
</template>
<script>
export default {
    props: ['title', 'description'],
    methods: {
        pushFilteredIndex(event) {
            const keyword = encodeURIComponent(event.target.value)
            if (keyword) {
                this.$router.push({ path: '/?keyword=' + keyword })
            } else {
                this.$router.push({ path: '/' })
            }
        }
    }
}
</script>
