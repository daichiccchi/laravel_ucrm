<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Label from '@/components/InputLabel.vue'
import Input from '@/components/TextInput.vue'

const emitTest = (e) => {
    console.log(e)
}
</script>

<template>
    <GuestLayout>
        <Label value="件名">タイトル</Label>
        <Input 
            modelValue="初期値"
            @update:modelValue="emitTest"
        ></Input>
    </GuestLayout>
    
</template>
