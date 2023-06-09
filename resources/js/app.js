require('./bootstrap');

window.Vue = require('vue').default;


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('article-component', require('./components/articleComponent.vue').default);

import store from './store'



const app = new Vue({
    store,
    el: '#app',
    created() {
        let url = window.location.pathname;
        let slug = url.substring(url.lastIndexOf('/') + 1);


        console.log(url)
        console.log(slug)
        this.$store.commit('SET_SLUG',slug)
        this.$store.dispatch('GetArticleData', slug)
    }
});
