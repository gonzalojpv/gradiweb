import Vue from 'vue'
import VueRouter from 'vue-router'
import { store } from '../store';

import Home from '../views/Home.vue'
import Contact from '../views/Contact'
import Search from '../views/Search'
import TermConditions from '../views/TermsConditions'
import View404 from '../views/404'
/* Auth */
import Login from '../views/auth/Login'
import SignUp from '../views/auth/SignUp'
import ForgotPassword from '../views/auth/ForgotPassword'
/* Account */
import AccountEdit from '../views/account/Edit'
import AccountCars from '../views/account/Cars'
/* Car */
import CarIndex from '../views/car/Index'
import CarCreate from '../views/car/Create'
import OwnerCreate from '../views/car/Owner'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/settings/edit',
        name: 'account.edit',
        component: AccountEdit,
        meta: {
            authRequired: true
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        beforeEnter(routeTo, routeForm, next) {
            if (store.getters['auth/loggedIn']) {
                next({ name: 'home' });
            }
            else {
                next();
            }
        }
    },
    {
        path: '/logout',
        name: 'logout',
        meta: {
            authRequired: true,
        },
        beforeEnter(routeTo, routeFrom, next) {
            store.dispatch('auth/logOut');
            const authRequiredOnPreviousRoute = routeFrom.matched.some(
                route => route.meta.authRequired
            );
            // Navigate back to previous page, or home as a fallback
            next(authRequiredOnPreviousRoute ? { name: 'login' } : { ...routeFrom });
        }
    },
    {
        path: '/signup',
        name: 'signup',
        component: SignUp,
        beforeEnter(routeTo, routeForm, next) {
            if (store.getters['auth/loggedIn']) {
                next({ name: 'home' });
            }
            else {
                next();
            }
        }
    },
    {
        path: '/reset-password',
        name: 'reset-password',
        component: ForgotPassword,
        meta: {
            authRequired: false,
        },
    },
    {
        path: '/search',
        name: 'search',
        component: Search
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
        path: '/cars',
        component: CarIndex,
        meta: {
            authRequired: true,
        },
        children: [
            {
                path: 'create',
                name: 'car.create',
                component: CarCreate,
                meta: {
                    authRequired: true,
                },
            },
            {
                path: 'list',
                name: 'car.list',
                component: AccountCars,
                meta: {
                    authRequired: true
                }
            },
            {
                path: 'owner',
                name: 'car.owner',
                component: OwnerCreate,
                meta: {
                    authRequired: true
                }
            },
        ]
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
