<template>
    <section class="page-reset-password">
        <div class="texture-bg"></div>
        <div class="container caption">

            <div class="row">
                <div class="col-12">
                    <h1 class="text-primary">Reset Password</h1>
                    <p class="text-breadcrumb">ACCOUNT MANAGEMENT</p>

                    <div class="page-separator">
                        <div class="page-separator__text">Reset Password</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-5">
                    <div class="alert alert-soft-warning">
                        <div class="d-flex flex-wrap">
                            <small class="text-dark-light">An email with password reset instructions has been sent to your email address, if it exists on our system.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-8">
                    <ForgotPasswordForm/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import ForgotPasswordForm from '../../components/ForgotPasswordForm'

    export default {
        components: {
            ForgotPasswordForm,
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    section.page-reset-password {
        position: relative;
        height: auto;
        padding-top: 1rem;
        padding-bottom: 1rem;

        @include media-breakpoint-up(md) {
            padding-top: 6rem;
            padding-bottom: 0;
            height: 100%;
            min-height: 100vh;
        }

        div.texture-bg {
            height: 12%;
            background: linear-gradient(180deg, rgba(2, 4, 9, 0) 0%, #1D3741 1%);
        }

        div.caption {
            position: relative;
            z-index: 4;
        }

        h1 {
            font-weight: 600;
            font-size: 1.999rem;
            line-height: 1.5;
            margin-bottom: 0;
        }

        .text-breadcrumb {
            font-size: 0.8125rem;
            font-weight: 600;
            font-family: $font-header;
            color: map-get($theme-colors, gray-2);
        }
    }
</style>
