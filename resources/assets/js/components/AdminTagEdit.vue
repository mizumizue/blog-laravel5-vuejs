<template>
<div id="AdminTagEdit" class="container mb-5">
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-4">
        <header><h2>Tag Edit</h2></header>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タイトル</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="p-0" type="text" name="title" v-model="tag.title">
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
        <div class="label col-2 col-sm-2 col-md-2">フォントカラー</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="p-0" type="text" name="font_color_code" v-model="tag.font_color_code">
            <div class="error" show="errors.font_color_code">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.font_color_code"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">BGカラーコード</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="p-0" type="text" name="background_color_code" v-model="tag.background_color_code">
            <div class="error" show="errors.background_color_code">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.background_color_code"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">プレビュー</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <span class="tag"
                :style="
                    'background-color: #' + tag.background_color_code + ';' + 
                    'color: #' + tag.font_color_code + ';'"
            >{{ tag.title }}</span>
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
        if (this.$route.params.id) {
            this.fetchTag()
        } else {
            this.setDefault()
        }
    },
    data() {
        return {
            isNew: false,
            tag: {},
            errors: []
        }
    },
    methods: {
        setDefault() {
            this.isNew = true
            this.tag = {
                title: '',
                font_color_code: '',
                background_color_code: ''
            }
        },
        fetchTag() {
            http.get('tag/' + this.$route.params.id,
            res => {
                this.tag = res.data
            })
        },
        store() {
            const self = this
            const tag = this.tag
            http.post('tag', tag,
            (function(success){
                self.$store.commit('modifiedSuccessMessage', 'タグを作成しました.')
                self.$router.push({ path: '/admin/tag' })
            }),
            (function(error){
                self.$store.commit('modifiedErrorMessage', 'タグの作成に失敗しました.')
                self.errors = error.response.data.errors
            }))
        },
        update() {
            const self = this
            const id = this.$route.params.id
            const tag = this.tag
            http.put('tag/' + id, tag,
            (function(success){
                self.$store.commit('modifiedSuccessMessage', 'タグを更新しました.')
                self.$router.push({ path: '/admin/tag' })
            }),
            (function(error){
                self.$store.commit('modifiedErrorMessage', 'タグの更新に失敗しました.')
                self.errors = error.response.data.errors
            }))
        }
    }
}
</script>
