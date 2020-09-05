<template>
    <section class="terms">
        <div class="texture-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col caption">
                    <h1 class="text-secondary">Términos y Condiciones</h1>

                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, urna consequat felis vehicula class ultricies mollis dictumst, aenean non a in donec nulla. Phasellus ante pellentesque erat cum risus consequat imperdiet aliquam, integer placerat et turpis mi eros nec lobortis taciti, vehicula nisl litora tellus ligula porttitor metus. </p>

                    <p>Vivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit, euismod libero facilisi aptent elementum felis blandit cursus gravida sociis erat ante, eleifend lectus nullam dapibus netus feugiat curae curabitur est ad. Massa curae fringilla porttitor quam sollicitudin iaculis aptent leo ligula euismod dictumst, orci penatibus mauris eros etiam praesent erat volutpat posuere hac. Metus fringilla nec ullamcorper odio aliquam lacinia conubia mauris tempor, etiam ultricies proin quisque lectus sociis id tristique, integer phasellus taciti pretium adipiscing tortor sagittis ligula. </p>
                    <p>Mollis pretium lorem primis senectus habitasse lectus scelerisque donec, ultricies tortor suspendisse adipiscing fusce morbi volutpat pellentesque, consectetur mi risus molestie curae malesuada cum. Dignissim lacus convallis massa mauris enim ad mattis magnis senectus montes, mollis taciti phasellus accumsan bibendum semper blandit suspendisse faucibus nibh est, metus lobortis morbi cras magna vivamus per risus fermentum. Dapibus imperdiet praesent magnis ridiculus congue gravida curabitur dictum sagittis, enim et magna sit inceptos sodales parturient pharetra mollis, aenean vel nostra tellus commodo pretium sapien sociosqu.</p>
                </div>
            </div>
        </div>
    </section>
</template>


<style lang="scss" scoped>
    @import '../../sass/_variables';

    section.terms {
        padding-top: 6rem;
        padding-bottom: 1rem;

        div.caption {
            position: relative;
            z-index: 4;

            p {
                color: map-get($theme-colors, white);
            }
        }
    }
</style>
