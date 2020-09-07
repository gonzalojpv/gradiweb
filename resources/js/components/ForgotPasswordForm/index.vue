<template>
    <article class="form">

        <div class="row">
            <div class="col">
                <form
                    autocomplete="off"
                    @submit.prevent="requestResetPassword"
                    class="form-1">
                    <div class="form-group">
                        <label class="form-label">Email:</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model.trim="$v.form.email.$model"
                            :class="{ 'is-invalid': $v.form.email.$error }"
                            placeholder="Your email address ...">
                        <small class="form-text text-muted">We will email you with info on how to reset your password.</small>
                        <span
                            v-if="!$v.form.email.required"
                            class="invalid-feedback">
                            El correo es obligatorio.
                        </span>
                    </div>
                    <button class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
    </article>
</template>

<script>
    import { authMethods } from '../../store/helper';

    import { required, email } from 'vuelidate/lib/validators';

    export default {

        data() {
            return {
                tryingTo: false,
                has_error: null,
                submit: 'Enviar Link',
                form: {
                    email: null
                }
            }
        },
        methods: {
            ...authMethods,
            requestResetPassword(evt) {
                evt.preventDefault();

                this.$v.form.$touch();

                this.tryingTo = true;
                this.has_error = null;

                if ( ! this.$v.form.$invalid ) {
                    this.submit = 'Enviando...';
                    return this.resetPassword(this.form).then( (response) => {
                        if ( response.success ) {
                            this.$router.push({ name: 'reset-password-notification'});
                        }
                    });
                }
                else {
                    this.tryingTo = false;
                    this.submit = 'Enviar Link';
                }
            }
        },
        validations: {
            form: {
                email: {
                    required,
                    email,
                }
            }
        }
    }
</script>
