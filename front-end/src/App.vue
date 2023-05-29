<script setup>
  import Header from './presentation/components/Header.vue'
</script>

<template>
  <Header></Header>

  <div class="content">
    <router-view></router-view>
  </div>
</template>