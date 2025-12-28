<script setup>
import { Form, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from 'dayjs';

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
                        <div class="flex justify-between items-center text-lg">
                            <div class="text-xl">{{ dayjs(currentMonth.started_at).format('MMMM YYYY') }}</div>
                            <div class="flex items-center space-x-4">
                                <div v-if="currentMonth?.payments.length === 0" class="flex justify-between">
                                    <Form action="/basket" method="post">
                                        <input v-if="currentMonth" type="hidden" name="month_id"
                                            :value="currentMonth.id" />
                                        <button type="submit" class="p-4 px-5 rounded bg-green-500 font-bold">Add to
                                            Basket</button>
                                    </Form>
                                </div>
                                <div v-else>
                                    <div class="p-4 px-5 rounded bg-gray-500 font-bold">Purchased</div>
                                </div>
                                <Link :href="`/months/${currentMonth.id}`" class="underline-offset-4 underline">view
                                </Link>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl p-8">
                        <h2 class="text-2xl font-bold">All Months</h2>
                        <ul class="flex flex-col space-y-4 mt-4 text-lg">
                            <li v-for="m in months" class="flex justify-between items-center">
                                <div class="text-xl">{{ dayjs(m.started_at).format('MMMM YYYY') }}</div>
                                <div class="flex justify-between items-center space-x-4">
                                    <div v-if="m.payments?.length === 0">
                                        <Form action="/basket" method="post">
                                            <input type="hidden" name="month_id" :value="m.id" />
                                            <button type="submit" class="p-4 px-5 rounded bg-green-500 font-bold">Add to
                                                Basket</button>
                                        </Form>
                                    </div>
                                    <div v-else>
                                        <div class="p-4 px-5 rounded bg-gray-500 font-bold">Purchased</div>
                                    </div>
                                    <Link :href="`/months/${m.id}`" class="underline-offset-4 underline">view</Link>
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </AppLayout>
</template>
