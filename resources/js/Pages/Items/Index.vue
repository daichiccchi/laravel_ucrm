<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
// コントローラーから渡ってきた値をdefinePropsで受け取る
defineProps({
	items: Array
})

</script>

<template>

	<Head title="商品一覧" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">商品一覧</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<section class="text-gray-600 body-font">
						<FlashMessage />
						<div class="container px-5 py-8 mx-auto">
							<div class="lg:w-2/3 w-full mx-auto overflow-auto">
								<div class="flex pl-4 my-4 w-full mx-auto">
									<Link as="button" :href="route('items.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" >商品登録</Link>
								</div>
								<table class="table-auto w-full text-left whitespace-no-wrap">
									<thead>
										<tr>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
												id</th>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
												商品名</th>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
												価格</th>
											<th
												class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
												ステータス</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="item in items" :key="item.id">
											<td class="px-4 py-3">{{ item.id }}</td>
											<td class="px-4 py-3">
																				<!-- ▼ルート一覧のURLの引数と合わせる必要がある-->
												<Link :href="route('items.show', { item: item.id })">
													{{ item.name }}
												</Link>
											</td>
											<td class="px-4 py-3">{{ item.price }}</td>
											<td class="px-4 py-3 text-lg text-gray-900">{{ item.is_selling }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
