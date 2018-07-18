import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'

Vue.use(VueRouter)
Vue.component('FrontHeaderComponent', require('./components/FrontHeader.vue'))
Vue.component('AdminNaviMenuComponent', require('./components/AdminNaviMenu.vue'))
Vue.component('CommonFooterComponent', require('./components/CommonFooter.vue'))

const router = new VueRouter({
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
            meta: { requiresAuth: true },
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
        },
        {
            path: '/login',
            component: require('./components/AdminLogin.vue'),
        },
        {
            path: '/logout',
            component: require('./components/AdminLogout.vue'),
        }
    ],
})

router.beforeEach ((to, from, next) => {
    // 上位ルート含めて認証が必要なルートがあるかの確認
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.state.authenticated) {
            next({
                path: '/login',
                query: to.fullPath
            })
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router