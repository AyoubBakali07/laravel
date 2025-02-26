<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const router = useRouter();
const products = ref([]);
const links = ref([]);

// Modified to accept a URL parameter with a default value
const getProducts = async (url = "/api/products") => {
  try {
    const response = await axios.get(url);
    // Assuming your API returns a paginated object like:
    // { products: { data: [...], links: [...] } }
    products.value = response.data.products.data;
    links.value = response.data.products.links;
  } catch (error) {
    console.error("Error fetching products:", error);
  }
};

onMounted(() => {
  getProducts();
});

const newProduct = () => {
  router.push("/products/create");
};

// Navigate to a new page using the pagination link URL
const changePage = (url) => {
  if (url) {
    getProducts(url);
  }
};
</script>

<template>
  <div class="container">
    <div class="products__list table my-3">
      <div class="customers__titlebar dflex justify-content-between align-items-center">
        <div class="customers__titlebar--item">
          <h1 class="my-1">Products</h1>
        </div>
        <div class="customers__titlebar--item">
          <button @click="newProduct" class="btn btn-secondary my-1">
            Add Product
          </button>
        </div>
      </div>

      <div
        class="table--heading mt-2 products__list__heading"
        style="padding-top: 20px; background:#FFF"
      >
        <p class="table--heading--col1">Image</p>
        <p class="table--heading--col2">Product</p>
        <p class="table--heading--col4">Type</p>
        <p class="table--heading--col3">Inventory</p>
        <p class="table--heading--col5">Actions</p>
      </div>

      <!-- Loop through products -->
      <div
        class="table--items products__list__item"
        v-for="product in products"
        :key="product.id"
      >
        <div class="products__list__item--imgWrapper">
          <img
            class="products__list__item--img"
            :src="product.image || '../../../../public/upload/1.jpg'"
            alt="Product image"
            style="height: 40px;"
          />
        </div>
        <a href="#" class="table--items--col2">
          {{ product.name }}
        </a>
        <p class="table--items--col2">
          {{ product.type }}
        </p>
        <p class="table--items--col3">
          {{ product.quantity }}
        </p>
        <div>
          <button class="btn-icon btn-icon-success">
            <i class="fas fa-pencil-alt"></i>
          </button>
          <button class="btn-icon btn-icon-danger">
            <i class="far fa-trash-alt"></i>
          </button>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="pagination my-3">
      <ul class="pagination-list">
        <a
          v-for="link in links"
          :key="link.label"
          class="pagination-item"
          :class="{ active: link.active }"
        >
          <button
            @click="changePage(link.url)"
            :disabled="!link.url"
            v-html="link.label"
          ></button>
      </a>
      </ul>
    </div>

    </div>

    <!-- Edit Product Section -->
    <div class="products__edit">
      <div class="products__create__titlebar dflex justify-content-between align-items-center">
        <div class="products__create__titlebar--item">
          <h1 class="my-1">Edit Product</h1>
        </div>
        <div class="products__create__titlebar--item">
          <button class="btn btn-secondary ml-1">Save</button>
        </div>
      </div>

      <div class="products__create__cardWrapper mt-2">
        <div class="products__create__main">
          <!-- Loop through products for editing -->
          <div
            class="products__create__main--addInfo card py-2 px-2 bg-white"
            v-for="product in products"
            :key="product.id"
          >
            <p class="mb-1">Name</p>
            <input type="text" class="input" v-model="product.name" />

            <p class="my-1">Description (optional)</p>
            <textarea
              cols="10"
              rows="5"
              class="textarea"
              v-model="product.description"
            ></textarea>

            <div class="products__create__main--media--images mt-2">
              <ul class="products__create__main--media--images--list list-unstyled">
                <li class="products__create__main--media--images--item">
                  <div class="products__create__main--media--images--item--imgWrapper">
                    <img
                      class="products__create__main--media--images--item--img"
                      :src="product.image || ''"
                      alt="Product image"
                    />
                  </div>
                </li>

                <!-- Upload image -->
                <li class="products__create__main--media--images--item">
                  <form
                    class="products__create__main--media--images--item--form"
                  >
                    <label
                      class="products__create__main--media--images--item--form--label"
                      for="myfile"
                      >Add Image</label
                    >
                    <input
                      class="products__create__main--media--images--item--form--input"
                      type="file"
                      id="myfile"
                    />
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="products__create__sidebar">
          <!-- Product Organization -->
          <div class="card py-2 px-2 bg-white">
            <div class="my-3">
              <p>Product type</p>
              <input type="text" class="input" />
            </div>
            <hr />

            <div class="my-3">
              <p>Inventory</p>
              <input type="text" class="input" />
            </div>
            <hr />

            <div class="my-3">
              <p>Price</p>
              <input type="text" class="input" />
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Bar -->
      <div class="dflex justify-content-between align-items-center my-3">
        <p></p>
        <button class="btn btn-secondary">Save</button>
      </div>
    </div>
  </div>
</template>
