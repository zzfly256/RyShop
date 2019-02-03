/*
 * Copyright (c) 2019.1 Rytia RyShop
 */

import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './../App.vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(VueRouter);
Vue.use(ElementUI);

var data = { a: 1 };

var vm = new Vue({
    el: '#app',
    data: data,
    render: h => h(App)
});