<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
// コントローラーから渡ってきた値をdefinePropsで受け取る
const props = defineProps({
	// laravelのページネーションを使用する場合はオブジェクト型にする必要がある
	customers: Object
})
console.log(props.customers.data);
const search = ref('')

const searchCustomers = () => {
	// routeの第２引き数がControllerに渡る
	Inertia.get(route('customers.index', { search: search.value }))
}

</script>

<template>

	<Head title="顧客一覧" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<section class="text-gray-600 body-font">
						<FlashMessage />
						<div class="container px-5 py-8 mx-auto">
							<div class="lg:w-2/3 w-full mx-auto overflow-auto">
								<div class="flex pl-4 my-4 w-full mx-auto">
									<div>
										<input type="text" name="search" v-model="search">
										<button class="bg-blue-300 text-white py-2 px-2"
											@click="searchCustomers">検索</button>
									</div>
									<Link as="button" :href="route('customers.create')"
										class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
									顧客登録</Link>
								</div>
								<div v-if="props.customers.data.length === 0">
									<p>検索に一致したデータがありません</p>
								</div>
								<table v-else class="table-auto w-full text-left whitespace-no-wrap">
									<thead>
										<tr>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
												id</th>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
												氏名</th>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
												カナ</th>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
												電話番号</th>
										</tr>
									</thead>
									<tbody>
										<!-- 単数形 in 複数形 -->
										<tr v-for="customer in customers.data" :key="customer.id">
											<td class="px-4 py-3">{{ customer.id }}</td>
											<td class="px-4 py-3">{{ customer.name }}</td>
											<td class="px-4 py-3">{{ customer.kana }}</td>
											<td class="px-4 py-3 text-lg text-gray-900">{{ customer.tel }}</td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
						<Pagination class="flex justify-center m-4" :links="customers.links"></Pagination>
					</section>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
