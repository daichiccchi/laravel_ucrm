<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
// コントローラーから渡ってきた値をdefinePropsで受け取る
defineProps({
	// laravelのページネーションを使用する場合はオブジェクト型にする必要がある
	customers: Object
})

</script>

<template>
	<ul v-for="customer in customers.data" :key="customer.id">
		<li>{{ customer.id }}</li>
		<li>{{ customer.name }}</li>
	</ul>
	<Pagination class="mt-6" :links="customers.links"></Pagination>
</template>