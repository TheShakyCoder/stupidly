<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    currentMonth: {
        type: Object,
        default: {}
    }
})

const emit = defineEmits([
    'addToBasket',
    'removePayment'
])

const addToBasket = (monthId, tier) => {
    emit('addToBasket', monthId, tier)
}

const removePayment = (paymentId) => {
    emit('removePayment', paymentId)
}
</script>

<template>
    <span class="flex gap-4 w-full sm:w-auto">

        <template v-if="currentMonth?.payments?.length === 0">
            <!-- payments.lenth === 0 -->
    
            <span v-if="$page.props.auth.user.free" class="isolate inline-flex rounded-md shadow-sm dark:shadow-none">
                <!-- user.free === true -->
                <button type="button" @click="addToBasket(currentMonth.id, 'Free')"
                    class="relative -ml-px inline-flex items-center rounded-l-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10 dark:bg-white/10 dark:text-white dark:ring-gray-700 dark:hover:bg-white/20">
                    FREE
                </button>
            </span>
    
            <span v-else class="isolate inline-flex rounded-md shadow-sm dark:shadow-none">
                <!-- user.free === false -->
                <button type="button" @click="addToBasket(currentMonth.id, 'Recordings')"
                    class="transition-all transform hover:scale-110 active:scale-95 -ml-px inline-flex items-center rounded-l-xl bg-green-400 dark:bg-blue-900/10 text-blue-500 dark:text-blue-400 font-black p-4 px-5 text-sm font-semibold text-gray-900 focus:z-10 dark:bg-green-900 dark:text-white">
                    <div class="flex flex-col">
                        <span class="text-3xl"><span class="text-sm align-top mr-0.5">£</span>{{
                            parseInt(currentMonth.fee_recordings / 100).toFixed(0) }}</span>
                        <span class="text-xs">Recordings</span>
                    </div>
                </button>
                <button type="button" @click="addToBasket(currentMonth.id, 'Live Access')"
                    class="transition-all transform hover:scale-110 active:scale-95 -ml-px inline-flex items-center rounded-r-xl bg-green-600 p-4 px-5 text-sm font-semibold text-white focus:z-10 dark:bg-green-600 dark:text-white">
                    <div class="flex flex-col">
                        <span class="text-3xl"><span class="text-sm align-top mr-0.5">£</span>{{ parseInt(currentMonth.fee /
                            100).toFixed(0) }}</span>
                        <span class="text-xs">Live&nbsp;Access</span>
                    </div>
                </button>
            </span>
        </template>
    
        <template v-else>
            <!-- payments.length === 1 -->
            <!-- in basket -->
            <span v-if="currentMonth?.payments[0].purchased_at === null"
                class="w-full sm:w-auto bg-blue-50 dark:bg-blue-900/10 text-blue-500 dark:text-blue-400 font-black p-4 px-5 rounded-2xl flex items-center justify-center gap-2 border border-blue-100 dark:border-blue-700/50">
                <button type="button" @click="removePayment(currentMonth.payments[0]?.id)"
                    class="transition-all transform hover:rotate-12 active:rotate-0 -ml-px inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 focus:z-10 dark:text-red-500 dark:ring-gray-700 dark:hover:text-red-600">
                    <span class="material-symbols-outlined">delete</span>
                </button>
                <div class="flex flex-col">
                    <span>In Basket</span>
                    <span class="text-sm font-normal">({{ currentMonth.payments[0].tier == 1 ? 'Recordings' : 'Live Access'}})</span>
                </div>
            </span>
            <!-- purchased -->
            <div v-else
                class="w-full sm:w-auto bg-green-50 dark:bg-green-900/10 text-green-500 dark:text-green-400 font-black p-4 px-6 rounded-2xl flex items-center justify-center gap-2 border border-green-100 dark:border-green-700/50">
                <span class="material-symbols-outlined">verified</span>
                <div class="flex flex-col">
                    <span>Purchased</span>
                    <span class="text-sm font-normal">({{ currentMonth.payments[0]?.tier }})</span>
                </div>
    
            </div>
        </template>
    </span>
</template>