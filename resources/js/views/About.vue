<template>
    <section class="about shortcode-mb shortcode-about-us">
        <div class="texture-bg"></div>
        <div class="shortcode-about-us-content">

            <div class="container-fluid">
                <div class="row align-items-center">

                    <div class="col-md-12 col-lg-6 col-xl-6 p-0 shortcode-about-us-text">
                        <div
                            id="shortcode-about-us-current-image"
                            :style="{ 'background-image': 'url('+ image +')' }"
                            class="shortcode-about-us-current-image">
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 col-xl-5 p-0 shortcode-about-us-text">
                        <div
                            :id="id"
                            class="carousel slide"
                            data-ride="false">

                            <a
                                class="carousel-control-prev"
                                :href="'#' + id "
                                role="button"
                                data-slide="prev">
                                <span class="icon carousel-control-prev-icon color-white" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <div class="carousel-inner">
                                <div
                                    data-interval="90000"
                                    :data-carousel="'#' + id"
                                    v-for="(item, index) in items"
                                    :key="index"
                                    :class="{ 'active': !index?true:false }"
                                    class="carousel-item">

                                    <div class="carousel-caption">
                                        <h2 v-html="item.title"></h2>
                                        <hr>
                                        <p>{{ item.description }}</p>
                                    </div>
                                </div>
                            </div>

                            <a
                                class="carousel-control-next"
                                :href="'#' + id"
                                role="button"
                                data-slide="next">
                                <span class="icon carousel-control-next-icon color-white" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                id: 'carouselExampleIndicators',
                image: require('../../images/bg/about.jpg'),
                items: [
                    { title: '<span>About</span> Parqueaderos 4 ruedas', description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora tellus ligula porttitor metus.' },
                    { title: '<span>Our</span> History', description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec.' },
                    { title: '<span>Our</span> Values', description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec.' },
                    { title: '<span>Our</span> Vision', description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec.' },
                ]
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../sass/_variables';

    section.about {
        position: relative;
        height: auto;

        @include media-breakpoint-up(md) {
            padding-top: 0;
            height: 100%;
            min-height: 100vh;
        }
    }
</style>
