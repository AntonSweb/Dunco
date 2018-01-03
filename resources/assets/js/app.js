
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

const Vue         = require('vue');
// import VueVisible from 'vue-visible';
const Vueheader   = require('./components/Header.vue');
const Vueswiper   = require('./components/Swiper.vue');
const Vuemenu     = require('./components/Menu.vue');
const Vuevideo    = require('./components/Video.vue');
const Vuetrust    = require('./components/Trust.vue');
const Vuepeople   = require('./components/People.vue');
const Vueproducts = require('./components/Products.vue');
const Vuegallery  = require('./components/Gallery.vue');
const Vueorder    = require('./components/Order.vue');
const Vuefooter   = require('./components/Footer.vue');

// const VueVisible = require('vue-visible');
// Vue.use(VueVisible);

new Vue({
    el: '.header',
    render: h => h(Vueheader)
});
new Vue({
    el: '.section__front-slider',
    render: h => h(Vueswiper)
});
new Vue({
    el: '.section__menu',
    render: h => h(Vuemenu)
});
new Vue({
   el: '.section__video',
    render: h => h(Vuevideo)
});
new Vue({
    el: '.section__trust',
    render: h => h(Vuetrust)
});
new Vue({
    el: '.section__people',
    render: h => h(Vuepeople)
});
new Vue({
    el: '.section__our-products',
    render: h => h(Vueproducts)
});
new Vue({
    el: '.section__gallery',
    render: h => h(Vuegallery)
});
new Vue({
    el: '.section__order',
    render: h => h(Vueorder)
});
new Vue({
    el: '.footer',
    render: h => h(Vuefooter)
    // render: function (createElement) {
    //     return createElement(Vuefooter)
    // }
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


