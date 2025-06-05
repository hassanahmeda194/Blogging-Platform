<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Navbar from './components/Navbar.vue';
</script>

<template>

  <Navbar />
  <div class="lg:px-[5vw] pt-12">
    <transition name="fade" mode="out-in">
      <RouterView />
    </transition>
  </div>
</template>
<style scoped>
/* Simple fade transition */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.4s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}
</style>
