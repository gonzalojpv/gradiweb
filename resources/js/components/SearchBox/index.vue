<template>
    <article class="search-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase text-center text-white">BUSCA. ENCUENTRA!</h1>
                </div>
            </div>

            <div class="row row-search-form">
                <div class="col-12">
                    <form
                        class="search-box"
                        @submit.prevent="onSubmit">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        v-model.trim="form.query"
                                        :class="{ 'is-invalid': $v.form.query.$error }"
                                        placeholder="Escribe en nombre del propietario o placa..."
                                        class="form-control">
                                    <span
                                        v-if="!$v.form.query.required"
                                        class="invalid-feedback">
                                        Requerido.
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-1">
                                <div class="form-group text-center">
                                    <button
                                        class="btn bg-primary text-white btn-submit"
                                        type="submit">
                                        <span class="icon search color-white"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    import { required } from 'vuelidate/lib/validators'

    export default {
        data() {
            return {
                form: {
                    query: null
                }
            }
        },
        methods: {
            onSubmit(evt) {
                this.$v.form.$touch();

                if ( ! this.$v.form.$invalid ) {
                    this.$emit('onSearch', this.form);
                }
            }
        },
        validations: {
            form: {
                query: {
                    required
                },
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    article.search-box {
        position: relative;
        padding-top: 2rem;
        padding-bottom: 2rem;

        h1 {
            font-size: 3rem;
            margin-bottom: 2rem;
        }

        div.row-search-form {
            padding: 10px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.34);
        }
    }
</style>
