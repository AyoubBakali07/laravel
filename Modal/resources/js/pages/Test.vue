<!-- resources/js/pages/Test.vue -->
<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

// Define the Product type
interface Product {
  id: number;
  name: string;
  price: number;
  Stock: number; // matches your database column name
}

// Get the products prop passed from your controller
const { products } = defineProps<{ products: Product[] }>();

// Control modal visibility
const isModalOpen = ref(false);

// Simple form data
const form = ref({
  name: '',
  price: '',
  Stock: '',
});

// Toggle the modal
function toggleModal() {
  isModalOpen.value = !isModalOpen.value;
}

// Submit the form to save product data
function submitForm() {
  // Post to your endpoint (assumed to be '/test')
  router.post(
    '/test',
    {
      name: form.value.name,
      price: form.value.price,
      Stock: form.value.Stock,
    },
    {
      onSuccess: (response) => {
        // Close modal and reset form fields
        isModalOpen.value = false;
        form.value.name = '';
        form.value.price = '';
        form.value.Stock = '';
        // Add the new product to the products array
        products.value.push(response.props.product);
      }
    }
  );
}
</script>

<template>
  <Head title="Test Page" />
  <div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-4">Test Page</h1>
    <p class="mb-4">This is the test page content.</p>
    <Link :href="route('welcome')" class="text-blue-500 hover:text-blue-700">
      ← Back to Welcome
    </Link>
    <div class="relative overflow-x-auto mt-4">
      <!-- Modal toggle button -->
      <button
        @click="toggleModal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5"
        type="button"
      >
        Toggle modal
      </button>

      <!-- Modal (shown when isModalOpen is true) -->
      <div
        v-show="isModalOpen"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
      >
        <div class="p-4 w-full max-w-md bg-white rounded-lg shadow">
          <!-- Modal header -->
          <div class="flex justify-between items-center p-4 border-b">
            <h3 class="text-lg font-semibold">Create New Product</h3>
            <button @click="toggleModal" class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm w-8 h-8">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 14 14">
                <path d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
          </div>

          <!-- Modal body with form -->
          <div class="p-4">
            <form @submit.prevent="submitForm">
              <div class="mb-4">
                <label class="block text-sm font-medium">Product Name</label>
                <input
                  v-model="form.name"
                  type="text"
                  class="w-full border p-2 rounded"
                  placeholder="Enter product name"
                />
              </div>
              <div class="mb-4">
                <label class="block text-sm font-medium">Product Price</label>
                <input
                  v-model="form.price"
                  type="text"
                  class="w-full border p-2 rounded"
                  placeholder="Enter product price"
                />
              </div>
              <div class="mb-4">
                <label class="block text-sm font-medium">Product Stock</label>
                <input
                  v-model="form.Stock"
                  type="text"
                  class="w-full border p-2 rounded"
                  placeholder="Enter product stock"
                />
              </div>
              <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 rounded-lg px-5 py-2.5">
                Add Product
              </button>
            </form>
          </div>
        </div>
      </div>

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
            <td class="px-6 py-4">{{ product.Stock }}</td>
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
