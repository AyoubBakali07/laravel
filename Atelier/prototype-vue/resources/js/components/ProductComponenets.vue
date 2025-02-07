<template>
    <div class="container my-4">
      <h2 class="text-center mb-4">Our Products</h2>
      <div class="row">
        <div class="col-md-4 mb-4" v-for="product in products" :key="product.id">
          <div class="card" style="width: 18rem;">
            <img :src="getRandomImage(product)" class="card-img-top" :alt="product.name">
            <div class="card-body">
              <h5 class="card-title">{{ product.name }}</h5>
              <p class="card-text">{{ product.description }}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Products',
    data() {
      return {
        products: []  // This will be loaded dynamically from your database.
      };
    },
    mounted() {
      this.fetchProducts();
    },
    methods: {
      fetchProducts() {
        fetch('/products')
          .then(response => response.json())
          .then(data => {
            this.products = data;
          })
          .catch(error => console.error('Error fetching products:', error));
      },
      getRandomImage(product) {
        // If product.image exists and is valid, use it;
        // Otherwise, generate a random image from Unsplash using a query parameter.
        if (product.image && product.image.length > 0) {
          return product.image;
        }
        // Generate a random image URL; you can also customize the query
        return `https://dummyimage.com/300x200/cccccc/000000.png&text=Product+${product.id}`;


      }
    }
  };
  </script>
  
  <style scoped>
  .card:hover {
    transform: translateY(-5px);
    transition: 0.3s;
  }
  </style>
  