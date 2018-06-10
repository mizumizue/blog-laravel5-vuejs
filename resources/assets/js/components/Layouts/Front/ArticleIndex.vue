<template>
<div id="vueIndex" class="p-md-3 col-9 col-sm-9 col-md-9 mx-auto">
    <article class="mb-4" v-for="(article, key, index) in articles" :key="index">
        <header>
            <h2><router-link :to="'/articles/' + article.id">{{ article.title }}</router-link></h2>
        </header>
        <section class="explain">
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
                        :to="'/articles?tag=' + tag.title"
                        :style="'background-color: #' + tag.color_code"
                    >{{ tag.title }}</router-link>
                </li>
            </ul>
            <span class="publish-date">Published: {{ article.created_at | moment }}</span>
        </footer>
    </article>
</div>
</template>

<script>
import moment from 'moment'
export default {
    filters: {
        moment: function (date) {
            return moment(date).format('YYYY-MM-DD')
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
    methods: {
        fetchArticles() {
            this.$http.get('/api/articles')
            .then(res =>  {
                this.articles = res.data
            })
        }
    }
}
</script>
