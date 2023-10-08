<script>
  export default{
    data(){
      return{
        prof: '',
        cit: '',
        im: '',
        fio: '',
        dat: '',
        obr: '',
        phon: '',
        email: '',
        mun: '',
      }
    }
  }
</script>

<template>
  <div class="container overflow-hidden">
    <div class="row gx-5">
      <div class="col">
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите профессию:</label>
          <input v-model="prof" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, Бухгалтер">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите город:</label>
          <input v-model="cit" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, Москва">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите ссылку на фотографию:</label>
          <input v-model="im" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, https://avatars.mds.yandex.net/i?id=bs&n=13">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите ФИО:</label>
          <input v-model="fio" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, Иванов Иван Иванович">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите дату рождения:</label>
          <input v-model="dat" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Например, 03.05.2000">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите образование:</label>
          <input v-model="obr" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, ЛГТУ">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите номер телефона:</label>
          <input v-model="phon" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, +79005557766">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Введите почту:</label>
          <input v-model="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Например, test@mail.ru">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Желаемая зарплата:</label>
          <input v-model="mun" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, 30 000">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">Ключеные навыки:</label>
          <input v-model="skills" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, Отвественность, обучаемость, пунктуальность">
        </div>
        <div class="mb-3 p-3 border bg-light">
          <label for="exampleFormControlInput1" class="form-label">О себе:</label>
          <input v-model="about" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например, Люблю создавать сайты, путешествовать и заниматься спортом!">
        </div>
      </div>

      <div class="col p-3 border bg-light">
        <h2 style="text-align: center;">
          Ваше резюме
        </h2>
        <div class="p-3 border">
          <img :src="im" alt="Ваша фотография" class="photo img-fluid" style="width: 200px;">
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ваше ФИО</p>
          <p>{{fio}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ваша Дата рождения</p>
          <p>{{dat}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ваша профессия</p>
          <p>{{prof}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ваш город</p>
          <p>{{cit}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ваш номер телефона</p>
          <p>{{phon}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ваша почта</p>
          <p>{{email}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ваше образование</p>
          <p>{{obr}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Желаемая зарплата</p>
          <p>{{mun}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">Ключевые навыки</p>
          <p>{{skills}}</p>
        </div>
        <div class="p-3 border">
          <p style="text-align: center;">О себе</p>
          <p>{{about}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
