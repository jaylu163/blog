
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// 引进vue router文件
import VueRouter from 'vue-router';
window.VueRouter = require("vue-router");

Vue.use(VueRouter);
Vue.component('my-view', require('./components/view.vue'));

const routes = [
   
    { path: '/#example', component: {template :"<example></example>"} }
];

const router = new VueRouter({
    routes // （缩写）相当于 routes: routes
});

const app = new Vue({
    router
}).$mount('#app');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
*/