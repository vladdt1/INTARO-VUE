<template>
    <div>
      <p>{{ field.vedlabel }}</p>
      <div v-if="field.id !== 'obr'">
        <FormIndex :field="field" />
      </div>
      <div v-if="field.id == 'obr'">
        <Obrazovanie :field="field" :obraz="obraz" />
      </div>
      <div
        v-if="
          field.obrazovanie == 'Среднее специальное' ||
          field.obrazovanie == 'Неоконченное высшее' ||
          field.obrazovanie == 'Высшее'
        "
      >
        <FormObraz :formobraz="formobraz" />
      </div>
      <hr />
    </div>
  </template>
  
  <script>
  import Obrazovanie from './Obrazovanie.vue'
  import FormIndex from './FormIndex.vue';
  import FormObraz from './FormObraz.vue';
  export default {
    props: ['field', 'obraz', 'formobraz'],
    components: {
    Obrazovanie,
    FormIndex,
    FormObraz,
},
  };
  </script>
  