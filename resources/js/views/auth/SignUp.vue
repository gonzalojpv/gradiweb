<template>
    <section class="section-signup bg-green">
        <div class="texture-bg"></div>
        <div class="container h-100 ">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-sm-5">
                    <div class="panel">
                        <div class="panel-body">
                            <SignUpForm/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import SignUpForm from '../../components/SignUpForm'

    export default {
        components: {
            SignUpForm,
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    .section-signup {
        position: relative;
        height: auto;
        padding-top: 1rem;
        padding-bottom: 1rem;
        background-image: url('../../../images/bg/login.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;

        @include media-breakpoint-up(md) {
            padding-top: 4rem;
            height: 100%;
            min-height: 100vh;
        }
    }
</style>
