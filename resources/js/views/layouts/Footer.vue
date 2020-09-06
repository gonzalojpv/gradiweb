<template>
     <footer>
        <div class="container pb-2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="logo-info">
                        <router-link :to="{ name: 'home' }">
                            <div class="logo"></div>
                        </router-link>
                        <p>¿Mollis pretium lorem? ¿Dignissim lacus convallis massa? </p>
                        <p>Dapibus imperdiet praesen...</p>
                    </div>
                </div>
                <div class="col-12 col-sm-3 col-md-4 col-lg-3">
                    <div class="menu-links">
                        <h5 class="text-secondary">Links útiles</h5>
                        <ul>
                            <li>
                                <router-link
                                    :to="{ name: 'search' }">
                                    Buscar
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: 'home' }">
                                    Sé parte de
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: 'about' }">
                                    Quiénes somos
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: 'contact' }">
                                    Contáctanos
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-3 col-md-4 col-lg-2">
                    <div class="menu-links">
                        <h5 class="text-secondary"> Massa curae ¡YA!</h5>
                        <ul>
                            <li>
                                <router-link
                                    :to="{ name: 'login' }">
                                    Login
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: 'signup' }">
                                    Registrarse
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-3 col-md-4 col-lg-3 text-right">
                    <div class="btn-group btn-icon-social" role="group" aria-label="Basic example">
                        <a href="/" target="_blank" class="btn facebook"></a>
                        <a href="/" target="_blank" class="btn instagram"></a>
                        <a href="#" class="btn twitter"></a>
                    </div>

                    <router-link :to="{ name: 'term-conditions' }" class="btn btn-link">Términos y condiciones</router-link>
                    <router-link :to="{ name: 'term-conditions' }" class="btn btn-link">Aviso de Privacidad</router-link>
                    <router-link :to="{ name: 'term-conditions' }" class="btn btn-link">Aviso de uso de cookies</router-link>
                </div>
            </div>
        </div>

        <div class="copy-right bg-secondary">
            <p class="text-dark text-center">Parqueaderos 4 ruedas | Todos los derechos reservados. México, 2020</p>
        </div>
    </footer>
</template>
