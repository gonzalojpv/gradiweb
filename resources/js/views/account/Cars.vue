<template>
    <section class="page cars">
        <div class="texture-bg"></div>
        <div class="container caption h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12">

                    <div class="row">
                        <div class="col">
                            <h2>Cars</h2>
                            <hr>
                            <p>Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam</p>
                        </div>
                    </div>

                    <div class="row">
                        <div
                            v-for="(item, index) in getAllCars"
                            :key="index"
                            class="col-12 col-sm-4">
                            <CarBox :data="item" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import CarBox from '../../components/CarBox'
    import { carComputed, carMethods } from '../../store/helper'

    export default {
        components: {
            CarBox
        },
        mounted() {
            this.fetchAllCars();
        },
        computed: {
            ...carComputed,
        },
        methods: {
            ...carMethods,
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    section.cars {
        position: relative;
        height: auto;
        background-image: url('../../../images/bg/create-car.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        padding-bottom: 1rem;
        padding-top: 1rem;

        @include media-breakpoint-up(md) {
            padding-top: 6rem;
            height: 100%;
            min-height: 100vh;
        }
    }

</style>
