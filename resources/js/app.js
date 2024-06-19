/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import vue from 'vue';
import vuerouter from 'vue-router';
// import home from './components/home.vue';
import register from './components/Register.vue';
import login from './components/Login.vue';
import uploadvideo from './components/UploadVideo.vue';
import viewvideo from './components/ViewVideo.vue';

vue.use(vuerouter);


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

const routes = [
    { path: '/', component: home },
    { path: '/register', component: register },
    { path: '/login', component: login },
    { path: '/upload', component: uploadvideo },
    { path: '/video/:id', component: viewvideo, props: true }
  ];
  
  const router = new vuerouter({
    mode: 'history',
    routes
  });
  
  new vue({
    router,
    render: h => h(app)
  }).$mount('#app');
  
  
app.mount('#app');
