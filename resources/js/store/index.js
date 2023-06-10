import Vue from "vue";
import Vuex from "vuex"
import axios from "axios";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        article:{
            comments: [],
            tags: [],
            statistic: {
                likes:0,
                views:0,
            },
        },
        slug:'',
        likeIt: true,
    },
    actions:{

        GetArticleData(context, payload){
            console.log('context', context);
            console.log('context', payload);
            axios.get('/api/article-json', {params: {slug:payload}}).then((response)=>{
                context.commit('SET_ARTICLE', response.data.data);
            }).catch(()=>{
                console.log('Error');
            })
        },
        viewsIncrement(context, payload){
            console.log("rootState.slug", context.rootState.slug)
            console.log("rootGetters.articleSlugRevers", context.rootGetters.articleSlugRevers)
            setTimeout(() => {
                axios.put('/api/article-views-increment',  {slug:payload }).then((response) =>{
                    context.commit('SET_ARTICLE', response.data.data)
                }).catch(()=>{
                    console.log('Ошибка')
                });
            }, 5000)
        },
        addLike(context, payload) {
            axios
                .put('/api/article-likes-increment', { slug: payload.slug, increment: payload.increment })
                .then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                    context.commit('SET_LIKE', payload.increment);
                })
                .catch(() => {
                    console.log('Ошибка addLike');
                });
        },
    },
    getters:{
        articleViews(state) {
                return state.article.statistic.views;
        },
        articleLikes(state) {
                return state.article.statistic.likes;
        },
    },
    mutations:{
        SET_ARTICLE(state, payload) {
            state.article = {
                ...state.article, // Сохраняем текущие значения статьи
                ...payload, // Обновляем значения из полученного payload
                statistic: {
                    ...state.article.statistic, // Сохраняем текущие значения статистики
                    ...(payload.statistic || {}) // Обновляем значения статистики из полученного payload (если они присутствуют)
                }
            };
        },
        SET_SLUG(state, payload){
            return state.slug = payload;
        },
        SET_LIKE(state, payload) {
            state.article.likeIt = payload;
        },
    },

})
