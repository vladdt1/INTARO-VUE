<template>
  <div class="container overflow-hidden">
    <div class="row gx-5">
      <div class="col" v-if="!dataApplied">
        <div class="mb-3 p-3 border bg-light">
          <h2 style="text-align: center;">Введите информацию</h2>
          <FormField v-for="(field, index) in formFields" :key="index" :field="field" :obraz="obraz" :formobraz="formobraz" :mass="mass"/>
          <div class="mb-3">
            <label for="statusSelect" class="form-label">Выберите статус</label>
            <select v-model="stat.status" class="form-select" id="statusSelect">
              <option value="Новый">Новый</option>
              <option value="Назначено собеседование">Назначено собеседование</option>
              <option value="Принят">Принят</option>
              <option value="Отказ">Отказ</option>
            </select>
          </div>
          <button @click="applyData" class="btn btn-primary">Применить</button>
        </div>
      </div>

      <div class="col p-3 border bg-light" v-if="dataApplied">
        <FormResume :formFields="formFields" :obraz="obraz" :formobraz="formobraz" :stat="stat"/>
      </div>
    </div>
  </div>
</template>

<script>
import FormField from "./components/FormField.vue";
import FormResume from "./components/FormResume.vue";

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
      ]
      
    };
  },
  methods:{
    applyData(){
        this.dataApplied = true;
    },
  }

};
</script>
