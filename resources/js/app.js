require('./bootstrap');

window.Vue = require('vue');


require('./components/subscribe.button');

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
