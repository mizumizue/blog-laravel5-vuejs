<template>
<div class="wrapper">
    <router-view :siteSetting="siteSetting"></router-view>
</div>
</template>
<script>
import http from './services/http'
export default {
    mounted () {
        this.fetchSiteSetting()
    },
    data() {
        return {
            siteSetting: []
        }
    },
    methods: {
        fetchSiteSetting() {
            http.get('site_setting', res => {
                this.siteSetting = res.data
            })
        }
    }
}
</script>
