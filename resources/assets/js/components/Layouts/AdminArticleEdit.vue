<template>
<div id="AdminArticleEdit" class="container mb-5">
    <div
        class="row col-12 col-sm-12 col-md-12 mt-3 mb-4"
        v-show="hasMessage"
        v-bind:class="{'alert-success':updated, 'alert-danger':!updated}"
        v-on:click="removeMessage">
        <h2>
            {{ message }}
        </h2>
    </div>
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-4">
        <header><h2>Article Edit</h2></header>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">公開</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <select name="published" v-model="article.published">
                <option value="0">非公開</option>
                <option value="1">公開</option>
            </select>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">コード</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="col-10 p-0" type="text" name="code" v-model="article.code">
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タイトル</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="col-10 p-0" type="text" name="title" v-model="article.title">
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">説明</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <textarea class="col-10 p-0" name="description" rows="4" cols="40" v-model="article.description"></textarea>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">本文</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <textarea id="editor" class="col-10 p-0" name="content" v-model="article.content"></textarea>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タグ</div>
        <input class="col-10 p-0" type="text" name="tags">
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2"></div>
        <div class="label col-10 col-sm-10 col-md-10">
            <button id="BtnCreate" class="btn btn-primary" type="button" v-show="isNew" v-on:click="createArticle">作成</button>
            <button id="BtnUpdate" class="btn btn-primary" type="button" v-show="!isNew" v-on:click="updateArticle">更新</button>
        </div>
    </div>
</div>
</template>

<script>
export default {
    mounted() {
        const editor = document.getElementById('editor');
        const simplemde = new SimpleMDE({
            element: editor,
            forceSync: true,
            spellChecker: false
        });
    },
    created() {
        if (this.$route.params.id) {
            this.fetchArticle()
            return;
        }
        this.isNew = true
        this.setDefault()
    },
    data() {
        return {
            article: {},
            hasMessage: false,
            updated: false,
            message: null,
            errors : [],
            isNew: false
        }
    },
    methods: {
        setDefault() {
            this.article = {
                code: null,
                title: null,
                description: null,
                content: null,
                published: 0
            }
        },
        fetchArticle() {
            this.$http.get('/api/article/' + this.$route.params.id)
            .then(res =>  {
                this.article = res.data;
            })
        },
        createArticle() {
            const article = this.article
            this.$http.post('/api/article', article)
            .then(res => {
                this.updated = true
                this.hasMessage = true
                this.message = '作成しました'
            }).catch(error => {
                this.errors = error.response.errors
            })
        },
        updateArticle() {
            const id = this.$route.params.id
            const article = this.article
            this.$http({
                method: 'put',
                url: '/api/article/' + id,
                data: article
            })
            .then(res => {
                this.updated = true
                this.hasMessage = true
                this.message = '更新しました'
            }).catch(error => {
                this.errors = error.response.errors
            });
        },
        removeMessage() {
            this.updated = false
            this.hasMessage = false
            this.message = null
        }
    }
}
</script>
