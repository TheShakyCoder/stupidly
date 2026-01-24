<script setup>
import dayjs from 'dayjs';
import { defineProps } from 'vue';
import { Form } from '@inertiajs/vue3';

defineProps({
    payments: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <li v-for="payment in payments" :key="payment.id"
        class="group bg-white dark:bg-slate-900/60 backdrop-blur-md border border-gray-200 dark:border-white/10 rounded-2xl p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 transition-all hover:shadow-xl hover:shadow-primary/5 hover:border-primary/40">
        <div class="flex items-center gap-5">
            <div
                class="size-16 bg-blue-50/50 dark:bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0 transition-all group-hover:scale-110 group-hover:rotate-3 shadow-sm">
                <span class="material-symbols-outlined text-4xl">calendar_month</span>
            </div>
            <div>
                <h3 class="text-xl font-black text-gray-900 dark:text-white leading-tight mb-1">
                    {{ dayjs(payment.month.started_at).format('MMMM YYYY') }}
                    <span class="text-sm font-bold text-primary ml-2">({{ payment.tier == 1 ? 'Recordings' : 'Live Access' }})</span>
                </h3>
                <div class="flex flex-wrap gap-x-5 gap-y-1 mt-1">
                    <div class="flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-slate-400">
                        <span class="material-symbols-outlined text-lg text-secondary">school</span>
                        {{ payment.month.lessons.length }} Lessons
                    </div>
                    <div class="flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-slate-400">
                        <span class="material-symbols-outlined text-lg text-accent">videocam</span>
                        {{ payment.month.recordings.length }} Recordings
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between w-full sm:w-auto gap-8 shrink-0">
            <div class="text-3xl font-black text-gray-900 dark:text-white tracking-tighter">
                £{{ (payment.amount / 100).toFixed(0) }}
            </div>
            <Form action="/payments" method="delete">
                <input type="hidden" name="id" :value="payment.id">
                <button type="submit"
                    class="cursor-pointer size-12 text-red-400 hover:text-red-500 bg-gray-50 dark:bg-slate-800/50 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-xl flex items-center justify-center transition-all transform hover:rotate-12">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </Form>
        </div>
    </li>
</template>