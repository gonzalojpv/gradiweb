<template>
    <article class="services-list">
        <div class="container">
            <div class="row align-items-center">

                <div class="d-flex col-md align-items-center mb-md-0 pb-md-0">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center">
                        <font-awesome-icon icon="video" />
                    </div>
                    <div class="flex">
                        <h6>8,000+ Dignissim</h6>
                        <p>Dignissim lacus convallis</p>
                    </div>
                </div>

                <div class="d-flex col-md align-items-center mb-md-0 pb-md-0">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center">
                        <font-awesome-icon icon="certificate" />
                    </div>
                    <div class="flex">
                        <h6>By Industry Experts</h6>
                        <p>Dapibus imperdiet praesent magnis.</p>
                    </div>
                </div>

                <div class="d-flex col-md align-items-center mb-md-0 pb-md-0">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center">
                        <font-awesome-icon icon="history" />
                    </div>
                    <div class="flex">
                        <h6>Unlimited Access</h6>
                        <p>Massa curae fringilla.</p>
                    </div>
                </div>

            </div>
        </div>
    </article>
</template>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    article.services-list {
        position: relative;
        background-color: map-get($theme-colors, white);
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e9edf2;

        div.rounded-circle {
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            color: map-get($theme-colors, white);
            font-size: 1.6rem;
            margin-right: 1rem;
        }

        div.flex {
            flex: 1 1 0%!important;
            justify-content: center;

            h6 {
                margin: 0;
            }

            p {
                font-size: 0.8125rem;
                font-weight: 300;
                margin: 0;
                line-height: 1.5;
            }
        }
    }
</style>
