<script setup>
import { Form, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from 'dayjs';

const props = defineProps({
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

        <div class="py-12 bg-background-light dark:bg-background-dark min-h-screen transition-colors duration-300">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Left Column: Months -->
                    <div class="md:col-span-2 space-y-8">
                        <!-- Current Month Section -->
                        <div class="relative group">
                            <!-- Background Glow for Dark Mode -->
                            <div class="absolute -inset-1 bg-linear-to-r from-primary/20 to-secondary/20 rounded-2xl blur opacity-0 dark:group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                            
                            <div class="relative bg-white dark:bg-slate-900/60 backdrop-blur-md overflow-hidden shadow-2xl border border-gray-200 dark:border-white/10 rounded-2xl transition-all">
                                <div class="p-8">
                                    <div class="flex items-center justify-between mb-6">
                                        <h2 class="text-xs uppercase tracking-[0.2em] font-black text-primary dark:text-primary/80">Current Billing Period</h2>
                                        <div class="size-10 bg-blue-50 dark:bg-blue-900 rounded-lg flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                            <span class="material-symbols-outlined font-bold">event</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                                        <div class="flex flex-col gap-1">
                                            <h3 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">
                                                {{ dayjs(currentMonth.started_at).format('MMMM YYYY') }}
                                            </h3>
                                            <Link :href="`/months/${currentMonth.id}`" 
                                                class="inline-flex items-center gap-1.5 text-sm font-bold text-gray-500 hover:text-primary dark:text-slate-400 dark:hover:text-white transition-colors group/link">
                                                View details
                                                <span class="material-symbols-outlined text-sm group-hover/link:translate-x-1 transition-transform">arrow_right_alt</span>
                                            </Link>
                                        </div>

                                        <div class="flex items-center gap-4 w-full sm:w-auto">
                                            <div v-if="currentMonth?.payments.length === 0" class="w-full sm:w-auto">
                                                <Form action="/basket" method="post">
                                                    <input v-if="currentMonth" type="hidden" name="month_id"
                                                        :value="currentMonth.id" />
                                                    <button type="submit"
                                                        class="w-full sm:w-auto transition-all transform hover:scale-105 active:scale-95 shadow-xl hover:shadow-green-500/25 p-4 px-6 rounded-2xl bg-linear-to-br from-secondary to-green-600 text-white flex items-center justify-center gap-3">
                                                        <span class="text-2xl font-black tracking-tighter leading-none"><span class="text-sm align-top mr-0.5">£</span>{{ (parseInt(currentMonth?.fee) / 100).toFixed(0) }}</span>
                                                        <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                                                    </button>
                                                </Form>
                                            </div>
                                            <div v-else-if="currentMonth?.payments[0].purchased_at === null" 
                                                class="w-full sm:w-auto bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 font-black p-4 px-6 rounded-2xl flex items-center justify-center gap-2 border border-slate-200 dark:border-slate-700/50">
                                                <span class="material-symbols-outlined">shopping_basket</span>
                                                In Basket
                                            </div>
                                            <div v-else 
                                                class="w-full sm:w-auto bg-blue-50 dark:bg-primary/10 text-primary font-black p-4 px-6 rounded-2xl flex items-center justify-center gap-2 border border-blue-100 dark:border-primary/20">
                                                <span class="material-symbols-outlined">verified</span>
                                                Purchased
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- All Months Section -->
                        <div class="bg-white dark:bg-slate-900/40 backdrop-blur-sm border border-gray-200 dark:border-white/5 rounded-2xl overflow-hidden shadow-sm">
                            <div class="p-8 pb-0">
                                <h2 class="text-xl font-black text-gray-900 dark:text-white tracking-tight">Payment History</h2>
                                <p class="text-sm text-gray-500 dark:text-slate-500 mt-1 mb-6">Review and manage your previous billing cycles.</p>
                            </div>
                            
                            <ul class="divide-y divide-gray-100 dark:divide-white/5">
                                <li v-for="m in months" :key="m.id" 
                                    class="group p-6 sm:px-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                                    <div class="flex items-center gap-5">
                                        <div class="size-12 bg-gray-100 dark:bg-slate-800 rounded-xl flex items-center justify-center text-gray-400 dark:text-slate-500 group-hover:bg-primary group-hover:text-white transition-all">
                                            <span class="material-symbols-outlined">event</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{ dayjs(m.started_at).format('MMMM YYYY') }}</span>
                                            <Link :href="`/months/${m.id}`" class="text-xs font-bold text-gray-400 hover:text-primary dark:text-slate-500 dark:hover:text-primary transition-colors uppercase tracking-wider">
                                                View Statement
                                            </Link>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-between items-center w-full sm:w-auto gap-6 transition-transform group-hover:translate-x-1">
                                        <div v-if="m.payments?.length === 0">
                                            <Form action="/basket" method="post">
                                                <input type="hidden" name="month_id" :value="m.id" />
                                                <button type="submit"
                                                    class="cursor-pointer p-2.5 px-5 rounded-xl bg-gray-100 dark:bg-slate-800 text-gray-900 dark:text-white font-black hover:bg-secondary hover:text-white transition-all flex items-center gap-2 shadow-sm">
                                                    <span class="text-lg font-black tracking-tighter">£{{ (parseInt(m?.fee) / 100).toFixed(0) }}</span>
                                                    <span class="material-symbols-outlined text-lg">add_shopping_cart</span>
                                                </button>
                                            </Form>
                                        </div>
                                        <div v-else-if="m.payments[0].purchased_at === null" 
                                            class="p-2.5 px-5 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-500 font-bold text-sm tracking-wide border border-slate-200 dark:border-slate-700/50">
                                            In Basket
                                        </div>
                                        <div v-else 
                                            class="p-2.5 px-5 rounded-xl bg-blue-50 dark:bg-primary/10 text-primary font-black text-sm uppercase tracking-widest flex items-center gap-2 border border-blue-100 dark:border-primary/20">
                                            <span class="material-symbols-outlined text-lg">check_circle</span>
                                            Paid
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column: Stats & Actions -->
                    <div class="md:col-span-1 space-y-6">
                        <div class="bg-white/80 dark:bg-slate-900/60 backdrop-blur-md rounded-2xl p-8 border border-gray-200 dark:border-white/10 shadow-xl">
                            <h2 class="text-xl font-black text-gray-900 dark:text-white tracking-tight mb-6">Course Progress</h2>
                            
                            <div class="space-y-6">
                                <div class="p-4 bg-background-light dark:bg-slate-800/50 rounded-2xl border border-gray-100 dark:border-white/5">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-xs font-black uppercase tracking-widest text-gray-400 dark:text-slate-500">Active Lessons</span>
                                        <span class="text-primary font-black">---</span>
                                    </div>
                                    <div class="w-full bg-gray-200 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                                        <div class="bg-primary h-full rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                                <div class="text-center p-6 border-2 border-dashed border-gray-200 dark:border-slate-800 rounded-2xl">
                                    <span class="material-symbols-outlined text-4xl text-gray-300 dark:text-slate-700 mb-2">analytics</span>
                                    <p class="text-sm text-gray-500 dark:text-slate-500 italic">Advanced analytics coming soon for future geniuses.</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-linear-to-br from-primary to-blue-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden group">
                            <div class="absolute -right-4 -bottom-4 size-32 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform"></div>
                            <h3 class="text-lg font-black mb-2 relative z-10">Need Help?</h3>
                            <p class="text-white/80 text-sm mb-6 relative z-10 font-medium">Have questions about your lessons or billing?</p>
                            <Link href="/contact" class="inline-flex items-center gap-2 bg-white dark:bg-blue-950 text-primary dark:text-white px-6 py-3 rounded-xl font-black text-sm hover:bg-gray-100 dark:hover:bg-blue-950/20 transition-colors shadow-lg relative z-10">
                                Contact Support
                                <span class="material-symbols-outlined text-sm">mail</span>
                            </Link>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
