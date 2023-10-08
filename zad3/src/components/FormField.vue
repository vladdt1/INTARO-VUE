<template>
    <div>
      <p>{{ field.vedlabel }}</p>
      <div v-if="field.id !== 'obr'">
        <input
          v-if="field.id !== 'phon'"
          v-model="field.value"
          :type="field.type"
          class="form-control"
          :id="field.id"
          :placeholder="field.placeholder"
        />
        <div v-if="field.id == 'phon'">
          <input
            v-model="field.value"
            :type="field.type"
            class="form-control"
            :id="field.id"
            :placeholder="field.placeholder"
            @keyup="validatePhoneNumber"
          />
          <p>{{ isnoValidPhone }}</p>
        </div>
      </div>
      <select v-if="field.id == 'obr'" id="obrazovanie" v-model="field.obrazovanie">
        <option v-for="(obra, index) in obraz" :key="index" :value="obra.value">
          {{ obra.value }}
        </option>
      </select>
      <div
        v-if="
          field.obrazovanie == 'Среднее специальное' ||
          field.obrazovanie == 'Неоконченное высшее' ||
          field.obrazovanie == 'Высшее'
        "
      >
        <div class="mb-3 p-3 border bg-light" v-for="(obraz, index) in formobraz" :key="index">
          <p>{{ obraz.vedlabel }}</p>
          <input
            v-model="obraz.value"
            :type="obraz.type"
            class="form-control"
            :id="obraz.id"
            :placeholder="obraz.placeholder"
          />
        </div>
      </div>
      <hr />
    </div>
  </template>
  
  <script>
  export default {
    props: {
      field: Object, // Пропс для передачи данных поля из родительского компонента
      obraz: Array, // Пропс для передачи данных об образовании
      formobraz: Array, // Пропс для передачи данных о дополнительном образовании
      isnoValidPhone: String, // Пропс для передачи сообщения об ошибке номера телефона
    },
    methods: {
      validatePhoneNumber() {
        const phonePattern = /^\d{6,10}$/;
  
        if (phonePattern.test(this.field.value)) {
          this.isnoValidPhone = "";
        } else {
          this.isnoValidPhone = "Не валидный номер телефона";
        }
      },
    },
    
  };
  </script>
  