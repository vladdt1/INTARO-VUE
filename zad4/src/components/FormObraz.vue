<template>
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
</template>
<script>
export default{
  props:['formobraz'],
}
</script>