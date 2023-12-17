<!-- Элемент с выбором образования при добавлении и редактировании резюме -->
<template>
    <div>
      <p>{{ field.vedlabel }}</p>
      <div v-if="field.id !== 'obr'">
        <FormIndex :field="field" :mass="mass" />
      </div>
      <div v-if="field.id == 'obr'">
        <button @click="addEducation" class="btn btn-secondary">Указать еще одно место обучения</button><br><br>
        <div v-for="(obrazovani, index) in field.obrazovanie" :key="index">
          <select id="obrazovanie" v-model="obrazovani.education">
            <option v-for="(obra, index) in obraz" :key="index" :value="obra.value">
              {{ obra.value }}
            </option>
          </select>

          <br>
          <br>
        
          <div v-if="obrazovani.education !== 'Среднее'">
            <FormObraz :formobraz="formobraz" :mass="mass" />
          </div>
          <button @click="removeEducation(index)" class="btn btn-danger">Удалить</button>
        </div>
      </div>
      
      <hr />
    </div>
  </template>
  
  <script>
  import Obrazovanie from './Obrazovanie.vue'
  import FormIndex from './FormIndex.vue';
  import FormObraz from './FormObraz.vue';
  export default {
    props: ['field', 'obraz', 'formobraz', 'mass'],
    components: {
    Obrazovanie,
    FormIndex,
    FormObraz,
},
methods: {

  addEducation() {
      this.field.obrazovanie.push({ education: 'Высшее' });
    },

    // Функция для удаления блока образования по индексу
    removeEducation(index) {
      this.field.obrazovanie.splice(index, 1);
    },
}
  };
  </script>
  