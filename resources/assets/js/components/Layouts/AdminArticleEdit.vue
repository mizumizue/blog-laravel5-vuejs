<template>
<div id="AdminArticleEdit" class="container">
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-4">
        <header><h2>Article Edit</h2></header>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">公開</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <select name="published">
                <option value="0">非公開</option>
                <option value="1">公開</option>
            </select>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タイトル</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="col-10" type="text" name="title">
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">説明</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <textarea class="col-10" name="description" rows="4" cols="40"></textarea>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タグ</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="col-10" type="text" name="tag">
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">本文</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <textarea id="editor" class="col-10" name="content"></textarea>
        </div>
    </div>
</div>
</template>

<script>
export default {
    created() {
        this.fetchArticle()
    },
    data() {
        return {
            article: []
        }
    },
    methods: {
        fetchArticle() {
            this.$http.get('/api/article/' + this.$route.params.id)
            .then(res =>  {
                this.article = res.data;
            })
        },
    }
}
</script>
