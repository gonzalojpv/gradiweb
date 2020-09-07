<template>
    <section class="page owner">
        <div class="container caption h-100">
            <div class="row">
                <div class="col-12">
                    <h2>Nuevo Propietario</h2>
                    <hr>
                    <p>Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam</p>
                </div>
            </div>
            <form
                @submit.prevent="onSubmit"
                class="form-1">

                 <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="panel">
                            <div class="panel-body">
                                <h4 class="text-center text-dark">Propietario</h4>

                                <div class="form-row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="first_name">Nombres</label>
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
                                            <label for="last_name">Apellidos</label>
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

                                <div class="form-goup">
                                    <label for="email">EMAIL</label>
                                    <input
                                        type="email"
                                        id="email"
                                        v-model.trim="$v.form.email.$model"
                                        :class="{ 'is-invalid': $v.form.email.$error }"
                                        class="form-control">
                                    <small class="form-text text-white">Note that if you change your email, you will have to confirm it again.</small>
                                    <span
                                        v-if="!$v.form.email.required"
                                        class="invalid-feedback">
                                        Required
                                    </span>
                                </div>

                                <div class="form-goup">
                                    <label for="phone_number">Phone</label>
                                    <input
                                        type="text"
                                        id="phone_number"
                                        v-model.trim="$v.form.phone_number.$model"
                                        :class="{ 'is-invalid': $v.form.phone_number.$error }"
                                        class="form-control">
                                    <span
                                        v-if="!$v.form.phone_number.required"
                                        class="invalid-feedback">
                                        Required
                                    </span>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="panel">
                            <div class="panel-body">
                                <h4 class="text-center text-dark">Vehículo</h4>
                                <article class="form-car">
                                    <div class="form-group">
                                        <label for="alias">Alias</label>
                                        <input
                                            type="text"
                                            id="alias"
                                            v-model.trim="$v.form.alias.$model"
                                            :class="{ 'is-invalid': $v.form.alias.$error }"
                                            class="form-control">
                                        <div
                                            v-if="!$v.form.alias.required"
                                            class="invalid-feedback">
                                            Required
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="plate">Nº Placa</label>
                                        <input
                                            type="text"
                                            id="plate"
                                            v-model.trim="$v.form.plate.$model"
                                            :class="{ 'is-invalid': $v.form.plate.$error }"
                                            class="form-control">
                                        <div
                                            v-if="!$v.form.plate.required"
                                            class="invalid-feedback">
                                            Required
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="brand">Marca</label>
                                        <v-select
                                            id="brand"
                                            placeholder="Marca"
                                            v-model.trim="form.brand"
                                            class="form-control"
                                            :class="{ 'is-invalid': $v.form.brand.$error }"
                                            :options="brands">
                                        </v-select>
                                        <div
                                            v-if="!$v.form.brand.required"
                                            class="invalid-feedback">
                                            Required
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Tipo de vehículo</label>
                                        <input
                                            type="text"
                                            id="type"
                                            v-model.trim="$v.form.type.$model"
                                            :class="{ 'is-invalid': $v.form.type.$error }"
                                            class="form-control">
                                        <div
                                            v-if="!$v.form.type.required"
                                            class="invalid-feedback">
                                            Required
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="model">Modelo</label>
                                        <input
                                            type="number"
                                            placeholder="YYYY"
                                            min="1990"
                                            max="2020"
                                            id="model"
                                            v-model.trim="$v.form.model.$model"
                                            :class="{ 'is-invalid': $v.form.model.$error }"
                                            class="form-control">
                                        <div
                                            v-if="!$v.form.model.required"
                                            class="invalid-feedback">
                                            Required
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-sm-4">
                        <button
                            type="submit"
                            :disabled="tryingToLogIn"
                            class="btn btn-primary btn-block">
                            {{ submit }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </section>
</template>

<script>
    import { required, email, minLength } from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                submit        : 'Crear',
                authError     : null,
                tryingToLogIn : false,
                brands: [ 'Audi', 'Bentley', 'BMW', 'Bugatti', 'Changan', 'GM/Chevrolet', 'Chrysler', 'Dodge', 'Fiat', 'Ferrari', 'Ford', 'Honda', 'Hyundai', 'Nissan' ],
                form: {
                    alias: null,
                    plate: null,
                    brand: null,
                    type: null,
                    model: null,
                    first_name:   '',
                    last_name:    '',
                    email: null,
                    phone_number: null,
                }
            }
        },
        methods: {
            onSubmit() {
                console.log('onSubmit');
            }
        },
        validations: {
            form: {
                alias: {
                    required
                },
                plate: {
                    required
                },
                brand: {
                    required
                },
                type: {
                    required
                },
                model: {
                    required
                },
                first_name: {
                    required,
                    minLength: minLength(4)
                },
                last_name: {
                    required,
                    minLength: minLength(4)
                },
                email: {
                    required,
                    email
                },
                phone_number: {
                    required,
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    section.owner {
        position: relative;
        height: auto;
        background-image: url('../../../images/bg/search.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        padding-bottom: 1rem;
        padding-top: 1rem;

        @include media-breakpoint-up(md) {
            padding-top: 6rem;
            height: 100%;
            min-height: 100vh;
        }
    }
</style>
