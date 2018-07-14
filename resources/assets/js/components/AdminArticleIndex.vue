<template>
<div id="AdminArticleIndex" class="container">
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-3">
        <header><h2>Article Index</h2></header>
    </div>
    <div class="row col-12 col-sm-12 col-md-12 md-3 p-0">
        <router-link class="btn btn-default" :to="'/admin/article/create'">新規作成</router-link>
    </div>
    <div class="row table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>タイトル</th>
                    <th>公開</th>
                    <th>更新日時</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(article, key, index) in articles"
                    :key="index">
                    <td>{{ article.title }}</td>
                    <td>{{ article.published | published }}</td>
                    <td>{{ article.updated_at | moment }}</td>
                    <td>
                        <router-link :to="'/admin/article/edit/' + article.id">編集</router-link>
                        <span> / </span>
                        <router-link :to="'/admin/article/destroy' + article.id">削除</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
import http from '../services/http'
import moment,{ isMoment } from 'moment'
export  default {
    filters: {
        moment: function (date) {
            return moment(date).format('YYYY/MM/DD H:mm')
        },
        published: function (published) {
            return published ? '公開' : '非公開'
        }
    },
    created() {
        this.fetchArticles()
    },
    data() {
        return {
            articles: []
        }
    },
    watch: { 
        '$route' (to, from) {
            this.fetchArticles()
        }
    },
    methods: {
        fetchArticles() {
            http.get('admin_article', res => {
                this.articles = res.data
            })
        },
    }
}
</script>
