<template>
<div id="AdminApp">
    <AdminNaviMenuComponent :title="siteSetting.title"></AdminNaviMenuComponent>

    <router-view></router-view>

    <CommonFooterComponent :domain="siteSetting.domain"></CommonFooterComponent>
</div>
</template>

<script>
export default {
    created() {
        this.fetchSiteSetting()
    },
    data() {
        return {
            siteSetting: []
        }
    },
    methods: {
        fetchSiteSetting() {
            this.$http.get('/api/site_setting')
            .then(res =>  {
                this.siteSetting = res.data
            })
        }
    }
}
</script>
