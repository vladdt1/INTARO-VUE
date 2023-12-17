<template>
  <div>
    <HeaderVue />
    <router-view></router-view>
    
  </div>
</template>

<script>
import HeaderVue from './components/Header.vue'

export default {
  name: 'App',
  components: {
    HeaderVue
  },
  data() {
    return {
    }
  },
}
</script>
