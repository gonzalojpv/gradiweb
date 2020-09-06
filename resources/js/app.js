import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { store } from './store'
import Vuelidate from 'vuelidate'

import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faSignInAlt,
    faCheckCircle,
    faInfoCircle,
    faUserTie,
    faChevronRight,
    faChevronLeft,
    faUser,
    faCertificate,
    faHistory,
    faVideo,
} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

Vue.use(Vuelidate)

library.add(
    faSignInAlt,
    faCheckCircle,
    faInfoCircle,
    faUserTie,
    faChevronRight,
    faChevronLeft,
    faUser,
    faVideo,
    faCertificate,
    faHistory,
)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(Vuelidate)

import 'bootstrap'
import './bootstrap'

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
