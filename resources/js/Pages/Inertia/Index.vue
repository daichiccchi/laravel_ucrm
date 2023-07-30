<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Modal from '@/Components/MicroModalTest.vue';
import ChildComponent from '@/Components/ChildComponent.vue';
import { onMounted, reactive, ref, computed, onUnmounted } from 'vue';

const isShow = ref(false)

const toggle = () => {
    isShow.value = !isShow.value;
}


</script>
<template>
    <button type="button" @click="toggle" class="m-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white transition ease-in-out duration-150">
        表示/非表示
    </button>
    <div v-show="isShow">
        <ChildComponent />
    </div>
</template>