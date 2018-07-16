import Vue from 'vue'
import store from './store'
import router from './router'
import http from './services/http'
import VueCookie from 'vue-cookie'

require('./bootstrap')
Vue.use(VueCookie)

const app = new Vue({
    store,
    router,
    el: '#app',
    created () {
        http.init()
    },
    render: h => h(require('./app.vue')),
})