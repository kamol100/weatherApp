<template>
    <div id="main">
       <div class="weather-info-parent">
         <WeatherInfo :default_country="default_country"/>
       </div>
       <div class="weather-statistics">
          <WeatherStatistics/>
       </div>
    </div>
</template>
<script setup>
import WeatherInfo from './components/WeatherInfo.vue';
import WeatherStatistics from './components/WeatherStatistics.vue';

let default_country = 1;

</script>

<style>
#main{
    width: 80vw;
    margin: auto;
    display: flex;
}
.weather-info-parent, .weather-statistics{
    width: 50%;
}
</style>