<script setup>
import { router } from '@inertiajs/vue3'
import axios from 'axios'

defineProps({
    months: {
        type: Array,
        default: []
    }
})


const startCheckout = async () => {
    try {
        const response = await axios.post('/checkout')

        // IMPORTANT: real browser navigation
        window.location.href = response.data.url
    } catch (error) {
        console.error('Checkout failed:', error)
    }
}

function submit() {
    axios.post('/checkout').then(response => {
        window.location.href = response.data.url;
    })
}
</script>

<template>
    <div class="checkout">
        <button type="button" class="px-4 py-2 bg-black text-white rounded" @click="startCheckout">
            Pay now
        </button>
    </div>
</template>

<style lang="scss" scoped></style>
