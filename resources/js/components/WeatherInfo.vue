<template>
    <div class="main-wather">
        <h1>Weather info</h1>
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
import { onMounted, reactive, ref } from "vue";
import WeatherInfoItem from "./WeatherInfoItem.vue";

const props = defineProps({
    default_country: {
        type: Number,
    },
});

let weather_info = ref([]);

onMounted(() => {
    fetch(
        `http://127.0.0.1:8000/api/v1/weather-reports?country=${props.default_country}`,
        {
            method: "GET",
            headers: {
                Accept: "application/json",
            },
        }
    )
        .then((response) => response.json())
        .then((response) => {
            const { data } = response;
            weather_info.value = data;
        });
});
</script>
<style>
.main-wather{
    padding: 20px;
    background: whitesmoke;
    margin-top: 50px;
    border-radius: 5px;
}
.weather-info {
    display: grid;
     grid-template-columns: auto auto auto;
  gap: 10px;
}
.weather-info-item{
     grid-column-start: 1;
  grid-column-end: 2;
}
</style>
