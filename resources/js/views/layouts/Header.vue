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
                                    :to="{ name: 'home' }">Inicio</router-link>
                            </li>
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
                        </ul>
                    </div>
                </div>

            </nav>
        </div>
    </header>
</template>
