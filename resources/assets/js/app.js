import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap')

Vue.use(VueRouter)

// Load Component - Front
Vue.component('header-component', require('./components/Layouts/Front/Header.vue'))
Vue.component('footer-component', require('./components/Layouts/Front/Footer.vue'))

// Load Component - Admin
Vue.component('navbar-component', require('./components/Layouts/Admin/Navbar.vue'))

Vue.prototype.$http = window.axios

const router = new VueRouter({
    mode: 'history',
    routes: [
        // Front
        { path: '/', component: require('./components/Layouts/Front/ArticleIndex.vue') },
        // { path: '/article/:id', component: require('./components/Layouts/Front/ArticleDetail.vue') },
        // Admin
        { path: '/admin', component: require('./components/Layouts/Admin/TopPage.vue') },
        { path: '/admin/articles', component: require('./components/Layouts/Admin/ArticlesIndex.vue') },
    ]
})

const app = new Vue({
    router,
    el: '#vueContent'
})
