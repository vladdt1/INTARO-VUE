<template>
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
</template>
<script>
export default{
    props:['formobraz', 'formFields', 'obraz']
}
</script>