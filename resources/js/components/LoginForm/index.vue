<template>
    <article class="login-form">
        <form
            class="form-1"
            @submit.prevent="onSubmit">
            <h4 class="text-center text-dark">Iniciar Sesión</h4>
            <div class="text-center">
                <div
                    v-if="authError"
                    class="alert alert-warning">
                    <small
                        v-text="authError"
                        class="text-dark-light"></small>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label class="form-label" for="email">Email:</label>
                <input
                    type="email"
                    class="form-control"
                    v-model.trim="$v.form.email.$model"
                    :class="{ 'is-invalid': $v.form.email.$error }"
                    placeholder="Your email address ...">
                    <span
                        v-if="!$v.form.email.required"
                        class="invalid-feedback">
                        Correo es obligatorio.
                    </span>

            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password:</label>
                <input
                    type="password"
                    class="form-control"
                    :class="{ 'is-invalid': $v.form.password.$error }"
                    v-model.trim="$v.form.password.$model"
                    placeholder="Password">
                    <span
                        v-if="!$v.form.password.required"
                        class="invalid-feedback">
                            Password es obligatorio.
                    </span>
                    <p class="text-right">
                        <router-link
                            class="small"
                            :to="{ name: 'reset-password' }">Forgot your password?</router-link>
                    </p>
            </div>

            <div class="form-group text-center mt-5">
                <button
                    type="submit"
                    :disabled="tryingToLogIn"
                    class="btn btn-primary">
                    {{ submit }}
                </button>
            </div>

            <div class="content-divider text-muted form-group"><span>No tengo una cuenta?</span></div>
            <router-link
                :to="{ name: 'signup'}"
                class="btn btn-link btn-block content-group">Regístrate</router-link>
            <span class="help-block text-center no-margin">Al continuar, confirma que ha leído nuestro <router-link target="_blank" :to="'term-conditions'">Términos y condiciones</router-link></span>

        </form>
    </article>
</template>

<script>
    import {
        authMethods,
        authComputed
    } from '../../store/helper'

    import {
        required,
        email,
    } from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                submit        : 'Iniciar sesión',
                authError     : null,
                tryingToLogIn : false,
                form: {
                    email         : null,
                    password      : null,
                }
          };
        },
        computed: {
            ...authComputed,
        },
        methods: {
            ...authMethods,
            onSubmit(evt) {
                evt.preventDefault();

                this.$v.form.$touch();

                if ( ! this.$v.form.$invalid ) {
                    this.tryingToLogIn = true;
                    this.authError = null;
                    this.submit = 'Enviando...';

                    this.logIn({
                        email: this.form.email,
                        password: this.form.password,
                    }).then((response) => {

                        if (response.success) {
                            this.$router.push({ name: 'home'});
                        }
                    }).catch( (error) => {
                        this.tryingToLogIn = false;
                        this.submit = 'Iniciar Sesión';

                        console.log(error.response.data);

                        if (error.response && error.response.data.message) {
                            this.authError = error.response.data.message;
                        }
                        else {
                            this.authError = 'Lo sentimos ocurrio un error.';
                        }
                    });
                }
            }
        },
        validations: {
            form: {
                email: {
                    email,
                    required
                },
                password: {
                    required
                }
            }
        }
    }
</script>
