<template>
    <div id="app">
        <Header/>
        <div class="content">
            <transition
                name="fade"
                mode="out-in">
                <router-view/>
            </transition>
        </div>
        <Footer/>
  </div>
</template>

<script>
    import Header from './views/layouts/Header'
    import Footer from './views/layouts/Footer'

    export default {
        components: {
            Header,
            Footer
        }
    }
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
</style>
