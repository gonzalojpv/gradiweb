<template>
    <section class="page-contact">
        <div class="texture-bg"></div>
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center ">
                <div class="col-12 col-sm-8 text-center">
                    <div class="caption">
                        <h1 class="text-center text-primary">{{ title }}</h1>
                        <p class="text-white">{{ paragraph }}</p>
                    </div>
                    <ContactForm/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import ContactForm from '../components/ContactForm'

    export default {
         components: {
            ContactForm
        },
        data() {
            return {
                title: 'Contáctanos',
                paragraph: 'Envíanos un mensaje y nos comunicaremos contigo.',
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../sass/_variables';

    section.page-contact {
        position: relative;
        height: auto;
        padding-top: 1rem;
        padding-bottom: 1rem;
        background-image: url('../../images/bg/contact.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;

        @include media-breakpoint-up(md) {
            padding-top: 0;
            padding-bottom: 0;
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
