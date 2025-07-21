<script setup>
  import { ref, computed } from 'vue'
  import { useRoute } from 'vue-router'
  import {
    ChevronLeftIcon,
    ChevronRightIcon,
    HomeIcon,
    BanknotesIcon,
    FolderIcon,
    Cog6ToothIcon
  } from '@heroicons/vue/24/outline'

  const showSidebar = ref(true)
  const route = useRoute()

  function toggleSidebar() {
    showSidebar.value = !showSidebar.value
  }

  function isActive(path) {
    return route.path === path
  }
</script>
<template>
    <aside
      :class="[
        'transition-all duration-300 ease-in-out bg-gray-200 shadow-lg h-screen relative',
        showSidebar ? 'w-64' : 'w-10'
      ]"
    >
      <!-- Tombol toggle -->
      <button
        @click="toggleSidebar"
        class="absolute -right-3 top-4 bg-blue-600 text-white rounded-full p-1 shadow-md hover:bg-blue-700 transition"
      >
        <component :is="showSidebar ? ChevronLeftIcon : ChevronRightIcon" class="w-5 h-5" />
      </button>

      <!-- Isi Sidebar -->
      <div v-if="showSidebar" class="p-4 w-full">
        <h2 class="text-2xl font-bold mb-6">TumbasPOS App</h2>
        <ul>
          <li class="mb-2">
            <a
              href="/"
              :class="[
                'flex items-center p-2 rounded-lg transition duration-200 hover:bg-blue-100 hover:shadow hover:scale-[1.01]',
                isActive('/') ? 'bg-blue-500 text-white shadow font-bold' : 'text-blue-600'
              ]"
            >
              <component :is="HomeIcon" class="w-5 h-5 mr-2" />
              <span>Halaman Utama</span>
            </a>
          </li>
          <li class="mb-2">
            <a
              href="/transaction"
              :class="[
                'flex items-center p-2 rounded-lg transition duration-200 hover:bg-blue-100 hover:shadow hover:scale-[1.01]',
                isActive('/transaction') ? 'bg-blue-500 text-white shadow font-bold' : 'text-blue-600'
              ]"
            >
              <component :is="BanknotesIcon" class="w-5 h-5 mr-2" />
              <span>Transaksi</span>
            </a>
          </li>
          <li class="mb-2">
            <a
              href="/product"
              :class="[
                'flex items-center p-2 rounded-lg transition duration-200 hover:bg-blue-100 hover:shadow hover:scale-[1.01]',
                isActive('/product') ? 'bg-blue-500 text-white shadow font-bold' : 'text-blue-600'
              ]"
            >
              <component :is="FolderIcon" class="w-5 h-5 mr-2" />
              <span>Produk</span>
            </a>
          </li>
          <li class="mb-2">
            <a
              href="/settings"
              :class="[
                'flex items-center p-2 rounded-lg transition duration-200 hover:bg-blue-100 hover:shadow hover:scale-[1.01]',
                isActive('/settings') ? 'bg-blue-500 text-white shadow font-bold' : 'text-blue-600'
              ]"
            >
              <component :is="Cog6ToothIcon" class="w-5 h-5 mr-2" />
              <span>Pengaturan</span>
            </a>
          </li>
        </ul>

      </div>
    </aside>
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