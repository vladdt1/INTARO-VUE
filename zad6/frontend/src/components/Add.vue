<!-- Добавление нового резюме -->
<template>
    <div class="container overflow-hidden">
      <div class="row gx-5">
        <div class="col" v-if="!dataApplied">
          <div class="mb-3 p-3 border bg-light">
            <h2 style="text-align: center;">Введите информацию</h2>
            <FormField v-for="(field, index) in formFields" :key="index" :field="field" :obraz="obraz" :formobraz="formobraz" :mass="mass"/>
            <button @click="applyData" class="btn btn-primary">Добавить</button>
          </div>
        </div>
  
        <div class="col p-3 border bg-light" v-if="dataApplied">
          <FormResume :formFields="formFields" :obraz="obraz" :formobraz="formobraz" :stat="stat"/>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import FormField from "./FormField.vue";
  import FormResume from "./FormResume.vue";
  import axios from 'axios';
  
  export default {
    components: {
      FormField,
      FormResume,
    },
    data() {
      return {
        isnoValidPhone: "",
        dataApplied: false,
        formFields: [
          { vedlabel: "Введите профессию:", label: "Профессия", type: "text", id: "prof", placeholder: "Например, Бухгалтер", value: "" },
          { vedlabel: "Введите город:", label: "Город", type: "text", id: "cit", placeholder: "Например, Москва", value: "" },
          { vedlabel: "Введите ссылку на фотографию:", label: "Ссылка на фотографию", type: "text", id: "im", placeholder: "Например, https://avatars.mds.yandex.net/i?id=bs&n=13", value: "" },
          { vedlabel: "Введите ФИО:", label: "ФИО", type: "text", id: "fio", placeholder: "Например, Иванов Иван Иванович", value: "" },
          { vedlabel: "Введите дату рождения:", label: "Дата рождения", type: "date", id: "dat", placeholder: "Например, 03.05.2000", value: ""},
          { vedlabel: "Введите образование:", label: "Образование", type: "text", id: "obr", placeholder: "Например, ЛГТУ", value: "", obrazovanie: [{ education: 'Высшее' }] },
          { vedlabel: "Введите номер телефона:", label: "Номер телефона", type: "text", id: "phon", placeholder: "Например, 9005557766", value: "" },
          { vedlabel: "Введите почту:", label: "Почта", type: "email", id: "email", placeholder: "Например, test@mail.ru", value: "" },
          { vedlabel: "Желаемая зарплата:", label: "Желаемая зарплата", type: "text", id: "mun", placeholder: "Например, 30 000", value: "" },
          { vedlabel: "Ключеные навыки:", label: "Ключевые навыки", type: "text", id: "skills", placeholder: "Например, Ответственность, обучаемость, пунктуальность", value: "" },
          { vedlabel: "О себе:", label: "О себе", type: "text", id: "about", placeholder: "Например, Люблю создавать сайты, путешествовать и заниматься спортом!", value: "" },
        ],
        stat: [{status: "Новый"}],
        obraz: [
          { value: "Среднее" },
          { value: "Среднее специальное" },
          { value: "Неоконченное высшее" },
          { value: "Высшее" },
        ],
        formobraz: [
          {vedlabel: "Введите ваше учебное заведение", label: "Учебное заведение", type: "text", id: "zavedenie", placeholder: "Например, ЛГТУ", value: ''},
          {vedlabel: "Введите ваш факультет", label: "Факультет", type: "text", id: "fac", placeholder: "Например, ФАИ", value: ''},
          {vedlabel: "Введите вашу специализацию", label: "Специализация", type: "text", id: "spetc", placeholder: "Например, АСУ", value: ''},
          {vedlabel: "Год окончания", label: "Год окончания", type: "text", id: "yearoc", placeholder: "Например, 2022", value: ''},
        ],
        mass: [
          {citySuggestions: [], selectedCitySuggestion: '', universitySuggestions: []} // Выбранная подсказка
        ],
        selectOptions: null,
        obrazov: 0,
        sta: 0,
      };
    },
    methods: {
    async applyData() {
      try {
        let obrazov;
        if (this.formFields.find(field => field.id === 'obr').obrazovanie[0].education === 'Среднее') {
          obrazov = 1;
        } else if (this.formFields.find(field => field.id === 'obr').obrazovanie[0].education === 'Среднее специальное') {
          obrazov = 2;
        } else if (this.formFields.find(field => field.id === 'obr').obrazovanie[0].education === 'Неоконченное высшее') {
          obrazov = 3;
        } else if (this.formFields.find(field => field.id === 'obr').obrazovanie[0].education === 'Высшее') {
          obrazov = 4;
        }

        const valuesArray = this.formobraz.map(item => item.value);

        // Используем join для объединения значений в одну строку с разделителем ":"
        const combinedValues = valuesArray.join(':');
  
        const formData = {
          prof: this.formFields.find(field => field.id === 'prof').value,
          cit: this.formFields.find(field => field.id === 'cit').value,
          im: this.formFields.find(field => field.id === 'im').value,
          fio: this.formFields.find(field => field.id === 'fio').value,
          dat: this.formFields.find(field => field.id === 'dat').value,
          obr: obrazov,
          phon: this.formFields.find(field => field.id === 'phon').value,
          email: this.formFields.find(field => field.id === 'email').value,
          mun: this.formFields.find(field => field.id === 'mun').value,
          skills: this.formFields.find(field => field.id === 'skills').value,
          about: this.formFields.find(field => field.id === 'about').value,
          infoobra: combinedValues,
          status: 1,
        };
  
        // Make a POST request to the server
        const response = await axios.post('http://localhost:8000/api/cv/add', formData);
  
        console.log(response.data); // Log the server response
        this.dataApplied = true; // Update the UI as needed
      } catch (error) {
        console.error('Ошибка при отправке данных на сервер:', error);
      }
    },
  }
  
  }
  </script>
  