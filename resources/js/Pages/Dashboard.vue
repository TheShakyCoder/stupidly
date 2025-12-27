<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    currentMonth: {
        type: Object,
        default: () => {
            payment: { }
        }
    },
    months: {
        type: Array,
        default: () => []
    }
})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg max-w-4xl mx-auto">

                    <div class="rounded-xl p-8">
                        <h2 class="text-2xl font-bold">Current Month</h2>
                        <div v-if="currentMonth.payment">{{ currentMonth.payment }}</div>
                        <div v-else>
                            You are not subscribed to the current month.
                        </div>
                    </div>

                    <div class="rounded-xl p-8">
                        <h2 class="text-2xl font-bold">Previous Months</h2>
                        <div v-for="m in months">{{ m }}</div>
                    </div>


                </div>
            </div>
        </div>
    </AppLayout>
</template>
