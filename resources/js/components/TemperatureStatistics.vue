<template>
    <div>
        <h4>
            Temperature (Last 24 hours)
        </h4>
        <LineChart v-bind="lineChartProps"/>
    </div>
</template>
<script setup lang="ts">
import { computed } from "vue";
import { LineChart, useLineChart } from "vue-chart-3";
import { Chart, ChartData, registerables } from "chart.js";
Chart.register(...registerables);

const props = defineProps({
   hours:{
    type:Array
   },
   temperature:{
    type:Array
   }
})

    const getData = computed<ChartData<"line">>(() => ({
      labels: props.hours,
      datasets: [
        {
          label: "Celsius",
          data: props.temperature as [],
          fill: false,
          borderColor: "#4bc0c0",
        },
      ],
    }));


const { lineChartProps} = useLineChart({
    chartData:getData
})
</script>
