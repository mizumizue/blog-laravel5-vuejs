<template>
<div id="markdownEditor">
    <textarea id="editor" name="name" rows="8" cols="40"></textarea>
</div>
</template>

<script>
export default {
    created() {
        console.log('hoge')
    },
    data() {
        return {
            articles: []
        }
    },
}
</script>
