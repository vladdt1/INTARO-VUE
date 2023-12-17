<template>
    <input
          v-if="field.id !== 'phon' && field.id !== 'cit'"
          v-model="field.value"
          :type="field.type"
          class="form-control"
          :id="field.id"
          :placeholder="field.placeholder"
        />
        <div v-if="field.id == 'cit'">
          <input
            v-model="field.value"
            :type="field.type"
            class="form-control"
            :id="field.id"
            :placeholder="field.placeholder"
            @keyup="fetchCitySuggestions"
          />
          <!-- Добавляем выпадающий список с подсказками -->
          <ul v-if="citySuggestions.length" class="list-group">
            <li class="list-group-item" v-for="suggestion in citySuggestions" :key="suggestion.id"
              @click="selectCitySuggestion(suggestion)">{{ suggestion.title }}</li>
          </ul>
        </div>
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
</template>
<script>
export default{
    props:['field', 'mass'],
    methods: {
      
      validatePhoneNumber() {
          const phonePattern = /^\d{6,10}$/;
    
          if (phonePattern.test(this.field.value)) {
            this.isnoValidPhone = "";
          } else {
            this.isnoValidPhone = "Не валидный номер телефона";
          }
        },
      fetchCitySuggestions() {
        
        if (this.field.value.length < 2) {
          // Если введено менее 2 символов, не делаем запрос к API
          this.citySuggestions = [];
          return;
        }

        try {
          const apiKey = 'vk1.a.ZbP5wN4uJNxwLZC1l5YIvlMN36hQo5U6KnkmBR6IqmsjxAj0QAjlBLf1wCgdvypKtDS1Mqs3tozauQANS46SnoMnrwEQddZOdexvt-BwsF8warEKtkwaDwjS8Jb8LGTIEgnVJKJ687AGKpMLn7bWH8E04dl8CVmZcmBkEOjtnlcoaxoIlB-SsLD8vf3X46rvWTYTl6_x1drLf-tfv86Cdw';
          const callbackName = 'handleCitySuggestions'; // Уникальное имя обратного вызова

          // Создайте элемент скрипта для выполнения JSONP-запроса
          const script = document.createElement('script');
          script.src = `https://api.vk.com/method/database.getCities?q=${this.field.value}&country_id=1&v=5.131&access_token=${apiKey}&callback=${callbackName}`;

          // Определите глобальную функцию для обработки ответа
          window[callbackName] = (data) => {
            // Обработайте полученные данные
            if (data.response) {
              // Извлекаем массив подсказок из ответа API
              this.citySuggestions = data.response.items;
            }
          };

          document.body.appendChild(script);
        } catch (error) {
          console.error('Ошибка при запросе подсказок городов:', error);
          this.citySuggestions = [];
        }

      },
      selectCitySuggestion(suggestion) {
        console.log('нет');
        // Обработка выбранной подсказки
        this.field.value = suggestion.title;
        this.citySuggestions = []; // Очищаем список подсказок
      },
      
    },
      

}
</script>