<!-- Редактирование резюме -->
<template>
    <div class="container overflow-hidden">
      <div class="row gx-5">
        <div class="col">
          <div class="mb-3 p-3 border bg-light">
            <h2 style="text-align: center;">Введите информацию</h2>
            <FormField v-for="(field, index) in formFields" :key="index" :field="field" :obraz="obraz" :formobraz="formobraz" :mass="mass"/>
            <button @click="applyData" class="btn btn-primary">Сохранить</button>
          </div>
        </div>
  
        <div class="col p-3 border bg-light">
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
    mounted() {
        const id = this.$route.query.id;
        this.id = id;

        // Делаем запрос на сервер для получения данных по id
        axios
        .get('http://localhost:8000/api/cv/select', {
            params: {
            id: id,
            },
        })
        .then((response) => {
            // Полученные данные
            const responseData = response.data;

            this.formFields[0].value = responseData[0].proff;
            this.formFields[1].value = responseData[0].city;
            this.formFields[2].value = responseData[0].photo;
            this.formFields[3].value = responseData[0].name;
            this.formFields[4].value = responseData[0].birstday;
            switch (responseData[0].obraz){
                case '1':
                    this.formFields[5].value = 'Среднее';
                    this.formFields[5].obrazovanie[0].education = 'Среднее';
                    break;
                case '2':
                    this.formFields[5].value = 'Среднее специальное';
                    this.formFields[5].obrazovanie[0].education = 'Среднее специальное';
                    break; 
                case '3':
                    this.formFields[5].value = 'Неоконченное высшее';
                    this.formFields[5].obrazovanie[0].education = 'Неоконченное высшее';
                    break;
                case '4':
                    this.formFields[5].value = 'Высшее';
                    this.formFields[5].obrazovanie[0].education = 'Высшее';
                    break;   
            }
            this.formFields[6].value = responseData[0].phone;
            this.formFields[7].value = responseData[0].email;
            this.formFields[8].value = responseData[0].mony;
            this.formFields[9].value = responseData[0].description;
            this.formFields[10].value = responseData[0].info;

            this.stat[0].status = responseData[0].status;

            const infoobrazString = responseData[0].infoobraz; // замените infoobraz на фактическую переменную из сервера
            // Разбиваем строку по символу ":"
            const infoobrazArray = infoobrazString.split(':');
            this.formobraz[0].value = infoobrazArray[0].trim();
            this.formobraz[1].value = infoobrazArray[1].trim();
            this.formobraz[2].value = infoobrazArray[2].trim();
            this.formobraz[3].value = infoobrazArray[3].trim();
        })
        .catch((error) => {
            console.error("Ошибка при получении данных:", error);
        });
        
    },
    components: {
      FormField,
      FormResume,
    },
    data() {
      return {
        isnoValidPhone: "",
        dataApplied: false,
        id: null,
        formFields: [
          { vedlabel: "Введите профессию:", label: "Профессия", type: "text", id: "proff", placeholder: "Например, Бухгалтер", value: "" },
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
        stat: [{id: "st", status: "Новый"}],
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
            const id = this.$route.query.id; // Получаем id из URL
            let obrazov;

            // Конвертируем значение образования в соответствующий код
            switch (this.formFields.find(field => field.id === 'obr').obrazovanie[0].education) {
                case 'Среднее':
                obrazov = 1;
                break;
                case 'Среднее специальное':
                obrazov = 2;
                break;
                case 'Неоконченное высшее':
                obrazov = 3;
                break;
                case 'Высшее':
                obrazov = 4;
                break;
                default:
                obrazov = 0;
            }

            // Создаем объект для передачи данных на сервер
            const formData = {
                id: id,
                prof: this.formFields.find(field => field.id === 'proff').value,
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
                status: this.stat.find(statuss => statuss.id === 'st').status,
            };

            // Отправляем POST-запрос на сервер для обновления данных
            const response = await axios.post('http://localhost:8000/api/cv/edit', formData);

            console.log(response.data); // Выводим ответ сервера в консоль
            this.dataApplied = true; // Обновляем интерфейс, если необходимо
            } catch (error) {
            console.error('Ошибка при отправке данных на сервер:', error);
            }
        },
    }
}
</script>
  