<template>
    <div class="balance">
      <p>Balance: {{ balance }}</p>
      <button @click="topUp">Top Up</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        balance: 0,
      };
    },
    methods: {
      topUp() {
        this.$router.push({ name: 'TopUp' });
      }
    },
    created() {
      // Fetch user balance
    }
  }
  </script>