<template>
    <div class="weather">
        <div class="city">
            {{ weather.city.name }}
        </div>
        <div class="country">
            {{ weather.city.country }}
        </div>
        <div class="images">
            <img v-if="weather.icon" :src="image" />
        </div>
        <div class="temperature">
            {{ weather.temperature }} <span class="deg">o</span>
        </div>
    </div>
</template>
<script setup>
let props = defineProps({
    weather: {
        type: Object,
    },
});

let image = `http://openweathermap.org/img/wn/${props.weather.icon}@2x.png`;
</script>
<style>
.weather {
    background: #4a164a;
    height: 190px;
    margin-right: 5px;
    padding: 10px;
    border-radius: 5px;

    grid-column-start: 1;
    grid-column-end: 2;
}
.city {
    color: white;
    font-weight: bold;
}
.country {
    color: bisque;
    font-size: 400;
}
.images {
    width: 100%;
}
.images > img {
    margin: auto;
    display: block;
}
.temperature {
    width: 100%;
    margin: auto;
    text-align: center;
    font-weight: bold;
    color: antiquewhite;
    font-size: 25px;
    position: relative;
    width: 120px;
}
.deg {
    position: absolute;
    top: -15px;
    right: 10px;
    color: azure;
    font-size: 200;
    font-weight: normal;
}
</style>
