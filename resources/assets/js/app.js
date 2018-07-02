import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap')

Vue.use(VueRouter)

// ReadComponents
Vue.component('FrontHeaderComponent', require('./components/Layouts/FrontHeader.vue'))
Vue.component('AdminNaviMenuComponent', require('./components/Layouts/AdminNaviMenu.vue'))
Vue.component('CommonFooterComponent', require('./components/Layouts/CommonFooter.vue'))

Vue.prototype.$http = window.axios

const router = new VueRouter({
    mode: 'history',
    routes: [
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
                {
                    path: 'sample',
                    component: require('./components/Layouts/Sample.vue'),
                },
            ]
        },
        {
            path: '/admin',
            component: require('./components/Layouts/AdminApp.vue'),
            children: [
                {
                    path: '/',
                    component: require('./components/Layouts/AdminTop.vue'),
                },
                {
                    path: 'article',
                    component: require('./components/Layouts/AdminArticleIndex.vue'),
                },
                {
                    path: 'article/create',
                    component: require('./components/Layouts/AdminArticleEdit.vue'),
                },
                {
                    path: 'article/edit/:id',
                    component: require('./components/Layouts/AdminArticleEdit.vue'),
                },
            ]
        },
    ]
})

const app = new Vue({
    router,
    el: '#VueContent'
})
