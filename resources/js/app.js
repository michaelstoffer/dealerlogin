
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('clipboard', require('./components/CopyToClipboard.vue'));

Vue.component('profile', require('./components/pages/Profile.vue'));
Vue.component('dashboard', require('./components/pages/Dashboard.vue'));

Vue.component('sales-tools', require('./components/pages/Sales.vue'));
Vue.component('marketing-materials', require('./components/pages/Marketing.vue'));
Vue.component('service', require('./components/pages/Service.vue'));
Vue.component('training', require('./components/pages/Training.vue'));

const app = new Vue({
    el: '#app'
});
