<script setup>
import axios from 'axios';
import { ref, onMounted, onUpdated, nextTick, onUnmounted } from 'vue';
const isShow = ref(false);
const message = ref('');




const toggle = () => {
    isShow.value = !isShow.value;
}





axios.get('/api/user')
.then( res => {
    message.value = res.data.name
})

onMounted(() => {
    console.log('onMounted')
})

// リアクティブなデータが更新された後に呼び出されます。
onUpdated(() => {
    console.log('onUpdated')
})

onUnmounted(() => {
    console.log('onUnmounted')
})


</script>
<template>
    <div class="modal" id="modal-1" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        {{ message }}
                    </h2>
                    <button type="button" @click="toggle" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <p>
                        Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also,
                        <code>esc</code> to close modal.
                    </p>
                </main>
                <footer class="modal__footer">
                    <button type="button" @click="toggle" class="modal__btn modal__btn-primary">Continue</button>
                    <button type="button" @click="toggle" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>
            </div>
        </div>
    </div>
</template>