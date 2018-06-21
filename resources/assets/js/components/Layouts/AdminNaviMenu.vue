<template>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <router-link
        class="navbar-brand"
        :to="'/admin'"
    >{{ title }}</router-link>

    <button
        class="navbar-toggler collapsed"
        type="button"
        data-toggle="collapse"
        data-target="#navbar"
        aria-controls="navbar"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <router-link class="nav-link" :to="'/admin/article'">
                    Article
                </router-link>
            </li>
        </ul>
    </div>
</nav>
</template>

<script>
export default {
    props: ['title']
}
</script>
