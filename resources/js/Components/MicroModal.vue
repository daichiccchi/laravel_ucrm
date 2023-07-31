<script setup>
import axios from 'axios';
import { ref, reactive, onMounted } from 'vue';
const isShow = ref(false);
const message = ref('');

const search = ref('');
const customers = reactive([]);


const toggle = () => {
    isShow.value = !isShow.value;
}


const data = {search: 'スズキ'}

const searchCustomers = async () => {
    await axios.get(`/api/searchCustomers?search=${search.value}`)
    .then( res => {
        customers.value = res.data;
    })
    toggle();
}

const emit = defineEmits(['update:customerId'])
const setCustomer = (customer) => {
    search.value = customer.kana;
    emit('update:customerId', customer.id);
    toggle();
}



</script>
<template>
    <div class="modal" v-show="isShow" id="modal-1" aria-hidden="true">
        <div class="modal__overlay" @click.self="toggle" tabindex="-1" data-micromodal-close>
            <div class="modal__container w-2/3" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        顧客検索
                    </h2>
                    <button type="button" @click="toggle" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <div v-if="customers.value" class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
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
                                <tr v-for="customer in customers.value.data" :key="customer.id">
                                    <td class="px-4 py-3">
                                        <button type="button" @click="setCustomer({ id: customer.id, kana: customer.kana })" class="text-blue-400">
                                            {{ customer.id }}
                                        </button>
                                    </td>
                                    <td class="px-4 py-3">{{ customer.name }}</td>
                                    <td class="px-4 py-3">{{ customer.kana }}</td>
                                    <td class="px-4 py-3 text-lg text-gray-900">{{ customer.tel }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div v-else class="text-center">
                        <p>検索結果がありません</p>
                    </div>
                </main>
                <footer class="modal__footer">
                    <button type="button" @click="toggle" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
                </footer>
            </div>
        </div>
    </div>
    <input name="customer" v-model="search" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    <button type="button" @click="searchCustomers" data-micromodal-trigger="modal-1" class="flex mx-auto text-white bg-teal-500 border-0 mt-2 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
        顧客検索
    </button>
</template>