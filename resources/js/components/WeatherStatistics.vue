<template>
    <div class="main-stat">
      <h1>Weather statistics</h1>

      <div class="temprature">
       <TempratureStatistics :hours="hours_data" :temprature="temperature_data"/>
      </div>
      <div class="wind">
       <WindSpeedStatistics/>
      </div>
      <div class="humidity">
       <HumidityStatistics/>
      </div>
    </div>
</template>

<script setup>
   import { ref, onMounted } from 'vue';
   import TempratureStatistics from './TempratureStatistics.vue';
   import WindSpeedStatistics from './WindSpeedStatistics.vue';
   import HumidityStatistics from './HumidityStatistics.vue';

   let hours_data = ref([]);
   let temperature_data = ref([]);
   let humidity_data = ref([]);

onMounted(() => {
    fetch(
        `http://127.0.0.1:8000/api/v1/statistics`,
        {
            method: "GET",
            headers: {
                Accept: "application/json",
            },
        }
    )
        .then((response) => response.json())
        .then((response) => {
          const {hours, temperature, humidity} = response;
          hours_data.value = hours;
          temperature_data.value = temperature;
          humidity_data.value = humidity;
        }).catch((errors) =>{
          console.log(errors);
        });
});
</script>

<style>

.main-stat{
    padding: 20px;
    background: #f2e7f3;
    margin-top: 50px;
    border-radius: 5px;
}
</style>