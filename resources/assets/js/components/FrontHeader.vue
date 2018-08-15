<template>
<div id="FrontHeader" class="row">
    <header class="col-12 col-sm-12 col-md-12 text-center mt-3">
        <h1 id="SiteTitle"><router-link :to="'/'">{{ title }}</router-link></h1>
        <p>{{ description }}</p>
        <ul id="Menu">
            <li class="menu-item"><router-link :to="'/profile'">Profile</router-link></li>
            <li class="menu-item"><router-link :to="'/contact'">Contact</router-link></li>
        </ul>
        <hr class="col-5 col-sm-5 col-md-2 text-center">
    </header>
</div>
</template>
<script>
export default {
    props: ['title', 'description']
}
</script>
