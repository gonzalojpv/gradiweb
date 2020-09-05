<template>
  <div>
    <h1 :class="$style.title">
      404
      <span v-if="resource">
        {{ resource }}
      </span>
      Not Found
    </h1>
  </div>
</template>

<script>
  export default {
    page: {
      title: '404',
      meta: [{ name: 'description', content: '404' }],
    },
    props: {
      resource: {
        type: String,
        default: '',
      },
    },
  }
</script>

<style lang="scss" module>
.title {
  text-align: center;
}
</style>
