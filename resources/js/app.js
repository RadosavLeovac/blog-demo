require('./bootstrap');

window.Vue = require('vue');
import Toasted from 'vue-toasted';
Vue.use(Toasted, {
    duration: 6000,
    position: 'top-right',
    action : {
        text : 'Okay',
        onClick : (e, toastObject) => {
            toastObject.goAway(0);
        }
    }
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app'
});
