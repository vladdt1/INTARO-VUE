<template>
    <h2 style="text-align: center;">Ваше резюме</h2>
        <div class="p-3 border">
          <img :src="formFields[2].value" alt="Ваша фотография" class="photo img-fluid" style="width: 200px;" />
        </div>
        <ResumeComp :formFields="formFields" :obraz="obraz" :formobraz="formobraz"/>
        <div class="p-3 border">
          <p style="text-align: center;">Ваш статус </p>
          <p>{{ stat.status }}</p>
        </div>
</template>
<script>
import ResumeComp from './ResumeComp.vue';

export default {
    props: ['formFields', 'obraz', 'formobraz', 'stat'],
    components: { ResumeComp }
};
</script>