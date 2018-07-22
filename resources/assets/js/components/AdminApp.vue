<template>
<div id="AdminApp">
    <AdminNaviMenuComponent :title="siteSetting.title"/>
    <MessageComponent/>
    <router-view/>
    <CommonFooterComponent :domain="siteSetting.domain"/>
</div>
</template>
<script>
import Message from './Message'
export default {
    props: ['siteSetting']
}
</script>

