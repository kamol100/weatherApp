<template>
    <div class="main-weather">
        <h3>Weather Reports</h3>
        <div class="weather-info">
            <div
                class="weather-inof-item"
                v-for="weather in weather_info"
                :key="weather.id"
            >
                <WeatherInfoItem :weather="weather" />
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import WeatherInfoItem from "./WeatherInfoItem.vue";

let weather_info = ref([]);

onMounted(() => {
    fetch(`http://127.0.0.1:8000/api/v1/weather-reports`, {
        method: "GET",
        headers: {
            Accept: "application/json",
        },
    })
        .then((response) => response.json())
        .then((response) => {
            const { data } = response;
            weather_info.value = data;
        });
});
</script>
<style>
.main-weather {
    padding: 20px;
    background: whitesmoke;
    margin-top: 50px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
.weather-info {
    display: grid;
    grid-template-columns: auto auto auto;
    gap: 10px;
}
.weather-info-item {
    grid-column-start: 1;
    grid-column-end: 2;
}
</style>
