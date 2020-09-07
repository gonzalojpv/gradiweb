<template>
    <section class="page car">
        <div class="texture-bg"></div>
        <transition name="component-fade" mode="out-in">
            <router-view/>
        </transition>
    </section>
</template>

<style lang="scss" scoped>
    .component-fade-enter-active, .component-fade-leave-active {
        transition: opacity .4s ease;
    }
    .component-fade-enter, .component-fade-leave-to
    /* .component-fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
