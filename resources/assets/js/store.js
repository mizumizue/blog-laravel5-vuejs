import Vue from 'vue'
import Vuex from 'vuex'
import VueCookie from 'vuex'

Vue.use(Vuex)
Vue.use(VueCookie)

const store = new Vuex.Store({
    state: {
        user: {},
        authenticated: false,
        siteSetting: {},
        message: '',
        hasSuccessMessage: false,
        hasErrorMessage: false,
    },
    getters: {
        message: state => { return state.message },
        hasSuccessMessage: state => { return state.hasSuccessMessage },
        hasErrorMessage: state => { return state.hasErrorMessage }
    },
    mutations: {
        login(state, user) {
            state.user = user
            state.authenticated = true
        },
        logout(state) {
            state.user = null
            state.authenticated = false
        },
        modifiedSuccessMessage(state, message) {
            state.message = message
            state.hasSuccessMessage = true
        },
        modifiedErrorMessage(state, message) {
            state.message = message
            state.hasErrorMessage = true
        },
        resetMessage(state) {
            state.message = null
            state.hasSuccessMessage = false
            state.hasErrorMessage = false
        }
    },
})
export default store
