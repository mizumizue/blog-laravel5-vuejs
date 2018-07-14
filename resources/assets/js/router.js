import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)
Vue.component('FrontHeaderComponent', require('./components/FrontHeader.vue'))
Vue.component('AdminNaviMenuComponent', require('./components/AdminNaviMenu.vue'))
Vue.component('CommonFooterComponent', require('./components/CommonFooter.vue'))

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: require('./components/FrontApp.vue'),
            children: [
                {
                    path: '/',
                    component: require('./components/FrontArticleIndex.vue'),
                },
                {
                    path: 'tag/:tagname',
                    component: require('./components/FrontArticleIndex.vue'),
                },
                {
                    path: 'article/:id',
                    component: require('./components/FrontArticleDetail.vue'),
                },
            ]
        },
        {
            path: '/admin',
            component: require('./components/AdminApp.vue'),
            children: [
                {
                    path: '/',
                    component: require('./components/AdminTop.vue'),
                },
                {
                    path: 'article',
                    component: require('./components/AdminArticleIndex.vue'),
                },
                {
                    path: 'article/create',
                    component: require('./components/AdminArticleEdit.vue'),
                },
                {
                    path: 'article/edit/:id',
                    component: require('./components/AdminArticleEdit.vue'),
                },
            ],
            // path: '/admin/login',
            // component: require('./components/AdminLogin.vue'),
        },
    ],
})