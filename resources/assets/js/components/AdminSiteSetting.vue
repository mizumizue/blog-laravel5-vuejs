<template>
<div id="AdminSiteSetting" class="container mb-5">
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-4">
        <header><h2>SiteSetting</h2></header>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">タイトル</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="w-100 p-0" type="text" name="title" v-model="siteSetting.title">
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
            <textarea class="w-100 p-0" name="description" rows="4" cols="40" v-model="siteSetting.description"></textarea>
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
        <div class="label col-2 col-sm-2 col-md-2">URL</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="w-100 p-0" type="text" name="url" v-model="siteSetting.url">
            <div class="error" show="errors.url">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.url"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>    
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">ドメイン</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="w-100 p-0" type="text" name="domain" v-model="siteSetting.domain">
            <div class="error" show="errors.domain">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.domain"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">Author</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="w-100 p-0" type="text" name="author" v-model="siteSetting.author">
            <div class="error" show="errors.author">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.author"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2">Email</div>
        <div class="label col-10 col-sm-10 col-md-10">
            <input class="w-100 p-0" type="text" name="email" v-model="siteSetting.email">
            <div class="error" show="errors.email">
                <ul class="list-unstyled">
                    <li 
                        class="list-group-item-danger p-1"
                        v-for="(error, key, index) in errors.email"
                        :key="index">{{ error }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form row mb-3">
        <div class="label col-2 col-sm-2 col-md-2"></div>
        <div class="label col-10 col-sm-10 col-md-10">
            <button id="btnUpdate" class="btn btn-primary" type="button" v-on:click="update">更新</button>
        </div>
    </div>
</div>
</template>
<script>
import http from '../services/http'
export default {
    mounted() {
        this.fetchSiteSetting()
    },
    data() {
        return {
            isNew: false,
            siteSetting: {},
            errors: []
        }
    },
    methods: {
        fetchSiteSetting() {
            http.get('site_setting',
            res => {
                this.siteSetting = res.data
            })
        },
        update() {
            const self = this
            const siteSetting = this.siteSetting
            http.put('site_setting/' + siteSetting.id, siteSetting,
            (function(success){
                self.$store.commit('modifiedSuccessMessage', 'サイト設定を更新しました.')
                self.$router.push({ path: '/admin/site_setting' })
            }),
            (function(error){
                self.$store.commit('modifiedErrorMessage', 'サイト設定の更新に失敗しました.')
                self.errors = error.response.data.errors
            }))
        }
    }
}
</script>
