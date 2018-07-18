<template>
<div id="AdminLogout" class="container">
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-3">
        <header><h2>Logoutしました</h2></header>
    </div>
</div>
</template>
<script>
import http from '../services/http'
export default {
    mounted () {
        this.logout()
    },
    methods: {
        logout () {
            http.get('logout', 
            success => {
                console.log('logout success')
                this.$cookie.delete('jwt-token')
                this.$store.commit('logout')
                this.$router.push('login')
            },
            error => {
            })
        }
    }
}
</script>
