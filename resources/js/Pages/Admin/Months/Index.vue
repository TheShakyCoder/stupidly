<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import dayjs from 'dayjs';

defineProps({
    months: Object,
});
</script>

<template>
    <AdminLayout title="Months">
        <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-slate-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 dark:bg-slate-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Month
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 dark:bg-slate-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Recordings
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 dark:bg-slate-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Live Access
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 dark:bg-slate-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Content
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 dark:bg-slate-700 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr v-for="month in months.data" :key="month.id">
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ dayjs(month.started_at).format('MMMM YYYY') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                £{{ (month.fee_recordings / 100).toFixed(0) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                £{{ (month.fee / 100).toFixed(0) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ month.lessons_count }} Lessons, {{ month.recordings_count }} Recordings
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <Link :href="route('admin.months.edit', month.id)"
                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    Edit Pricing
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
