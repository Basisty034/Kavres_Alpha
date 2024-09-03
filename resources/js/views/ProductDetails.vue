<template>
    <div class="product-details">
      <img :src="product.image" alt="Product Image">
      <h3>{{ product.name }}</h3>
      <p>{{ product.description }}</p>
      <p>{{ product.price }}</p>
      <p>{{ product.stock }}</p>
      <select v-model="paymentMethod">
        <option disabled value="">Select Payment Method</option>
        <option v-for="method in paymentMethods" :key="method" :value="method">{{ method }}</option>
      </select>
      <button :disabled="!canOrder" @click="orderProduct">Order</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        product: {},
        paymentMethod: '',
        paymentMethods: ['Credit Card', 'PayPal', 'Bank Transfer'],
      };
    },
    computed: {
      canOrder() {
        return this.paymentMethod && this.product.stock > 0;
      }
    },
    methods: {
      orderProduct() {
        // Logic to place order
      }
    },
    created() {
      // Fetch product details by ID
    }
  }
  </script>