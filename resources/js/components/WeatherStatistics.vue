<template>
    <div class="main-stat">
        <div class="statistic-top">
            <h3>Weather statistics</h3>
            <div class="city-list">
                <select
                    name="city_id"
                    class="cities"
                    @change="updateStatistics"
                >
                    <option
                        :value="city.id"
                        v-for="city in cities"
                        :key="city.id"
                    >
                        {{ city.name }}, {{ city.country }}
                    </option>
                </select>
            </div>
        </div>

        <div class="temperature-chart">
            <TemperatureStatistics
                :hours="hours_data"
                :temperature="temperature_data"
            />
        </div>
        <div class="wind">
            <WindSpeedStatistics
                :hours="hours_data"
                :wind_speed="wind_speed_data"
            />
        </div>
        <div class="humidity">
            <HumidityStatistics :hours="hours_data" :humidity="humidity_data" />
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import TemperatureStatistics from "./TemperatureStatistics.vue";
import WindSpeedStatistics from "./WindSpeedStatistics.vue";
import HumidityStatistics from "./HumidityStatistics.vue";

let hours_data = ref([]);
let temperature_data = ref([]);
let humidity_data = ref([]);
let wind_speed_data = ref([]);
let cities = ref([]);
let city_id = ref(1);

const updateStatistics = (event) => {
    city_id.value = event.target.value;
    getStatistics();
};

const getStatistics = async () => {
    await fetch(
        `http://127.0.0.1:8000/api/v1/statistics?city=${city_id.value}`,
        {
            method: "GET",
            headers: {
                Accept: "application/json",
            },
        }
    )
        .then((response) => response.json())
        .then((response) => {
            const { hours, temperature, humidity, wind_speed } = response;
            hours_data.value = hours;
            temperature_data.value = temperature;
            humidity_data.value = humidity;
            wind_speed_data.value = wind_speed;
        })
        .catch((errors) => {
            console.log(errors);
        });
};

const getCities = async () => {
    await fetch(`http://127.0.0.1:8000/api/v1/cities`, {
        method: "GET",
        headers: {
            Accept: "application/json",
        },
    })
        .then((response) => response.json())
        .then((response) => {
            const { data } = response;
            cities.value = data;
        })
        .catch((errors) => {
            console.log(errors);
        });
};

onMounted(() => {
    getCities();
    getStatistics();
});
</script>

<style>
.statistic-top {
    display: flex;
    justify-content: space-between;
}
.cities {
    margin-top: 15px;
    height: 30px;
    border-radius: 5px;
    padding: 5px;
}
.main-stat {
    padding: 20px;
    background: #f2e7f3;
    margin-top: 50px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
.wind,
.humidity {
    border-top: 2px solid white;
    margin-top: 15px;
}
</style>
