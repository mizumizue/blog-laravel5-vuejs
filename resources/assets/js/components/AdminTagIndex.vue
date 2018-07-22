<template>
<div id="AdminTagIndex" class="container">
    <div class="row col-12 col-sm-12 col-md-12 mt-3 mb-3">
        <header><h2>Tag Index</h2></header>
    </div>
    <div class="row col-12 col-sm-12 col-md-12 md-3 p-0">
        <router-link class="btn btn-default" :to="'/admin/tag/create'">新規作成</router-link>
    </div>
    <div class="row table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>タイトル</th>
                    <th>更新日時</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(tag, key, index) in tags"
                    :key="index">
                    <td>{{ tag.title }}</td>
                    <td>{{ tag.updated_at | moment }}</td>
                    <td>
                        <router-link class="btn-link" :to="'/admin/tag/edit/' + tag.id">編集</router-link>
                        <span>/</span>
                        <button class="btn-link border-0" type="button" :value="tag.id" v-on:click="destroy">削除</button>
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
    },
    mounted() {
        this.fetchTags()
    },
    data() {
        return {
            tags: []
        }
    },
    methods: {
        fetchTags() {
            http.get('tag', res => {
                this.tags = res.data
            })
        },
        destroy(event) {
            const self = this
            const id = event.target.value
            http.delete('tag/' + id, {},
            (function(success){
                console.log('success')
                self.fetchTags()
            }),
            (function(error){
                console.log('error')
            }))
        }
    }
}
</script>
