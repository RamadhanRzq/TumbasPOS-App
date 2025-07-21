<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Sidebar from './components/Sidebar.vue';
</script>

<template>
  <div class="flex h-screen bg-gray-50 text-gray-800">
    <Sidebar />
    <main class="flex-1 overflow-y-auto p-4">
      <RouterView />
    </main>
  </div>
</template>

<style scoped>
.slide-enter-active, .slide-leave-active {
  transition: transform 0.3s ease;
}
.slide-enter-from {
  transform: translateX(-100%);
}
.slide-leave-to {
  transform: translateX(-100%);
}
</style>
