<template>
    <section class="page create-car">
        <div class="container caption h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <h2>Add new car</h2>
                            <hr>
                            <p>Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <CarForm/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import CarForm from '../../components/CarForm'

    export default {
        components: {
            CarForm,
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    section.create-car {
        position: relative;
        height: auto;
        background-image: url('../../../images/bg/login.jpg');
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
