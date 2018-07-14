<template>
<div id="AdminApp">
    <AdminNaviMenuComponent :title="siteSetting.title"></AdminNaviMenuComponent>
    <router-view></router-view>
    <CommonFooterComponent :domain="siteSetting.domain"></CommonFooterComponent>
</div>
</template>
<script>
export default {
    props: ['siteSetting']
}
</script>

