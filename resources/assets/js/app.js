import Vue from 'vue'
import VueCookie from 'vue-cookie'
import router from './router'
import http from './services/http'

Vue.use(VueCookie)

require('./bootstrap')

const app = new Vue({
    router,
    el: '#app',
    created () {
        http.init()
    },
    render: h => h(require('./app.vue')),
})