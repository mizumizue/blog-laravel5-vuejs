import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap')

Vue.use(VueRouter)

// Load Component
Vue.component('header-component', require('./components/Layouts/Front/Header.vue'))
Vue.component('footer-component', require('./components/Layouts/Front/Footer.vue'))

Vue.prototype.$http = window.axios

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: require('./components/Layouts/Front/ArticleIndex.vue') },
        // { path: '/article/:id', component: require('./components/Layouts/Front/ArticleDetail.vue') },
        // { path: '/admin', component: require('./components/Layouts/Admin/Index.vue') },
    ]
})

const app = new Vue({
    router,
    el: '#vueContent'
})
