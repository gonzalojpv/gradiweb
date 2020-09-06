<template>
    <section class="page account-edit">
        <div class="texture-bg"></div>
        <div class="container caption">

            <div class="row">
                <div class="col-12">
                    <h3 class="text-secondary">Account</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-5">
                    <div class="panel">
                        <div class="panel-body">
                            <AccountForm
                                :data="getCurrentUser" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import AccountForm from '../../components/AccountForm'
    import { authComputed } from '../../store/helper'

    export default {
        components: {
            AccountForm
        },
        computed: {
            ...authComputed,
        },
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    section.account-edit {
        position: relative;
        height: auto;
        background-image: url('../../../images/bg/edit.jpg');
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

        div.texture-bg {
            position: absolute;
            z-index: 1;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, rgba(2, 4, 9, 0) 0%, #1D3741 100%);
            transform: rotate(180deg);
        }

        div.caption {
            position: relative;
            z-index: 4;
        }
    }
</style>
