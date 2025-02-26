<script setup>
import { reactive, ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import axios from "axios";
// Import your toast library here (adjust path as needed)
import { toast } from "@/plugins/toast"; 

const formData = reactive({
  name: "",
  description: "",
  image: null, // Use null for file objects
  type: "",
  quantity: "",
  price: "",
});

const router = useRouter();
const route = useRoute();

const errors = ref({});
const editMode = ref(false);

// On component mount, check if we're editing an existing product
onMounted(() => {
  if (route.name === "products.edit") {
    editMode.value = true;
    getProduct();
  }
});

// Fetch existing product data for editing
const getProduct = async () => {
  try {
    const response = await axios.get(`/api/products/${route.params.id}/edit`);
    const product = response.data.product;
    formData.name = product.name;
    formData.description = product.description;
    formData.type = product.type;
    formData.quantity = product.quantity;
    formData.price = product.price;
    // Note: Image handling may vary. Typically, you may show a preview but not pre-populate the file input.
  } catch (error) {
    console.error("Error loading product:", error);
  }
};

// Handle image file selection
const handleImageUpload = (e) => {
  formData.image = e.target.files[0];
};

// Create a new product
const createProduct = async () => {
  try {
    const data = new FormData();
    data.append("name", formData.name);
    data.append("description", formData.description);
    data.append("type", formData.type);
    data.append("quantity", formData.quantity);
    data.append("price", formData.price);
    if (formData.image) {
      data.append("image", formData.image);
    }
    await axios.post("/api/products", data, {
      headers: { "Content-Type": "multipart/form-data" },
    });
    toast.fire({
      icon: "success",
      title: "Product created successfully",
    });
    router.push("/");
  } catch (error) {
    if (error.response && error.response.status === 422) {
      errors.value = error.response.data.errors;
    }
  }
};

// Update an existing product
const updateProduct = async () => {
  try {
    const data = new FormData();
    data.append("name", formData.name);
    data.append("description", formData.description);
    data.append("type", formData.type);
    data.append("quantity", formData.quantity);
    data.append("price", formData.price);
    if (formData.image) {
      data.append("image", formData.image);
    }
    // Depending on your API, you might use PUT/PATCH here.
    await axios.post(`/api/products/${route.params.id}`, data, {
      headers: { "Content-Type": "multipart/form-data" },
    });
    toast.fire({
      icon: "success",
      title: "Product updated successfully",
    });
    router.push("/");
  } catch (error) {
    if (error.response && error.response.status === 422) {
      errors.value = error.response.data.errors;
    }
  }
};

// Handle save button click – create or update based on mode
const handleSave = async () => {
  if (editMode.value) {
    await updateProduct();
  } else {
    await createProduct();
  }
};
</script>

<template>
  <div class="products__create">
    <div class="products__create__titlebar dflex justify-content-between align-items-center">
      <div class="products__create__titlebar--item">
        <h1 class="my-1">
          <span v-if="editMode">Edit</span>
          <span v-else>Add</span>
          Product
        </h1>
      </div>
      <div class="products__create__titlebar--item">
        <button @click="handleSave" class="btn btn-secondary ml-1">
          Save
        </button>
      </div>
    </div>

    <div class="products__create__cardWrapper mt-2">
      <div class="products__create__main">
        <div class="products__create__main--addInfo card py-2 px-2 bg-white">
          <p class="mb-1">Name</p>
          <input type="text" v-model="formData.name" class="input" />
          <small style="color: red;" v-if="errors.name">
            {{ errors.name[0] }}
          </small>

          <p class="my-1">Description (optional)</p>
          <textarea
            cols="10"
            rows="5"
            v-model="formData.description"
            class="textarea"
          ></textarea>
          <small style="color: red;" v-if="errors.description">
            {{ errors.description[0] }}
          </small>

          <div class="products__create__main--media--images mt-2">
            <ul class="products__create__main--media--images--list list-unstyled">
              <li class="products__create__main--media--images--item">
                <div
                  class="products__create__main--media--images--item--imgWrapper"
                >
                  <!-- Optionally show a preview of the current image -->
                  <img
                    class="products__create__main--media--images--item--img"
                    alt=""
                  />
                </div>
              </li>
              <!-- Upload image small -->
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
                    @change="handleImageUpload"
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
          <!-- Product type -->
          <div class="my-3">
            <p>Product type</p>
            <input type="text" v-model="formData.type" class="input" />
          </div>
          <hr />

          <!-- Inventory -->
          <div class="my-3">
            <p>Inventory</p>
            <input type="text" v-model="formData.quantity" class="input" />
          </div>
          <hr />

          <!-- Price -->
          <div class="my-3">
            <p>Price</p>
            <input type="text" v-model="formData.price" class="input" />
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Bar -->
    <div class="dflex justify-content-between align-items-center my-3">
      <p></p>
      <button @click="handleSave" class="btn btn-secondary">Save</button>
    </div>
  </div>
</template>
