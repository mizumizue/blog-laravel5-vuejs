<template>
<div id="FrontArticleIndex" class="container">
    <div class="p-md-3 col-9 col-sm-9 col-md-9 mx-auto">
        <article class="mb-4" v-for="(article, key, index) in articles" :key="index">
            <header>
                <h2><router-link :to="'/article/' + article.id">{{ article.title }}</router-link></h2>
            </header>
            <section class="explain mb-md-1">
                <p class="mb-1">{{ article.content }}</p>
            </section>
            <footer>
                <ul class="tags list-inline mb-0">
                    <li class="list-inline-item tag-label">Related Tags:</li>
                    <li class="list-inline-item"
                        v-for="(tag, key, index) in article.tags"
                        :key="index">
                        <router-link
                            class="tag"
                            :to="'/tag/' + tag.title"
                            :style="
                                'background-color: #' + tag.background_color_code + ';'
                                + 'font-color: #' + tag.font_color_code + ';'
                            "
                        >{{ tag.title }}</router-link>
                    </li>
                </ul>
                <span class="publish-date">Published: {{ article.created_at | moment }}</span>
            </footer>
        </article>
    </div>
</div>
</template>
<script>
import http from '../services/http'
import moment from 'moment'
export default {
    filters: {
        moment: function (date) {
            return moment(date).format('YYYY-MM-DD')
        }
    },
    mounted () {
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
        fetchArticlesDefault() {
            http.get('article', res => {
                this.articles = res.data
            })
        },
        fetchArticlesByTag() {
            http.get('article?tag=' + this.$route.params.tagname, res => {
                this.articles = res.data;
            })
        },
        fetchArticles() {
            if (this.$route.params.tagname) {
                this.fetchArticlesByTag()
            } else {
                this.fetchArticlesDefault()
            }
        }
    }
}
</script>
