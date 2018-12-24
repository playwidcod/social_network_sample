
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

<<<<<<< HEAD
Vue.component('example-component', require('./components/ExampleComponent.vue'));
=======
<<<<<<< HEAD
Vue.component('example-component', require('./components/ExampleComponent.vue'));
=======
Vue.component('example', require('./components/Example.vue'));
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a

const app = new Vue({
    el: '#app'
});
