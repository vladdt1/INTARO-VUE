<template>
  <div class="container overflow-hidden">
    <div class="row gx-5">
      <div class="col" v-if="!dataApplied">
        <div class="mb-3 p-3 border bg-light">
          <h2 style="text-align: center;">Введите информацию</h2>
          <FormField v-for="(field, index) in formFields" :key="index" :field="field" :obraz="obraz" :formobraz="formobraz" :isnoValidPhone="isnoValidPhone" />
          <button @click="applyData" class="btn btn-primary">Применить</button>
        </div>
      </div>

      <div class="col p-3 border bg-light" v-if="dataApplied">
        <h2 style="text-align: center;">Ваше резюме</h2>
        <div class="p-3 border">
          <img :src="formFields[2].value" alt="Ваша фотография" class="photo img-fluid" style="width: 200px;" />
        </div>
        <div v-for="(field, index) in formFields" :key="index">
          <div v-if="field.id !== 'im'" class="p-3 border">
            <p style="text-align: center;">{{ field.label }}</p>
            <p>{{ field.value }}</p>
            <div v-if="field.obrazovanie !== ''">{{ field.obrazovanie }}</div>
            <div
              v-if="
                field.obrazovanie == 'Среднее специальное' ||
                field.obrazovanie == 'Неоконченное высшее' ||
                field.obrazovanie == 'Высшее'
              "
            >
              <div v-for="(obraz, index) in formobraz" :key="index">
                <p style="text-align: center;">{{ obraz.label }}</p>
                <p>{{ obraz.value }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FormField from "@/components/FormField.vue";

export default {
  components: {
    FormField,
  },
  data() {
    return {
      formFields: [
        { vedlabel: "Введите профессию:", label: "Профессия", type: "text", id: "prof", placeholder: "Например, Бухгалтер", value: "" },
        { vedlabel: "Введите город:", label: "Город", type: "text", id: "cit", placeholder: "Например, Москва", value: "" },
        { vedlabel: "Введите ссылку на фотографию:", label: "Ссылка на фотографию", type: "text", id: "im", placeholder: "Например, https://avatars.mds.yandex.net/i?id=bs&n=13", value: "" },
        { vedlabel: "Введите ФИО:", label: "ФИО", type: "text", id: "fio", placeholder: "Например, Иванов Иван Иванович", value: "" },
        { vedlabel: "Введите дату рождения:", label: "Дата рождения", type: "date", id: "dat", placeholder: "Например, 03.05.2000", value: ""},
        { vedlabel: "Введите образование:", label: "Образование", type: "text", id: "obr", placeholder: "Например, ЛГТУ", value: "", obrazovanie: "" },
        { vedlabel: "Введите номер телефона:", label: "Номер телефона", type: "text", id: "phon", placeholder: "Например, 9005557766", value: "" },
        { vedlabel: "Введите почту:", label: "Почта", type: "email", id: "email", placeholder: "Например, test@mail.ru", value: "" },
        { vedlabel: "Желаемая зарплата:", label: "Желаемая зарплата", type: "text", id: "mun", placeholder: "Например, 30 000", value: "" },
        { vedlabel: "Ключеные навыки:", label: "Ключевые навыки", type: "text", id: "skills", placeholder: "Например, Ответственность, обучаемость, пунктуальность", value: "" },
        { vedlabel: "О себе:", label: "О себе", type: "text", id: "about", placeholder: "Например, Люблю создавать сайты, путешествовать и заниматься спортом!", value: "" },
      ],
      obraz: [
        { value: "Среднее" },
        { value: "Среднее специальное" },
        { value: "Неоконченное высшее" },
        { value: "Высшее" },
      ],
      formobraz: [
        {vedlabel: "Введите ваше учебное заведение", label: "Учебное заведение", type: "text", id: "zavedenie", placeholder: "Например, ЛГТУ", value: ""},
        {vedlabel: "Введите ваш факультет", label: "Факультет", type: "text", id: "fac", placeholder: "Например, ФАИ", value: ""},
        {vedlabel: "Введите вашу специализацию", label: "Специализация", type: "text", id: "spetc", placeholder: "Например, АСУ", value: ""},
        {vedlabel: "Год окончания", label: "Год окончания", type: "text", id: "yearoc", placeholder: "Например, 2022", value: ""},
      ],
      isnoValidPhone: "",
      dataApplied: false
      
    };
  },
  methods:{
    applyData(){
        this.dataApplied = true;
    }
  }

};
</script>
