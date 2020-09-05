<template>
    <section class="section-contact">
          <form
            class="login"
            @submit.prevent="onSubmit">
            <div class="form-row">
                <div class="col-12 col-sm-6 mb-3">
                    <input
                        type="text"
                        v-model="form.first_name"
                        class="form-control"
                        :class="{ 'is-invalid': $v.form.first_name.$error }"
                        placeholder="Nombre">
                        <div
                            v-if="!$v.form.first_name.required"
                            class="invalid-feedback">
                            Nombre es obligatorio.
                        </div>
                </div>
                <div class="col-12 col-sm-6 mb-3">
                    <input
                        type="text"
                        v-model="form.last_name"
                        :class="{ 'is-invalid': $v.form.last_name.$error }"
                        class="form-control"
                        placeholder="Apellido">
                        <div
                            v-if="!$v.form.last_name.required"
                            class="invalid-feedback">
                            El apellido es obligatorio.
                        </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-sm-8 mb-3">
                    <input
                        type="email"
                        v-model="form.email"
                        :class="{ 'is-invalid': $v.form.email.$error }"
                        class="form-control"
                        placeholder="Email">
                        <div
                            v-if="!$v.form.email.required"
                            class="invalid-feedback">
                            Email es obligatorio.
                        </div>
                </div>
                <div class="col-12 col-sm-4 mb-3">
                    <input
                        type="text"
                        v-model.trim="$v.form.phone_number.$model"
                        class="form-control"
                        v-mask="'##########'"
                        :class="{ 'is-invalid': $v.form.phone_number.$error }"
                        placeholder="Teléfono">
                        <div
                            v-if="!$v.form.phone_number.required"
                            class="invalid-feedback">
                            Teléfono es obligatorio.
                        </div>
                </div>
            </div>
                <div class="form-row">
                <div class="col-12 col-sm-8 mb-3">
                    <textarea
                        rows="5"
                        v-model="form.note"
                        :class="{ 'is-invalid': $v.form.note.$error }"
                        placeholder="Mensaje"
                        class="form-control"></textarea>
                        <div
                            v-if="!$v.form.note.required"
                            class="invalid-feedback">
                            Por favor agregue un mensaje.
                        </div>
                </div>
                <div class="col-12 col-sm-4 mb-3">
                    <select
                        v-model="form.user_type"
                        :class="{ 'is-invalid': $v.form.user_type.$error }"
                        class="form-control">
                        <option>...</option>
                        <option value="musico">Soy musico</option>
                        <option value="customer">Soy cliente</option>
                    </select>
                    <div
                        v-if="!$v.form.note.required"
                        class="invalid-feedback">
                        Por favor selecciona un opción.
                    </div>

                    <div class="mt-4">
                        <button
                            type="submit"
                            :disabled="tryingTo"
                            class="btn btn-primary">
                            {{ submit }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</template>

<script>
    import {
        required,
        minLength,
        email,
    } from 'vuelidate/lib/validators'
    import { mask } from 'vue-the-mask'
    import swal from 'sweetalert'
    import { contactComputed, contactMethods } from '../../store/helper'

    export default {
        directives: {
            mask
        },
        data() {
            return {
                items: [],
                submit: 'Enviar',
                tryingTo: false,
                form: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    phone_number: '',
                    user_type: '',
                }
            }
        },
        computed: {
            ...contactComputed,
        },
        methods: {
            ...contactMethods,
            onSubmit(evt) {
                evt.preventDefault();

                this.$v.$touch();

                let self = this;

                if ( ! this.$v.$invalid ) {
                    this.tryingTo = true;
                    this.submit = 'Enviando...';

                    this.sendContact(this.form).then( (response) => {
                        if ( response.success ) {
                            self.tryingTo = false;
                            self.submit = 'Enviar';

                            swal("Gracias por contactarnos", 'Un colaborador se pondra en contacto contigo.', "success").then( () => {
                                self.clearForm();
                            });
                        }
                    });
                }
            },
            clearForm() {
                this.form.first_name = '';
                this.form.last_name = '';
                this.form.email = '';
                this.form.phone_number = '';
                this.form.user_type = '';
                this.form.customer_id = '';

                this.$v.$reset();
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
                    required,
                    email,
                },
                phone_number: {
                    required,
                },
                user_type: {
                    required,
                },
                note: {
                    required,
                    minLength: minLength(4)
                },
            }
        },
    }
</script>

<style lang="scss" scoped>
    section.section-contact {
        position: relative;
        padding-top: 1rem;
        z-index: 4;
    }
</style>
