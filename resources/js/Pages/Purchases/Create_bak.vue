<script setup>
import { getToday } from '@/common';
import { onMounted, reactive, ref, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const form = reactive({
    date: null,
    customer_id: null,
    status: true,
    items: [],
})


const props = defineProps({
    'customers': Array,
    'items': Array
})

const itemList = ref([]);

onMounted(() => {
    form.date = getToday();
    // props.itemsをitenListにコピー
    props.items.forEach((item) => {
        itemList.value.push({
            id: item.id,
            name: item.name,
            price: item.price,
            quantity: 0,
        })
    })
})

const storePurchase = () => {
    itemList.value.forEach((item) => {
        if (item.quantity > 0) {
            form.items.push({
                id: item.id,
                quantity: item.quantity,
            })
        }
    })
    Inertia.post(route('purchases.store'), form);
}

// 関数内に使われている値に変化が生じた時に発火する
const totalPrice = computed(() => {
    let total = 0;
    itemList.value.forEach((item) => {
        total += item.price * item.quantity;
    })
    return total;
})

const quantity = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

</script>
<template>
<form @submit.prevent="storePurchase">
    購入画面です。<br>
    日付<br>
    <input type="date" name="date" v-model="form.date"><br>
    会員名<br>
    <select name="customer" v-model="form.customer_id">
        <option v-for="customer in
            customers" :value="customer.id" :key="customer.id">
            {{ customer.id }} : {{ customer.name }}
        </option>
    </select>
    <br>
    <br>

    商品・サービス<br>
    <table>
        <tbody>
            <tr>
                <th>id</th>
                <th>商品名</th>
                <th>金額</th>
                <th>数量</th>
                <th>小計</th>
            </tr>
            <tr v-for="item in itemList">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.price }}</td>
                <td>
                    <select name="quantity" v-model="item.quantity">
                        <option v-for="q in quantity" :value="q">{{ q }}</option>
                    </select>
                </td>
                <td>
                    {{ item.price * item.quantity }}
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    合計金額：{{ totalPrice }} 円<br>
    <button>登録する</button>
</form>
</template>