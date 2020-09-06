<template>
    <section class="page home">
        <Slider/>
        <ServicesList/>
    </section>
</template>

<script>
    import Slider from '../components/Slider'
    import ServicesList from '../components/ServicesList'

    export default {
        components: {
            Slider,
            ServicesList
        }
    }
</script>
