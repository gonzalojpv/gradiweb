<template>
    <article class="account-form">
        <form
            class="form-1"
            @submit.prevent="onSubmit">

            <div class="page-separator">
                <div class="page-separator__text">BASIC INFORMATION</div>
            </div>

            <div class="form-group">
                <label for="first_name">FIRST NAME</label>
                <input
                    type="text"
                    id="first_name"
                    v-model.trim="$v.form.first_name.$model"
                    :class="{ 'is-invalid': $v.form.first_name.$error }"
                    class="form-control">
                 <span
                    v-if="!$v.form.first_name.required"
                    class="invalid-feedback">
                    Required
                </span>
            </div>

            <div class="form-group">
                <label for="last_name">LAST NAME</label>
                <input
                    type="text"
                    id="last_name"
                    v-model.trim="$v.form.last_name.$model"
                    :class="{ 'is-invalid': $v.form.last_name.$error }"
                    class="form-control">
                 <span
                    v-if="!$v.form.last_name.required"
                    class="invalid-feedback">
                    Required
                </span>
            </div>

            <div class="form-goup">
                <label for="email">EMAIL ADDRESS</label>
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

            <button
                type="submit"
                :disabled="tryingTo"
                class="btn btn-primary mt-4">
                <span
                    v-if="tryingTo"
                    class="spinner-border spinner-border-sm"
                    role="status"
                    aria-hidden="true"></span>
                {{ submit }}
            </button>
        </form>
    </article>
</template>

<script>
    import { required, email } from 'vuelidate/lib/validators'
    import { authMethods } from '../../store/helper'
    import swal from 'sweetalert'

    export default {
        props: {
            data: {
                type: Object,
                required: true,
            }
        },
        data() {
            return {
                submit: 'Save changes',
                tryingTo:  false,
                form: {
                    username: null,
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone_number: null,
                }
            }
        },
        mounted() {

            this.form.username = this.data.username;
            this.form.first_name = this.data.first_name;
            this.form.last_name = this.data.last_name;
            this.form.email = this.data.email;
            this.form.phone_number = this.data.phone_number;
        },
        methods: {
            ...authMethods,
            onSubmit() {
                this.$v.form.$touch();

                if ( ! this.$v.form.$invalid ) {
                    this.tryingTo = true;

                    return this.updateData({
                        id: this.data.id,
                        params: this.form
                    }).then( (Response) => {
                        this.tryingTo = false;
                        this.submit = 'Save changes';

                        if ( Response.success ) {
                            swal("Good!", 'Update  successfully', 'success');
                        }
                    }).catch( (Error) => {
                        this.tryingTo = false;
                        this.submit = 'Save changes';
                        console.log(Error);
                    });
                }
            }
        },
        validations: {
            form: {
                first_name: {
                    required
                },
                last_name: {
                    required
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
