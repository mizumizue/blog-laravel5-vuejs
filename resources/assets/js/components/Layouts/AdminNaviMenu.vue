<template>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <router-link
        class="navbar-brand"
        :to="'/admin'"
    >{{ title }}</router-link>

    <button
        class="navbar-toggler collapsed"
        type="button"
        data-toggle="collapse"
        data-target="#navbar"
        aria-controls="navbar"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"
                v-for="(naviMenu, key, index) in naviMenus"
                :key="index"
            >
                <router-link class="nav-link" :to="'/admin/' + naviMenu.code">
                    {{ naviMenu.title }}
                </router-link>
            </li>
        </ul>
    </div>
</nav>
</template>

<script>
export default {
    props: ['title'],
        created() {
        this.fetchNaviMenus()
    },
    data() {
        return {
            naviMenus: []
        }
    },
    methods: {
        fetchNaviMenus() {
            this.$http.get('/api/navi_menu')
            .then(res =>  {
                this.naviMenus = res.data
            })
        }
    }
}
</script>
