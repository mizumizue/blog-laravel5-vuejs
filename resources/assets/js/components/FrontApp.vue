<template>
<div id="FrontApp">
    <FrontHeaderComponent
        :title="siteSetting.title"
        :description="siteSetting.description"
    />
    <router-view/>
    <CommonFooterComponent :domain="siteSetting.domain"/>
</div>
</template>
<script>
export default {
    props: ['siteSetting']
}
</script>

