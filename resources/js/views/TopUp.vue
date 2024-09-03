<template>
    <div class="top-up">
      <div v-for="amount in topUpAmounts" :key="amount" class="top-up-card">
        <p>{{ amount }}</p>
        <button @click="selectAmount(amount)">Select</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        topUpAmounts: [100, 200, 500, 1000],
      };
    },
    methods: {
      selectAmount(amount) {
        // Logic to top up balance
      }
    }
  }
  </script>