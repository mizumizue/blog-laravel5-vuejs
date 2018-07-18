<template>
<div id="FrontApp">
    <FrontHeaderComponent
        :title="siteSetting.title"
        :description="siteSetting.description"
    ></FrontHeaderComponent>
    <router-view></router-view>
    <CommonFooterComponent :domain="siteSetting.domain"></CommonFooterComponent>
</div>
</template>
<script>
export default {
    props: ['siteSetting']
}
</script>

