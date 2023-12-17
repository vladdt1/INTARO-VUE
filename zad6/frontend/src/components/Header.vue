<!-- Шапка сайта -->
<template>
  <div class="header">
    <Button text="На главную" to="/"></Button>
    <Button text="Создать новое резюме" to="/add"></Button>
  </div>
  </template>
  
  <script>
  import Button from './RouterButton.vue'
  
  export default {
    name: 'HeaderComponent',
    components: {
      Button
    },
    props: {
      msg: String
    },
    data() {
      return {
        isAddComponentVisible: false
      };
    },
    methods: {
      openAddComponent() {
        this.isAddComponentVisible = true;
      }
    }
  }
  </script>
  
  <style scoped>
  .header {
    padding: 10px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    background-color: rgb(51, 59, 79);
  }
  
  </style>