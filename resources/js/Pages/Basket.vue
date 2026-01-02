<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, Form } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import { ref, computed } from 'vue';

const props = defineProps({
    payments: {
        type: Array,
        default: []
    },
    fee: {
        type: String,
        default: "0"
    }
})

const checkingOut = ref(false)
const canCheckout = computed(() => {
    return props.payments.length > 0
})

const startCheckout = async () => {
    checkingOut.value = true
    try {
        const response = await axios.post('/checkout')

        window.location.href = response.data.url
    } catch (error) {
        // IMPORTANT: real browser navigation
        console.error('Checkout failed:', error)
        checkingOut.value = false
    }
}
</script>

<template>
    <AppLayout>

        <div class="py-12">
            <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="rounded-xl p-7 px-8 flex flex-col">

                    <h1 class="text-2xl mb-4">Basket</h1>
                    <ul class="flex flex-col space-y-8">
                        <li v-for="payment in payments"
                            class="bg-gray-200 dark:bg-gray-700 border border-gray-500 rounded p-4 px-5 flex justify-between items-center">
                            <div class="text-4xl">{{ dayjs(payment.month.started_at).format('MMMM YYYY') }}</div>
                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col items-end">
                                    <div>Total Lessons Scheduled: {{ payment.month.lessons.length }}</div>
                                    <div>Recordings Now Available: {{ payment.month.recordings.length }}</div>
                                </div>
                                <Form action="/payments" method="delete">
                                    <input type="hidden" name="id" :value="payment.id">
                                    <button type="submit"
                                        class="size-10 text-red-800 bg-red-200 hover:text-red-50 hover:bg-red-400 dark:bg-red-950 dark:text-red-50 dark:hover:bg-red-900 dark:hover:text-red-100 rounded-full p-4 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-3xl">close</span>
                                    </button>
                                </Form>
                            </div>
                        </li>
                        <li class="flex justify-between text-2xl py-8">
                            <div>Total</div>
                            <div>£{{ (payments.length * parseInt(fee) / 100).toFixed(2) }}</div>
                        </li>
                    </ul>
                    <button type="button" class="px-4 py-2  text-white text-xl font-bold rounded"
                        :class="[checkingOut || !canCheckout ? 'bg-gray-500 cursor-progress' : 'bg-green-500 cursor-pointer']"
                        @click="startCheckout" :disabled="checkingOut || !canCheckout">
                        Go to Payment
                    </button>
                    <span class="text-gray-200 italic">Payments for StupidlySmart are managed by <b>Fig Limited</b> and
                        will appear as such on all financial
                        documents.</span>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
