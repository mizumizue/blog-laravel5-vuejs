import Vue from 'vue'
import VueCookie from 'vue-cookie'
import store from './store'
import router from './router'
import http from './services/http'

Vue.use(VueCookie)

require('./bootstrap')

const app = new Vue({
    store,
    router,
    el: '#app',
    created () {
        http.init()
    },
    render: h => h(require('./app.vue')),
})