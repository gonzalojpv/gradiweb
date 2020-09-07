<template>
    <div class="form-signup">
        <form
            class="login"
            @submit.prevent="onSubmit">
            <h4 class="text-center text-dark">Crea tu cuenta</h4>
            <div class="text-center">
                <div
                    v-if="authError"
                    class="alert alert-secondary error-message text-orange-dark" v-text="authError"></div>
            </div>

            <div class="form-row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            name="first_name"
                            v-model.trim="$v.form.first_name.$model"
                            autocomplete="first_name"
                            autofocus
                            :class="{ 'is-invalid': $v.form.first_name.$error }"
                            placeholder="Nombre(s)">
                        <div
                            v-if="!$v.form.first_name.required"
                            class="invalid-feedback">
                            Su nombre es obligatorio.
                        </div>
                        <div
                            v-if="!$v.form.first_name.minLength"
                            class="invalid-feedback">
                            El nombre de usuario debe tener al menos {{ $v.form.first_name.$params.minLength.min }} letras.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            name="last_name"
                            v-model.trim="$v.form.last_name.$model"
                            autocomplete="last_name"
                            autofocus
                            :class="{ 'is-invalid': $v.form.last_name.$error }"
                            placeholder="Apellidos">
                        <div
                            v-if="!$v.form.last_name.required"
                            class="invalid-feedback">
                            Ingrese su apellido por favor.
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <input
                        type="email"
                        class="form-control"
                        v-model.trim="$v.form.email.$model"
                        autocomplete="email"
                        :class="{ 'is-invalid': $v.form.email.$error }"
                        placeholder="Email">
                        <span
                            v-if="!$v.form.email.required"
                            class="invalid-feedback">
                            Correo es obligatorio.
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    autocomplete="new-password"
                    :class="{ 'is-invalid': $v.form.password.$error }"
                    v-model.trim="$v.form.password.$model"
                    placeholder="Password">
                <span
                    v-if="!$v.form.password.required"
                    class="invalid-feedback">
                        Password es obligatorio.
                </span>
            </div>

            <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    name="confirm_password"
                    autocomplete="confirm_password"
                    v-model.trim="$v.form.c_password.$model"
                    :class="{ 'is-invalid': $v.form.c_password.$error }"
                    placeholder="Confirmar password">
                <span
                    v-if="!$v.form.c_password.sameAsPassword"
                    class="invalid-feedback">
                    Las contraseñas deben ser idénticas.
                </span>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <input
                        type="checkbox"
                        :class="{ 'is-invalid': $v.form.terms.$error }"
                        v-model="form.terms"
                        class="styled">
                        <router-link
                            class="term-link"
                            target="_blank"
                            :to="{ name:'term-conditions' }"> Acepto términos, condiciones y políticas de privacidad.</router-link>
                        <span
                            v-if="!$v.form.terms.required"
                            class="invalid-feedback">
                                Es necesario que aceptes nuestros Términos y Condiciones para continuar.
                        </span>
                </div>
            </div>

            <div class="form-group text-center mt-5">
                <button
                    type="submit"
                    :disabled="tryingToLogIn"
                    class="btn btn-primary">
                    {{ submit }}
                </button>
            </div>

            <div class="content-divider text-muted form-group"><span>Ya tienes cuenta?</span></div>
            <router-link
                :to="{ name: 'login'}"
                class="btn btn-link btn-block content-group">Iniciar Sesión</router-link>

        </form>
    </div>
</template>

<script>
    import {
        authMethods,
        authComputed
    } from '../../store/helper'
    import {
        required,
        minLength,
        email,
        // eslint-disable-next-line no-unused-vars
        sameAsPassword,
        sameAs
    } from 'vuelidate/lib/validators'

    export default {
        data() {
          return {
            submit        : 'Registrarse',
            authError     : null,
            tryingToLogIn : false,
            form: {
                terms:        null,
                first_name:   '',
                last_name:    '',
                email:        null,
                password:     null,
                c_password:   null,
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

                    this.signUp(this.form).then( (response) => {

                        this.submit = 'Registrarse';

                        if (response.success) {
                            this.$router.push({ name: 'confirm-account'})
                        }
                        else {
                            this.tryingToLogIn = false;
                            this.submit = 'Registrarse';
                        }
                    }).catch( (error) => {
                        this.tryingToLogIn = false;
                        this.submit = 'Registrarse';
                        this.authError = error.response.data.message;
                    });
                }
            }
        },
        validations: {
            form: {
                first_name: {
                    required,
                    minLength: minLength(4)
                },
                last_name: {
                    required,
                    minLength: minLength(4)
                },
                email: {
                    email,
                    required
                },
                password: {
                    required,
                    minLength: minLength(6),
                },
                c_password: {
                    sameAsPassword: sameAs('password'),
                },
                terms: {
                    required
                }
            }
        }
    }
</script>
