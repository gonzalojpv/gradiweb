<template>
    <section class="page search">
        <div class="texture-bg"></div>
        <div class="container-fluid caption">
            <div class="row">
                <div class="col-12">
                    <SearchBox/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import SearchBox from '../components/SearchBox'

    export default {
        components: {
            SearchBox,
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../sass/_variables';

    section.search {
        position: relative;
        height: auto;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        padding-bottom: 1rem;
        padding-top: 1rem;
        background-image: url('../../images/bg/search.jpg');

        @include media-breakpoint-up(md) {
            padding-top: 6rem;
            height: 100%;
            min-height: 100vh;
        }
    }
</style>
