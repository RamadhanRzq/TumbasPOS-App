<script setup lang="ts">
import { ref, watch } from 'vue'
import { Line } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineElement,
  CategoryScale,
  LinearScale,
  PointElement,
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement)

const selectedFilter = ref('Hari')

// Dummy data generator based on filter
const chartData = ref(getChartData(selectedFilter.value))

watch(selectedFilter, () => {
  chartData.value = getChartData(selectedFilter.value)
})

function getChartData(filter: string) {
  const labels = {
    Hari: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
    Minggu: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
    Bulan: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
    Tahun: ['2021', '2022', '2023', '2024'],
  }

  const values = labels[filter].map(() => Math.floor(Math.random() * 10000 + 1000))

  return {
    labels: labels[filter],
    datasets: [
      {
        label: 'Penjualan',
        backgroundColor: '#3b82f6',
        borderColor: '#3b82f6',
        data: values,
        fill: false,
        tension: 0.3,
      },
    ],
  }
}

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      position: 'top' as const,
    },
    title: {
      display: true,
      text: 'Grafik Penjualan',
    },
  },
}
const produkList = ref([
  { id: 1, nama: 'Indomie Goreng', kategori: 'Makanan', harga: 3000, stok: 120 },
  { id: 2, nama: 'Teh Botol Sosro', kategori: 'Minuman', harga: 5000, stok: 80 },
  { id: 3, nama: 'Kopi Kapal Api', kategori: 'Minuman', harga: 1500, stok: 60 },
  { id: 4, nama: 'Rinso 1kg', kategori: 'Kebutuhan Rumah', harga: 20000, stok: 40 },
  { id: 5, nama: 'Minyak Goreng 1L', kategori: 'Sembako', harga: 14000, stok: 35 },
])

</script>

<template>
  <div class="p-5">
    <h1 class="text-3xl font-bold mb-6">Halaman Utama</h1>

    <!-- 4 Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
      <div class="bg-white shadow-md rounded-2xl p-5">
        <h2 class="text-sm text-gray-500 mb-2">Total Produk</h2>
        <p class="text-2xl font-bold text-blue-600">{{ produkList.length }}</p>
      </div>
      <div class="bg-white shadow-md rounded-2xl p-5">
        <h2 class="text-sm text-gray-500 mb-2">Total Pendapatan</h2>
        <p class="text-2xl font-bold text-green-600">Rp 25.300.000</p>
      </div>
      <div class="bg-white shadow-md rounded-2xl p-5">
        <h2 class="text-sm text-gray-500 mb-2">Total Transaksi</h2>
        <p class="text-2xl font-bold text-yellow-600">342</p>
      </div>
      <div class="bg-white shadow-md rounded-2xl p-5">
        <h2 class="text-sm text-gray-500 mb-2">Total Customer</h2>
        <p class="text-2xl font-bold text-purple-600">97</p>
      </div>
    </div>

    <!-- Filter & Grafik Penjualan -->
    <!-- Grafik Penjualan -->
    <div class="bg-white p-6 shadow-md rounded-2xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Grafik Penjualan</h2>
            <select v-model="selectedFilter" class="border rounded px-3 py-1 text-sm">
            <option value="Hari">Hari</option>
            <option value="Minggu">Minggu</option>
            <option value="Bulan">Bulan</option>
            <option value="Tahun">Tahun</option>
            </select>
        </div>
    <!-- Bungkus Line Chart dalam container tinggi tetap -->
        <div class="overflow-x-auto">
            <div class="min-w-[600px] h-[400px]">
                <Line :data="chartData" :options="chartOptions" style="height: 100%; width: 100%" />
            </div>
        </div>
    </div>
    <!-- Tambahkan setelah grafik penjualan -->
    <div class="bg-white p-6 mt-6 shadow-md rounded-2xl">
    <h2 class="text-xl font-semibold mb-4">Daftar Produk</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left text-sm text-gray-600">
            <th class="p-3 border-b">#</th>
            <th class="p-3 border-b">Nama Produk</th>
            <th class="p-3 border-b">Kategori</th>
            <th class="p-3 border-b">Harga</th>
            <th class="p-3 border-b">Stok</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-sm hover:bg-gray-50" v-for="(produk, index) in produkList" :key="produk.id">
            <td class="p-3 border-b">{{ index + 1 }}</td>
            <td class="p-3 border-b">{{ produk.nama }}</td>
            <td class="p-3 border-b">{{ produk.kategori }}</td>
            <td class="p-3 border-b">Rp {{ produk.harga.toLocaleString('id-ID') }}</td>
            <td class="p-3 border-b">{{ produk.stok }}</td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
  </div>
</template>
