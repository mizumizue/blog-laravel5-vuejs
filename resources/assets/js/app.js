import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap')

Vue.use(VueRouter)

Vue.component('header-component', require('./components/Layouts/Header.vue'))

Vue.prototype.$http = window.axios

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: require('./components/Layouts/Index.vue') },
        // { path: '/article/:id', component: require('./components/Layouts/Detail.vue') },
    ]
})

const app = new Vue({
    router,
    el: '#vueContent'
})
