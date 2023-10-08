<template>
  <select id="obrazovanie" v-model="field.obrazovanie">
    <option v-for="(obra, index) in obraz" :key="index" :value="obra.value">
      {{ obra.value }}
    </option>
  </select>
</template>

<script>
export default {
  props: ['field', 'obraz'],
};
</script>
