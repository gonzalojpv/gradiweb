import Vue from 'vue'
import App from './App.vue'
import router from './router'
import Vuelidate from 'vuelidate'

import '../sass/app.scss'

Vue.use(Vuelidate)

import 'bootstrap'
import './bootstrap'


new Vue({
    el: '#app',
    components: { App },
    router,
    //store,
});
