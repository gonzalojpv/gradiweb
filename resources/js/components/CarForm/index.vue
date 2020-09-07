<template>
    <article class="form-car">
        <form
            @submit.prevent="onSubmit"
            class="form-1">

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


            <div class="form-group text-center mt-5">
                <button
                    type="submit"
                    :disabled="tryingToLogIn"
                    class="btn btn-primary">
                    {{ submit }}
                </button>
            </div>
        </form>
    </article>
</template>

<script>
    import { required } from 'vuelidate/lib/validators'
    import { carMethods } from '../../store/helper'

    export default {
        data() {
            return {
                submit        : 'Add Car',
                authError     : null,
                tryingToLogIn : false,
                brands: [ 'Audi', 'Bentley', 'BMW', 'Bugatti', 'Changan', 'GM/Chevrolet', 'Chrysler', 'Dodge', 'Fiat', 'Ferrari', 'Ford', 'Honda', 'Hyundai', 'Nissan' ],
                form: {
                    alias: null,
                    plate: null,
                    brand: null,
                    type: null,
                    model: null,
                }
            }
        },
        methods: {
            ...carMethods,
            onSubmit(evt) {
                evt.preventDefault();
                this.$v.form.$touch();

                if ( ! this.$v.form.$invalid ) {
                    this.tryingToLogIn = true;
                    this.authError = null;
                    this.submit = 'Sending...';

                    this.createCar(this.form).then( (response) => {

                        this.submit = 'Add Car';
                        this.tryingToLogIn = false;

                        if (response.success) {
                            swal("Good!", "retrieved successfully ", "success").then( () => {
                                this.$router.push({ name: 'car.list'})
                            });
                        }
                    }).catch( (error) => {
                        this.tryingToLogIn = false;
                        this.submit = 'Add Car';
                        this.authError = error.response.data.message;
                    });
                }
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
                }
            }
        }
    }
</script>
