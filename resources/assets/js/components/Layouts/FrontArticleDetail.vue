<template>
<div id="FrontArticleDetail" class="container">
    <div class="p-md-3 col-9 col-sm-9 col-md-9 mx-auto">
        <!-- Articles Start -->
        <article id="contents" class="mb-md-4">
            <header>
                <h2>{{ article.title }}</h2>
                <span class="publish-date float-right text-light-green">Published: {{ article.created_at | moment }}</span>
                <div class="clearfix mb-md-2"></div>
            </header>
            <section>
                <div class="mb-md-2">
                    {{ article.content }}
                </div>
            </section>
            <footer>
                <ul class="tags list-inline mb-md-0">
                    <li class="list-inline-item text-light-green">Related Tags:</li>
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
            </footer>
        </article>
        <!-- Articles End -->
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
