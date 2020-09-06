<template>
    <header class="banner fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <router-link
                    class="navbar-brand"
                    :to="{ name: 'home' }">
                    <div class="logo"></div>
                </router-link>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon navbar-toggler-icon color-white"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div
                        id="mainMenu"
                        class="m-auto">
                        <ul
                            id="menu-main"
                            class="navbar-nav m-auto">
                            <li class="menu-item nav-item">
                                <router-link
                                    class="nav-link"
                                    :to="{ name: 'about' }">Quiénes somos</router-link>
                            </li>
                            <li class="menu-item nav-item">
                                <router-link
                                    class="nav-link"
                                    :to="{ name: 'contact' }">Contáctanos</router-link>
                            </li>
                            <li class="menu-item nav-item">
                                <router-link
                                    class="nav-link"
                                    :to="{ name: 'login' }">Reservar</router-link>
                            </li>
                            <li
                                v-if="!loggedIn"
                                class="menu-item nav-item">
                                <router-link
                                    class="nav-link"
                                    :to="{ name: 'signup' }">Registrarse</router-link>
                            </li>
                        </ul>
                    </div>

                    <div class="my-2 my-lg-0">
                        <div class="header-actions">
                            <ul v-if="!loggedIn">
                                <li class="search">
                                    <router-link
                                        class="icon search color-white"
                                        :to="{ name: 'search' }"></router-link>
                                </li>
                                <li class="login">
                                    <router-link
                                        class="icon login color-white"
                                        :to="{ name: 'login' }"></router-link>
                                </li>
                            </ul>
                            <MenuUserHeader :user="getCurrentUser" v-else/>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
    </header>
</template>

<script>
    import { authComputed } from '../../store/helper'
    import MenuUserHeader from '../../components/MenuUserHeader'

    export default {
        components: {
            MenuUserHeader
        },
        computed: {
            ...authComputed,
        }
    }
</script>
