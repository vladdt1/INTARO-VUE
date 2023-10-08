<template>
  <div class="cont">
    <div class="fot border box p-2 mb-3 bg-info container в"> 
      <h2 class="m-3">Футы в метры</h2> 
      <div class="ms-4"> 
        <div class="col"> 
          <div class="d-flex mb-3"> 
            <p class="fs-5 me-2">Футы:</p> 
            <input v-model="feet" @input="Meter" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertFeetToMeters(this.value)"> 
          </div> 
 
        </div> 
        <div class="col"> 
          <div class="d-flex"> 
            <p class="fs-5 me-2">Метр:</p> 
            <input v-model="meter" @input="Feet" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertMetersToFeet(this.value)"> 
          </div> 
 
        </div> 
      </div> 
    </div>

    <div class="fot border box p-2 mb-3 bg-light container"> 
      <h2 class="m-3">Морские мили в километры</h2> 
      <div class="ms-4"> 
        <div class="col"> 
          <div class="d-flex mb-3"> 
            <p class="fs-5 me-2">Морские мили:</p> 
            <input v-model="mile" @input="Kilometer" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertFeetToMeters(this.value)"> 
          </div> 
 
        </div> 
        <div class="col"> 
          <div class="d-flex"> 
            <p class="fs-5 me-2">Километры:</p> 
            <input v-model="kilometer" @input="Mile" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertMetersToFeet(this.value)"> 
          </div> 
 
        </div> 
      </div> 
    </div>

    <div class="fot border box p-2 mb-3 bg-info container"> 
      <h2 class="m-3">Градусы в радианы</h2> 
      <div class="ms-4"> 
        <div class="col"> 
          <div class="d-flex mb-3"> 
            <p class="fs-5 me-2">Градусы:</p> 
            <input v-model="degree" @input="Radian" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertFeetToMeters(this.value)"> 
          </div> 
 
        </div> 
        <div class="col"> 
          <div class="d-flex"> 
            <p class="fs-5 me-2">Радианы:</p> 
            <input v-model="radian" @input="Degree" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertMetersToFeet(this.value)"> 
          </div> 
 
        </div> 
      </div> 
    </div>

    <div class="fot border box p-2 mb-3 bg-light container"> 
      <h2 class="m-3">Цельсий - Фаренгейт</h2> 
      <div class="ms-4"> 
        <div class="col"> 
          <div class="d-flex mb-3"> 
            <p class="fs-5 me-2">По Цельсию:</p> 
            <input v-model="celsius" @input="Fahrenheit" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertFeetToMeters(this.value)"> 
          </div> 
 
        </div> 
        <div class="col"> 
          <div class="d-flex"> 
            <p class="fs-5 me-2">По Фаренгейту:</p> 
            <input v-model="fahrenheit" @input="Celsius" class="input-site border fs-4 p-2 w-100" type="text" oninput="convertMetersToFeet(this.value)"> 
          </div> 
 
        </div> 
      </div> 
    </div>
  </div>
</template>

<script>
  export default {
  data() {
    return {
      feet: 0,
      meter: 0,
      mile: 0,
      kilometer: 0,
      degree: 0,
      radian: 0,
      celsius: 0,
      fahrenheit: 0,
    };
  },
  methods: {
    Meter() {
      this.meter = this.feet * 0.3048;
    },
    Feet() {
      this.feet = this.meter * 3.28084;
    },
    Mile() {
      this.mile = this.kilometer * 0.621371;
    },
    Kilometer() {
      this.kilometer = this.mile * 1.60934;
    },
    Radian() {
      this.radian = this.degree * (Math.PI / 180);
    },
    Degree() {
      this.degree = this.radian * (180 / Math.PI);
    },
    Fahrenheit() {
      this.fahrenheit = (this.celsius * 9/5) + 32;
    },
    Celsius() {
      this.celsius = (this.fahrenheit - 32) * 5/9;
    },
  },
};
</script>

<style scoped>
  .fot{
    width: 40%;
  }
  h2{
    color: black;
  }
</style>
