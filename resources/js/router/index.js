import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../views/Home.vue'
import Contact from '../views/Contact'
import TermConditions from '../views/TermsConditions'
import View404 from '../views/404'
/* Auth */
import Login from '../views/auth/Login'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/about',
        name: 'about',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact,
    },
    {
        path: '/term-conditions',
        name: 'term-conditions',
        component: TermConditions,
    },
    {
        path: '/404',
        name: '404',
        component: View404,
        // Allows props to be passed to the 404 page through route
        // params, such as `resource` to define what wasn't found.
        props: true,
    },
    {
        path: '*',
        redirect: '404',
    },
]


const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
