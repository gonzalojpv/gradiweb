<template>
    <article class="page-section section-feedback">
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="page-headline text-center">
                        <h3>Feedback</h3>
                        <p class="lead mx-auto">What other students turned professionals have to say about us after learning with us and reaching their goals.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-sm-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div
                                v-for="(item, index) in getFeedbacks"
                                :key="index"
                                :class="{ 'active': !index?true:false }"
                                class="carousel-item">

                                <div class="card-carousel--card">
                                     <div class="card-carousel--card--body">
                                        <blockquote>
                                            <p>{{ item.details }}</p>
                                        </blockquote>
                                    </div>
                                    <div class="card-carousel--card--footer">
                                        <div class="media">
                                            <div class="media-left">
                                                <router-link :to="{ name:''}">
                                                </router-link>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="text-dark">{{ item.customer_name }}</h6>
                                                <Rating
                                                    :value="item.rating"
                                                    :disabled="true"
                                                    :id="'rate-user' + item.id"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span>
                                <font-awesome-icon icon="chevron-left"/>
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span>
                                <font-awesome-icon icon="chevron-right"/>
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </article>
</template>

<script>
    import { feedbackMethods, feedbackComputed } from '../../store/helper'
    import Rating from '../Rating'

    export default {
        components: {
            Rating
        },
        data() {
            return {
                currentOffset: 0,
                windowSize: 1,
                paginationFactor: 420,
            }
        },
        created() {
            this.fetchFeedbacks();
        },
        computed: {
            ...feedbackComputed,
            atEndOfList() {
                return this.currentOffset <= (this.paginationFactor * -1) * (this.getFeedbacks.length - this.windowSize);
            },
            atHeadOfList() {
                return this.currentOffset === 0;
            },
        },
        methods: {
            ...feedbackMethods,
            moveCarousel(direction) {
                // Find a more elegant way to express the :style. consider using props to make it truly generic
                if (direction === 1 && !this.atEndOfList) {
                    this.currentOffset -= this.paginationFactor;
                } else if (direction === -1 && !this.atHeadOfList) {
                    this.currentOffset += this.paginationFactor;
                }
            },
        }
    }
</script>
