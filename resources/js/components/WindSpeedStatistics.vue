<template>
    <div>
        <h4>Wind Speed (Last 24 hours)</h4>
        <LineChart v-bind="lineChartProps" />
    </div>
</template>
<script setup lang="ts">
import { computed } from "vue";
import { LineChart, useLineChart } from "vue-chart-3";
import { Chart, ChartData, registerables } from "chart.js";
Chart.register(...registerables);

const props = defineProps({
    hours: {
        type: Array,
    },
    wind_speed: {
        type: Array,
    },
});

const getData = computed<ChartData<"line">>(() => ({
    labels: props.hours,
    datasets: [
        {
            label: "km/h",
            data: props.wind_speed as [],
            fill: true,
            borderColor: "#4bc0c0",
            fillColor: "rgba(172,194,132,0.4)",
            strokeColor: "#ACC26D",
            pointColor: "#fff",
            pointStrokeColor: "#9DB86D",
            lineTension: 0.5
        },
    ],
}));

const { lineChartProps } = useLineChart({
    chartData: getData,
});
</script>
