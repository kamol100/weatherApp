<template>
    <div>
        <h4>Humidity (Last 24 hours)</h4>
        <BarChart v-bind="barChartProps" />
    </div>
</template>
<script setup>
import { ref, computed } from "vue";
import { BarChart, useBarChart } from "vue-chart-3";

const props = defineProps({
    hours: {
        type: Array,
    },
    humidity: {
        type: Array,
    },
});

const chartData = computed(() => ({
    labels: props.hours,
    datasets: [
        {
            label: "Humidity",
            data: props.humidity,
            backgroundColor: ["#A5C8ED"],
        },
    ],
}));

const { barChartProps } = useBarChart({
    chartData,
});
</script>
