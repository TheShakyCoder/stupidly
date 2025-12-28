<script setup>
import { Form } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    currentMonth: {
        type: Object,
        default: () => { }
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
                        {{ currentMonth }}
                        <div v-if="currentMonth?.payment">{{ currentMonth.payment }}</div>
                        <div v-else>
                            You are not subscribed to the current month.
                            <Form action="/basket" method="post">
                                <input v-if="currentMonth" type="hidden" name="month_id" :value="currentMonth.id" />
                                <button type="submit">Add to Basket</button>
                            </Form>
                        </div>
                    </div>

                    <div class="rounded-xl p-8">
                        <h2 class="text-2xl font-bold">Previous Months</h2>
                        <div v-for="m in months" class="flex justify-between">
                            <div>{{ m.started_at }}</div>
                            <div>
                                <Form action="/basket" method="post">
                                    <input type="hidden" name="month_id" :value="m.id" />
                                    <button type="submit">Add to Basket</button>
                                </Form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AppLayout>
</template>
