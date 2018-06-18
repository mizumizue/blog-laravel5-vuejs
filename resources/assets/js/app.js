import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap')

Vue.use(VueRouter)

Vue.prototype.$http = window.axios

const router = new VueRouter({
    mode: 'history',
    routes: [
        // Front
        { path: '/', component: require('./components/Layouts/Front/ArticleIndex.vue') },
        { path: '/article/:id', component: require('./components/Layouts/Front/ArticleDetail.vue') },
    ]
})

const app = new Vue({
    router,
    el: '#VueContent'
})
