import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user: {},
        authenticated: false
    },
    mutations: {
        login (state, user) {
            console.log('login mutation is success')
            state.user = user
            state.authenticated = true
        }
    }
})

export default store