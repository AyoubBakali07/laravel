<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

// Define the Product type
interface Product {
  id: number;
  name: string;
  price: number;
  Stock: number; // Corrected to match database column
}

const isModalOpen = ref(false);
const { products } = defineProps<{ products: Product[] }>();

function toggleModal() {
  isModalOpen.value = !isModalOpen.value;
  form.value.errors = {};
}

const form = ref({
  name: '',
  price: '',
  Stock: '', // Corrected to match database column
  errors: {} as Record<string, string>,
});

const submitForm = () => {
  router.post(
    '/test',
    {
      name: form.value.name,
      price: form.value.price,
      Stock: form.value.Stock, // Corrected to match database column
    },
    {
      onSuccess: (response) => {
        isModalOpen.value = false;
        form.value = {
          name: '',
          price: '',
          Stock: '', // Corrected to match database column
          errors: {},
        };
        products.value.push(response.props.product);
      },
      onError: (errors) => {
        form.value.errors = errors;
      },
    }
  );
};
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
      <button
        @click="toggleModal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Toggle modal
      </button>

      <div
        v-show="isModalOpen"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
      >
        <div
          class="relative p-4 w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700"
        >
          <div
            class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600"
          >
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Create New Product
            </h3>
            <button
              @click="toggleModal"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 dark:hover:bg-gray-600 dark:hover:text-white"
            >
              <svg
                class="w-3 h-3"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 14 14"
              >
                <path d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
              </svg>
            </button>
          </div>

          <div class="p-4">
            <form @submit.prevent="submitForm">
              <div class="mb-4">
                <label
                  class="block text-sm font-medium text-gray-900 dark:text-white"
                  >Product Name</label
                >
                <input
                  v-model="form.name"
                  type="text"
                  class="w-full border rounded-lg p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                />
              </div>
              <div class="mb-4">
                <label
                  class="block text-sm font-medium text-gray-900 dark:text-white"
                  >Product Price</label
                >
                <input
                  v-model="form.price"
                  type="text"
                  class="w-full border rounded-lg p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                />
              </div>
              <div class="mb-4">
                <label
                  class="block text-sm font-medium text-gray-900 dark:text-white"
                  >Product Stock</label
                >
                <input
                  v-model="form.Stock"
                  type="text"
                  class="w-full border rounded-lg p-2 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                />
              </div>
              <button
                type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2.5"
              >
                Add Product
              </button>
            </form>
          </div>
        </div>
      </div>
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Product name</th>
            <th scope="col" class="px-6 py-3">Price</th>
            <th scope="col" class="px-6 py-3">Stock</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="product in products"
            :key="product.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
          >
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
            >
              {{ product.name }}
            </th>
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