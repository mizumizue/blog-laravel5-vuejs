<template>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">take IT easy</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"
            v-for="(menu, key, index) in menus"
            :key="index">
            <router-link
                class="nav-link"
                :to="'/admin/' + menu.code">
                {{ menu.title }}
            </router-link>
        </li>
      </ul>
    </div>
</nav>
</template>

<script>
export default {
    created() {
        this.fetchMenus()
    },
    data() {
        return {
            menus: []
        }
    },
    methods: {
        fetchMenus() {
            this.$http.get('/api/admin/menus')
            .then(res =>  {
                this.menus = res.data
            })
        }
    }
}
</script>
