<template>
    <section class="shortcode-mb shortcode-slider">
        <div class="texture-bg"></div>

        <div
            :id="id"
            class="carousel slide"
            data-ride="carousel">

            <div class="carousel-inner">
                <div
                    v-for="(item, index) in items"
                    :key="index"
                    :class="{ 'active': !index?true:false }"
                    :style="{ 'background-image': 'url('+ item.image +')' }"
                    class="carousel-item slider-image">

                    <div class="container">
                        <div class="row carousel-item-content">
                            <div class="col-12 p-0">
                                <div class="container carousel-footer p-0">
                                    <div class="col-12 carousel-footer-inner"></div>
                                </div>
                                <div class="carousel-caption d-md-block">
                                    <h1>{{ item.title }}</h1>
                                    <hr>
                                    <p>{{ item.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <a
                class="carousel-control-prev"
                :href="'#' + id"
                role="button"
                data-slide="prev">
                <span class="icon carousel-control-prev-icon color-white" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a
                class="carousel-control-next"
                :href="'#' + id"
                role="button"
                data-slide="next">
                <span class="icon carousel-control-next-icon color-white" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                id: 'carousel-id-Controls',
                items: [
                    {
                        title: 'Lorem ipsum dolor',
                        description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla.',
                        image: require('../../../images/slider/slider-1.jpg')
                    },
                    {
                        title: 'Lorem ipsum dolor',
                        description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla.',
                        image: require('../../../images/slider/slider-2.jpg')
                    },
                    {
                        title: 'Lorem ipsum dolor',
                        description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla.',
                        image: require('../../../images/slider/slider-3.jpg')
                    },
                    {
                        title: 'Lorem ipsum dolor',
                        description: 'Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla.',
                        image: require('../../../images/slider/slider-4.jpg')
                    },
                ]
            }
        }
    }
</script>
