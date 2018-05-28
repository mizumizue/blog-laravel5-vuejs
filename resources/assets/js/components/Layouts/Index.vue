<template>
    <div id="vueIndex">
        <div v-for="(article, key, index) in articles" :key="index">
            <article>
                <header>
                    <h2>
                        <router-link :to="'/articles/' + article.id">{{ article.title }}</router-link>
                    </h2>
                </header>
                <section>
                    <p class="except">{{ article.content }}</p>
                </section>
                <footer>
                    <span class="publish-date">{{ article.created_at | moment }}</span>
                    <ul class="tags">
                        <li v-for="(tag, key, index) in article.tags" :key="index">
                            <router-link :to="'/articles/' + article.id">{{ tag.title }}</router-link>
                        </li>
                    </ul>
                </footer>
            </article>
        </div>
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
