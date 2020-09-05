import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { store } from './store'
import Vuelidate from 'vuelidate'

Vue.use(Vuelidate)

import 'bootstrap'
import './bootstrap'

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
