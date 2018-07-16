import Vue from 'vue'
import Vuex from 'vuex'
import VueCookie from 'vuex'
import http from './services/http'

Vue.use(Vuex)
Vue.use(VueCookie)

const store = new Vuex.Store({
    state: {
        user: {},
        authenticated: false
    },
    mutations: {
        login (state, user) {
            state.user = user
            state.authenticated = true
        },
        logout (state) {
            state.user = null
            state.authenticated = false
        },
    },
})

export default store