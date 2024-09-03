<template>
    <div class="product-card">
      <img :src="product.image" alt="Product Image">
      <h3>{{ product.name }}</h3>
      <p>{{ product.price }}</p>
      <p>{{ product.seller.name }}</p>
      <img :src="product.seller.profile_image" alt="Seller Image">
      <button @click="viewDetails">View Details</button>
    </div>
  </template>
  
  <script>
  export default {
    props: ['product'],
    methods: {
      viewDetails() {
        this.$router.push({ name: 'ProductDetails', params: { id: this.product.id } });
      }
    }
  }
  </script>