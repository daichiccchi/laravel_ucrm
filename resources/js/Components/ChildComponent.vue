<script setup>
import axios from 'axios';
import { ref, onMounted, onUpdated, onUnmounted } from 'vue';

const text = ref('')


onMounted(() => {
    console.log('onMounted')
})

// リアクティブなデータが更新された後に呼び出されます。
onUpdated(() => {
    console.log('onUpdated: ' + text.value)
})

onUnmounted(() => {
    console.log('onUnmounted')
})


</script>

<template>
    <label for="default-input" class="block mb-2 ml-5 text-sm font-medium text-gray-900">
        入力してください
    </label>
    <input type="text" id="default-input" v-model="text" class="bg-gray-500 ml-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</template>