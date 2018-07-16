<template>
<div id="AdminLogin" class="container">
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-3">
        <header><h2>Login</h2></header>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">E-mail</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input type="text" name="email" v-model="email" v-on:keyup.enter="login">
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">Password</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input type="password" name="password" v-model="password" v-on:keyup.enter="login">
        </div>
    </div>
    <div class="form row mb-3">
        <button id="BtnLogin" class="btn btn-primary" type="button" v-on:click="login">Login</button>
        <button id="BtnCancel" type="button">Cancel</button>
    </div>
    <CommonFooterComponent :domain="siteSetting.domain"></CommonFooterComponent>
</div>
</template>
<script>
import http from '../services/http'
export default {
    props: ['siteSetting'],
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login () {
            const param = { email: this.email, password: this.password }
            http.post('authenticate', param,
            success => {
                console.log('login success')
                this.$store.commit('login', success.data.user)
                this.$router.push({ path: '/admin' })
            },
            error => {
                console.log('error')
            })
        }
    }
}
</script>
