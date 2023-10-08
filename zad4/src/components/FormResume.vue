<template>
    <h2 style="text-align: center;">Ваше резюме</h2>
        <div class="p-3 border">
          <img :src="formFields[2].value" alt="Ваша фотография" class="photo img-fluid" style="width: 200px;" />
        </div>
        <ResumeComp :formFields="formFields" :obraz="obraz" :formobraz="formobraz"/>
</template>
<script>
import ResumeComp from './ResumeComp.vue';

export default {
    props: ['formFields', 'obraz', 'formobraz'],
    components: { ResumeComp }
};
</script>