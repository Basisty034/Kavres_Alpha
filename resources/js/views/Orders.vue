<template>
    <div>
      <search-bar @search="searchProducts"></search-bar>
      <div class="product-list">
        <product-card v-for="product in products" :key="product.id" :product="product"></product-card>
      </div>
    </div>
  </template>
  
  <script>
  import ProductCard from '../components/ProductCard.vue';
  import SearchBar from '../components/SearchBar.vue';
  
  export default {
    components: { ProductCard, SearchBar },
    data() {
      return {
        products: [],
      };
    },
    methods: {
      searchProducts(keyword) {
        // Logic to search products
      }
    },
    created() {
      // Fetch products
    }
  }
  </script>