<template>
<div id="AdminArticleEdit" class="container mb-5">
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
            <input class="w-100 p-0" type="text" name="code" v-model="article.code">
            <div class="error" show="errors.code">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.code"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タイトル</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="w-100 p-0" type="text" name="title" v-model="article.title">
            <div class="error" show="errors.title">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.title"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">説明</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <textarea class="w-100 p-0" name="description" rows="4" cols="40" v-model="article.description"></textarea>
            <div class="error" show="errors.description">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.description"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">本文</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <textarea id="editor" class="w-100 p-0" name="content"></textarea>
            <div class="error" show="errors.content">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.content"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form tag-list row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タグ</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <ul class="list-inline">
                <li class="list-inline-item" v-for="(tag, key, index) in tags" :key="index">
                    <input :id="tag.id" type="checkbox" :value="tag.id" v-model="seletedTags">
                    <label
                        class="tag"
                        :for="tag.id"
                        :style="
                            'background-color: #' + tag.background_color_code + ';' + 
                            'color: #' + tag.font_color_code + ';'"
                        >{{ tag.title }}</label>
                </li>
            </ul>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2"></div>
        <div class="label col-10 col-sm-10 col-md-10">
            <button id="btnStore" class="btn btn-primary" type="button" v-show="isNew" v-on:click="store">作成</button>
            <button id="btnUpdate" class="btn btn-primary" type="button" v-show="!isNew" v-on:click="update">更新</button>
        </div>
    </div>
</div>
</template>
<script>
import http from '../services/http'
export default {
    mounted() {
        const editor = document.getElementById('editor');
        this.simplemde = new SimpleMDE({
            element: editor,
            forceSync: true,
            spellChecker: false
        });
        this.fetchTags()
        if (this.$route.params.id) {
            this.fetchArticle()
        } else {
            this.setDefault()
        }
    },
    data() {
        return {
            isNew: false,
            article: {},
            tags: [],
            seletedTags :[],
            errors: []
        }
    },
    methods: {
        setDefault() {
            this.isNew = true
            this.article = {
                published: 0,
                code: null,
                title: null,
                description: null,
                content: null
            }
            this.simplemde.value('')
        },
        fetchTags() {
            http.get('tag', res => {
                this.tags = res.data;
            })
        },
        fetchArticle() {
            http.get('admin_article/' + this.$route.params.id,
            res => {
                this.article = res.data
                this.seletedTags = this.article.tags.map(function(tag) {
                    return tag.id
                })
                this.simplemde.value(res.data.content)
            })
        },
        store() {
            const self = this
            const article = this.article
            this.article.content = this.simplemde.value()
            this.article.tags = this.seletedTags
            http.post('admin_article', article,
            (function(success){
                self.$store.commit('modifiedSuccessMessage', '記事を作成しました.')
                self.$router.push({ path: '/admin/article' })
            }),
            (function(error){
                self.$store.commit('modifiedErrorMessage', '記事の作成に失敗しました.')
                self.errors = error.response.data.errors
            }))
        },
        update() {
            const self = this
            const id = this.$route.params.id
            const article = this.article
            this.article.tags = this.seletedTags
            this.article.content = this.simplemde.value()
            http.put('admin_article/' + id, article,
            (function(success){
                self.$store.commit('modifiedSuccessMessage', '記事を更新しました.')
                self.$router.push({ path: '/admin/article' })
            }),
            (function(error){
                self.$store.commit('modifiedErrorMessage', '記事の更新に失敗しました.')
                self.errors = error.response.data.errors
            }))
        }
    }
}
</script>
