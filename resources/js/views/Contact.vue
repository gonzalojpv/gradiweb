<template>
    <section class="page-contact">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center ">
                <div class="col-12 col-sm-8 text-center marco">
                    <h1 class="text-center text-secundary">{{ title }}</h1>
                    <p class="text-gray">{{ paragraph }}</p>
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

        @include media-breakpoint-up(md) {
            padding-top: 0;
            padding-bottom: 0;
            height: 100%;
            min-height: 100vh;
        }
    }
</style>
