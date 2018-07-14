<template>
<div class="container">
    <div class="row">
        <footer class="fixed-bottom bg-dark p-0 pt-1 pb-1 col-12 text-light text-center">
            © 2018 {{ domain }}
        </footer>
    </div>
</div>
</template>
<script>
export default {
    props: ['domain']
}
</script>
