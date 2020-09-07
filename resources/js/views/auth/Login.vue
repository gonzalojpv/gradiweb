<template>
    <section class="page login">
        <div class="texture-bg"></div>
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-sm-4 caption">
                    <div class="panel">
                        <div class="panel-body">
                            <LoginForm/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import LoginForm from '../../components/LoginForm'

    export default {
        components: {
            LoginForm
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    section.login {
        position: relative;
        height: auto;
        background-image: url('../../../images/bg/login.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        padding-bottom: 1rem;
        padding-top: 1rem;

        @include media-breakpoint-up(md) {
            padding-top: 4rem;
            height: 100%;
            min-height: 100vh;
        }

        div.texture-bg {
            position: absolute;
            z-index: 1;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, rgba(2, 4, 9, 0) 0%, #1D3741 100%);
            transform: rotate(180deg);
        }

        div.caption {
            position: relative;
            z-index: 4;
        }
    }
</style>
