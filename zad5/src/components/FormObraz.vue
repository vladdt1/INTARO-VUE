<template>
  <div class="mb-3 p-3 border bg-light" v-for="(obraz, index) in formobraz" :key="index">
    <p>{{ obraz.vedlabel }}</p>
    
    <input v-if="obraz.id !== 'zavedenie'"
      v-model="obraz.value"
      :type="obraz.type"
      class="form-control"
      :id="obraz.id"
      :placeholder="obraz.placeholder"
    />
    <div v-if="obraz.id == 'zavedenie'">
      <input 
        v-model="obraz.value"
        :type="obraz.type"
        class="form-control"
        :id="obraz.id"
        :placeholder="obraz.placeholder"
        @keyup="fetchUniversitySuggestions(obraz.value)"
      />
      <ul v-if="universitySuggestions.length" class="list-group">
        <li class="list-group-item" v-for="suggestion in universitySuggestions" :key="suggestion.id"
          @click="selectUniversitySuggestion(suggestion, obraz)">{{ suggestion.title }}</li>
      </ul>      
    </div>
  </div>
</template>

<script>
export default {
  props: ['formobraz'],
  data() {
    return {
      universitySuggestions: [],
    };
  },

  methods: {
    fetchUniversitySuggestions(obraz) {
      

      if (obraz.length < 2) {
        // Если введено менее 2 символов, не делаем запрос к API
        this.universitySuggestions = [];
        
        return;
      }

      try {
        
        const apiKey = 'vk1.a.ZbP5wN4uJNxwLZC1l5YIvlMN36hQo5U6KnkmBR6IqmsjxAj0QAjlBLf1wCgdvypKtDS1Mqs3tozauQANS46SnoMnrwEQddZOdexvt-BwsF8warEKtkwaDwjS8Jb8LGTIEgnVJKJ687AGKpMLn7bWH8E04dl8CVmZcmBkEOjtnlcoaxoIlB-SsLD8vf3X46rvWTYTl6_x1drLf-tfv86Cdw'; // Вставьте свой API ключ
        const callbackName = 'handleUniversitySuggestions';

        const script = document.createElement('script');
        script.src = `https://api.vk.com/method/database.getUniversities?q=${obraz}&country_id=1&v=5.131&access_token=${apiKey}&callback=${callbackName}`;

        window[callbackName] = (data) => {
          if (data.response) {
            this.universitySuggestions = data.response.items;
          }
        };

        document.body.appendChild(script);
      } catch (error) {
        console.error('Ошибка при запросе подсказок университетов:', error);
        this.universitySuggestions = [];
      }
    },
    selectUniversitySuggestion(suggestion, obraz) {
    obraz.value = suggestion.title;
    this.universitySuggestions = [];
  },
  },
};
</script>