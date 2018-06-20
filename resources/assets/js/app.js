import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap')

Vue.use(VueRouter)

/**
 * Read Components
 */
// Front
Vue.component('FrontHeaderComponent', require('./components/Layouts/FrontHeader.vue'))
// Admin
Vue.component('AdminNaviMenuComponent', require('./components/Layouts/AdminNaviMenu.vue'))
// Common
Vue.component('CommonFooterComponent', require('./components/Layouts/CommonFooter.vue'))

Vue.prototype.$http = window.axios

const router = new VueRouter({
    mode: 'history',
    routes: [
        // Front
        {
            path: '/',
            component: require('./components/Layouts/FrontApp.vue'),
            children: [
                {
                    path: '/',
                    component: require('./components/Layouts/FrontArticleIndex.vue'),
                },
                {
                    path: 'article/:id',
                    component: require('./components/Layouts/FrontArticleDetail.vue'),
                },
                {
                    path: 'tag/:tagname',
                    component: require('./components/Layouts/FrontArticleIndex.vue'),
                },
            ]
        },

        // Admin
        { path: '/admin', component: require('./components/Layouts/AdminTop.vue') },
        { path: '/admin/article', component: require('./components/Layouts/AdminArticleIndex.vue') },
        { path: '/admin/article/:id', component: require('./components/Layouts/AdminArticleDetail.vue') },
    ]
})

const app = new Vue({
    router,
    el: '#VueContent'
})
