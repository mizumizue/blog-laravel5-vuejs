<template>
<div class="Footer container">
    <div class="row">
        <footer class="fixed-bottom bg-dark p-0 pt-1 pb-1 col-12 text-light text-center">
            {{ footerDomain }}
        </footer>
    </div>
</div>
</template>
<script>
export default {
    props: ['domain'],
    computed: {
        footerDomain() {
            return '© 2018 ' + this.domain
        }
    }
}
</script>
