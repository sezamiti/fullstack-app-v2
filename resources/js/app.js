require('./bootstrap');

window.Vue = require('vue').default;


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('article-component', require('./components/articleComponent.vue').default);

import store from './store'



const app = new Vue({
    store,
    el: '#app',
});
