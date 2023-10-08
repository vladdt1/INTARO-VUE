<template>
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
</template>
<script>
export default{
    props:['field'],
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
}
</script>