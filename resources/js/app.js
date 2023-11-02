/* Vue js app script files, routes and online cdn, mounted here added Here to use Globally */
import './bootstrap';

import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';
import { createApp } from  'vue/dist/vue.esm-bundler.js';
import Routes from './routes'; // Routes is dyanmic name that means importing all routes file from routes.js file

import { createRouter, createWebHistory } from 'vue-router';
/* import App from './App.vue'; */


const app = createApp();

const router = createRouter({
    routes: Routes,
    history:createWebHistory(),
});

app.use(router);
app.mount('#app'); 

/* this mounted means binding the vujs app to app.blade.php file where wrap up the main content by id="app" like  <body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light"> 
    here                             <router-link to="/admin/dashboard" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>

                            and Route wise page change and page wise data showing here

            <div class="content-wrapper">

            <router-view></router-view> // to render the route chanding data to be main content

            all are app.js file  from  resource/js/app.js
    */

