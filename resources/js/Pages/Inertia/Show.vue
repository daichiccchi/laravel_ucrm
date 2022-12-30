<script setup>
import { Inertia } from '@inertiajs/inertia'
// import ConfirmPassword from 'vendor/laravel/breeze/stubs/inertia-react/resources/js/Pages/Auth/ConfirmPassword';

defineProps({
    id : String,
    blog: Object
})

const deleteConfirm = id => {
    // console.log(id)
    Inertia.delete(`/inertia/${id}`, {
    onBefore: () => confirm('Are you sure you want to delete this user?'),
})

}
</script>

<template>
    {{ id }}<br>
    {{ blog.title }}<br>
    <button @click="deleteConfirm(blog.id)">削除</button>
</template>