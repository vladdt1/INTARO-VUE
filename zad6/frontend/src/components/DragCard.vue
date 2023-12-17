<!-- Заполненные карточки драг н дропа -->
<template>
    <div class="card">
        <img :src="photo" width="100" height="100" />
        {{ proff }}
        <br>
        {{ name }}
        <br>
        {{ age }}
        <br>
        <Button text="Перейти" :to="'/edit?id=' + id"></Button>
    </div>
</template>

  
<script>
import Button from './RouterButton.vue'

export default {
    name: 'DragCard',
    props: {
        photo: {
            type: String,
            default: ''
        },
        proff: {
            type: String,
            default: ''
        },
        name: {
            type: String,
            default: ''
        },
        age: {
            type: String,
            default: ''
        },
        id: {
            type: String,
            default: ''
        },
    },
    components: {
        Button
    }
}
</script>

  
  <style scoped>
    .card {
      display:flex;
      color: white;
      align-items: center;
      flex-direction: column;
      background-color: rgb(0, 0, 0);
      margin: 10px;
      padding: 5px;
    }
  </style>