<template>
    <div class="search-bar">
      <input v-model="keyword" @input="search" placeholder="Search...">
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        keyword: '',
      };
    },
    methods: {
      search() {
        this.$emit('search', this.keyword);
      }
    }
  }
  </script>