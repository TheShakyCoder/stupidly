<template>
    <AppLayout title="Admin Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="py-12 bg-gray-100 dark:bg-gray-900 transition-colors">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Users Card -->
                    <Link :href="route('admin.users.index')" class="transform transition duration-300 hover:scale-105">
                        <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-200 dark:border-slate-700/50 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Users</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Manage application users.</p>
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full text-blue-600 dark:text-blue-400">
                                <span class="material-symbols-outlined text-3xl">group</span>
                            </div>
                        </div>
                    </Link>

                    <!-- Lessons Card -->
                    <Link :href="route('admin.lessons.index')" class="transform transition duration-300 hover:scale-105">
                        <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-200 dark:border-slate-700/50 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Lessons</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Manage course lessons.</p>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full text-green-600 dark:text-green-400">
                                <span class="material-symbols-outlined text-3xl">school</span>
                            </div>
                        </div>
                    </Link>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>
