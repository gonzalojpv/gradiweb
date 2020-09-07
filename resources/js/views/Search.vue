<template>
    <section class="page search">
        <div class="texture-bg"></div>
        <div class="container-fluid caption">

            <div class="row">
                <div class="col-12">
                    <SearchBox
                        @onSearch="handleAction"/>
                </div>
            </div>

            <div class="row">
                <div
                    v-for="(car, index) in getResults"
                    :key="index"
                    class="col-12 col-sm-3">
                    <CarBox :data="car"/>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
    import SearchBox from '../components/SearchBox'
    import { searchMethods, searchComputed } from '../store/helper'
    import CarBox from '../components/CarBox'

    export default {
        components: {
            SearchBox,
            CarBox
        },
        data() {
            return {
                scrollLoad: false,
                form: {
                    page: 1,
                    query: null,
                }
            }
        },
        mounted(){
            let self = this;
            $(window).scroll(function () {

                if (self.scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 300) {
                    self.form.page = self.form.page + 1;
                    console.log('entro');
                    self.onSearch();
                }
            });
        },
        computed: {
            ...searchComputed,
        },
        methods: {
            ...searchMethods,
            handleAction(form) {
                this.clearSearch();
                this.form.query = form.query;
                this.onSearch();
            },
            onSearch() {
                this.scrollLoad = false;

                this.fetchSearch(this.form).then((Response) => {
                    console.log(Response);
                    this.scrollLoad = Response.data.length;
                });
            }
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

        div.section-results {
            position: relative;

            ul {
                margin: 0;
                padding: 0;
                list-style: none;

                li {
                    display: block;
                    margin-bottom: 1rem;
                }
            }
        }
    }
</style>
