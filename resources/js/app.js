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
} from '@fortawesome/free-solid-svg-icons'
import { faYoutube } from '@fortawesome/free-brands-svg-icons'
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
    faYoutube,
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
