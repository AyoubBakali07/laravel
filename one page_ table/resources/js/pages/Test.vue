<!-- resources/js/pages/Test.vue -->
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
// import { Head, Link } from '@inertiajs/vue3';

interface Product {
  id: number;
  name: string;
  price: number;
  stock: number; 
}

const props = defineProps<{
  products: Product[];
}>();
</script>

<template>
  <Head title="Test Page" />
  <div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-4">Test Page</h1>
    <p class="mb-4">This is the test page content.</p>
    <Link :href="route('welcome')" class="text-blue-500 hover:text-blue-700">
      ← Back to Welcome
    </Link>

      <!-- Products table -->
      <table class="w-full text-sm text-left mt-4">
        <thead class="text-xs uppercase bg-gray-50">
          <tr>
            <th class="px-6 py-3">Product name</th>
            <th class="px-6 py-3">Price</th>
            <th class="px-6 py-3">Stock</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="product in products"
            :key="product.id"
            class="bg-white border-b"
          >
            <td class="px-6 py-4">{{ product.name }}</td>
            <td class="px-6 py-4">{{ product.price }}</td>
            <td class="px-6 py-4">{{ product.stock }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}
th,
td {
  padding: 8px;
  border: 1px solid #ddd;
}
th {
  background-color: #f4f4f4;
}
</style>
