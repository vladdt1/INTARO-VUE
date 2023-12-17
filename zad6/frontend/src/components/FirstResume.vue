<!-- Главная страница с карточками резюме и драг н дроп -->
<template>
  <div>
  <div class="table">
    <span class="column">Новый ({{ news.length}})</span>
    <span class="column">Назначено собеседование ({{interview.length}})</span>
    <span class="column">Принят ({{accepted.length}})</span>
    <span class="column">Отказ ({{rejected.length}})</span>
  </div>
  <div class="table">
      <draggable 
      class="column"
      :list="news"
      item-key="id" 
      group="people" 
      @start="drag=true" 
      @end="drag=false">
      <template #item="{element}">
        <DragCard 
          :name="element.name"
          :photo="element.photo"
          :proff="element.proff"
          :age="element.age"
          :id="element.id">
        </DragCard>
      </template>
      </draggable>
    

      <draggable
        class="column"
        :list="interview"
        item-key="id" 
        group="people" 
        @start="drag=true" 
        @end="drag=false">
        <template #item="{element}">
          <DragCard 
            :name="element.name"
            :photo="element.photo"
            :proff="element.proff"
            :age="element.age"
            :id="element.id">
          </DragCard>
        </template>
      </draggable>

      <draggable
        class="column"
        :list="accepted"
        item-key="id" 
        group="people" 
        @start="drag=true" 
        @end="drag=false">
        <template #item="{element}">
          <DragCard 
            :name="element.name"
            :photo="element.photo"
            :proff="element.proff"
            :age="element.age"
            :id="element.id">
          </DragCard>
        </template>
      </draggable>

      <draggable
        class="column"
        :list="rejected"
        item-key="id" 
        group="people" 
        @start="drag=true" 
        @end="drag=false">
        <template #item="{element}">
          <DragCard 
            :name="element.name"
            :photo="element.photo"
            :proff="element.proff"
            :age="element.age"
            :id="element.id">
          </DragCard>
        </template>
      </draggable>
  </div>
</div>
  
</template>

<script>
  import draggable from 'vuedraggable'
  import DragCard from './DragCard.vue'
  import axios from 'axios';

  export default {
    components: {
      draggable,
      DragCard
    },
    data() {
      return {
        drag: true,
        news: [],
        interview: [],
        accepted: [],
        rejected: [],
      }
    },
    methods: {
        update_tables() {
          const options = {
            method: 'GET',
            url: 'http://localhost:8000/api/cv',
          };
          var self = this;

          axios.request(options).then(function (response) {
            for(var i = 0; i < response.data.length; i+=1) {
              var new_card_data = {
                id: response.data[i].id,
                proff: response.data[i].proff,
                name: response.data[i].name,
                photo: response.data[i].photo,
                age: response.data[i].birstday
              }
              if(response.data[i].status == "1") {
                self.news.push(new_card_data)
              }
              if(response.data[i].status == "2") {
                self.interview.push(new_card_data)
              }
              if(response.data[i].status == "3") {
                self.accepted.push(new_card_data)
              }
              if(response.data[i].status == "4") {
                self.rejected.push(new_card_data)
              }
              
            }

          }).catch(function (error) {
            console.error(error);
          });
        },

      async change_status(summary_id, new_status) {
        try {
          const options = {
            id: summary_id,
            status: new_status,
          };

          const response = await axios.post('http://localhost:8000/api/cv/status', options);

          console.log(response.data); // Выводим ответ сервера в консоль
          this.dataApplied = true; // Обновляем интерфейс, если необходимо
        } catch (error) {
        console.error('Ошибка при отправке данных на сервер:', error);
        }
      }
    },
    created() {
      this.update_tables()
    },
    watch: {
      news: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, 1)
          }
        },
        deep:true
      },
      interview: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, 2)
          }
        },
        deep:true
      },
      accepted: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, 3)
          }
        },
        deep:true
      },
      rejected: {
        handler(val) {
          for(var i = 0; i < val.length; i++) {
            this.change_status(val[i].id, 4)
          }
        },
        deep:true
      },
    }
  }

</script>

<style scoped>
  .table {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding: 10px;
  }

  .column {
    text-align: center;
    float: left;
    min-width: 22%;
    border-style: solid;
  }
</style>