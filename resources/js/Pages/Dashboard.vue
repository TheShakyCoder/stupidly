<script setup>
import { Form, Link, router, Head } from '@inertiajs/vue3'
import dayjs from 'dayjs';
import AppLayout from '@/Layouts/AppLayout.vue';
import AddToBasketButton from '@/Components/AddToBasketButton.vue';

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

const removePayment = (id) => {
    router.delete('/payments', {
        data: {
            id: id
        },
        preserveScroll: true
    })
}

</script>

<template>

    <Head>
        <title>Dashboard</title>
        <meta name="description" content="Dashboard">
    </Head>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Dashboard
                </h2>
            </div>
        </template>

        <div class="py-12 bg-background-light dark:bg-background-dark min-h-screen transition-colors duration-300">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Left Column: Months -->
                    <div class="md:col-span-2 space-y-8">
                        <!-- Current Month Section -->
                        <div class="relative group">
                            <!-- Background Glow for Dark Mode -->
                            <div
                                class="absolute -inset-1 bg-linear-to-r from-primary/20 to-secondary/20 rounded-2xl blur opacity-0 dark:group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
                            </div>

                            <div
                                class="relative bg-white dark:bg-slate-900/60 backdrop-blur-md overflow-hidden shadow-2xl border border-gray-200 dark:border-white/10 rounded-2xl transition-all">
                                <div class="p-8">
                                    <div class="flex items-center justify-between mb-6">
                                        <h2
                                            class="text-xs uppercase tracking-[0.2em] font-black text-primary dark:text-primary/80">
                                            Current Billing Period</h2>

                                    </div>

                                    <div
                                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                                        <div class="flex flex-col gap-1">
                                            <h3
                                                class="text-3xl font-black text-gray-900 dark:text-white tracking-tight">
                                                {{ dayjs(currentMonth.started_at).format('MMMM YYYY') }}
                                            </h3>

                                            <div class="flex flex-wrap gap-x-5 gap-y-1 mt-1">
                                                <div
                                                    class="flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-slate-400">
                                                    <span
                                                        class="material-symbols-outlined text-lg text-secondary">school</span>
                                                    {{ currentMonth.lessons?.length || 0 }} Lessons
                                                </div>
                                                <div
                                                    class="flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-slate-400">
                                                    <span
                                                        class="material-symbols-outlined text-lg text-accent">videocam</span>
                                                    {{ currentMonth.recordings?.length || 0 }} Recordings
                                                </div>
                                            </div>

                                            <Link :href="`/months/${currentMonth.id}`"
                                                class="inline-flex items-center gap-1.5 text-sm font-bold text-gray-500 hover:text-primary dark:text-slate-400 dark:hover:text-white transition-colors group/link">
                                                View details
                                                <span
                                                    class="material-symbols-outlined text-sm group-hover/link:translate-x-1 transition-transform">arrow_right_alt</span>
                                            </Link>
                                        </div>

                                        <div class="flex items-center gap-4 w-full sm:w-auto">
                                            <div v-if="currentMonth?.payments.length === 0" class="w-full sm:w-auto">
                                                <Form action="/basket" method="post">
                                                    <input v-if="currentMonth" type="hidden" name="month_id"
                                                        :value="currentMonth.id" />

                                                    <AddToBasketButton :fee="currentMonth.fee"
                                                        :is-free="!!$page.props.auth.user.free" />
                                                </Form>
                                            </div>
                                            <div v-else-if="currentMonth?.payments[0].purchased_at === null"
                                                class="w-full sm:w-auto bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 font-black p-4 px-6 rounded-2xl flex items-center justify-center gap-2 border border-slate-200 dark:border-slate-700/50">
                                                <span class="material-symbols-outlined">shopping_basket</span>
                                                In Basket
                                                <button @click="removePayment(currentMonth.payments[0].id)"
                                                    class="text-red-500 hover:text-red-700 transition-colors ml-2">
                                                    <span class="material-symbols-outlined">delete</span>
                                                </button>
                                            </div>
                                            <div v-else
                                                class="w-full sm:w-auto bg-green-50 dark:bg-green-900/10 text-green-500 dark:text-green-400 font-black p-4 px-6 rounded-2xl flex items-center justify-center gap-2 border border-green-100 dark:border-green-700/50">
                                                <span class="material-symbols-outlined">verified</span>
                                                Purchased
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- All Months Section -->
                        <div
                            class="bg-white dark:bg-slate-900/40 backdrop-blur-sm border border-gray-200 dark:border-white/5 rounded-2xl overflow-hidden shadow-sm">
                            <div class="p-8 pb-0">
                                <h2 class="text-xl font-black text-gray-900 dark:text-white tracking-tight">Payment
                                    History</h2>
                                <p class="text-sm text-gray-500 dark:text-slate-500 mt-1 mb-6">Review and manage your
                                    previous
                                    billing cycles.</p>
                            </div>





                            <ul class="divide-y divide-gray-100 dark:divide-white/5">
                                <li v-for="m in months" :key="m.id"
                                    class="group p-6 sm:px-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                                    <div class="flex items-center gap-5">
                                        <div
                                            class="size-12 bg-gray-100 dark:bg-slate-800 rounded-xl flex items-center justify-center text-gray-400 dark:text-slate-500 group-hover:bg-primary group-hover:text-white transition-all">
                                            <span class="material-symbols-outlined">event</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{
                                                dayjs(m.started_at).format('MMMM YYYY') }}</span>

                                            <div class="flex flex-wrap gap-x-5 gap-y-1 mt-1">
                                                <div
                                                    class="flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-slate-400">
                                                    <span
                                                        class="material-symbols-outlined text-lg text-secondary">school</span>
                                                    {{ m.lessons?.length || 0 }} Lessons
                                                </div>
                                                <div
                                                    class="flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-slate-400">
                                                    <span
                                                        class="material-symbols-outlined text-lg text-accent">videocam</span>
                                                    {{ m.recordings?.length || 0 }} Recordings
                                                </div>
                                            </div>

                                            <Link :href="`/months/${m.id}`"
                                                class="inline-flex items-center gap-1.5 text-sm font-bold text-gray-500 hover:text-primary dark:text-slate-400 dark:hover:text-white transition-colors group/link">
                                                View details
                                                <span
                                                    class="material-symbols-outlined text-sm group-hover/link:translate-x-1 transition-transform">arrow_right_alt</span>
                                            </Link>
                                        </div>
                                    </div>

                                    <div
                                        class="flex justify-between items-center w-full sm:w-auto gap-6 transition-transform group-hover:translate-x-1">
                                        <div v-if="m.payments?.length === 0">
                                            <Form action="/basket" method="post">
                                                <input type="hidden" name="month_id" :value="m.id" />
                                                <AddToBasketButton :fee="m.fee"
                                                    :is-free="!!$page.props.auth.user.free" />
                                            </Form>
                                        </div>
                                        <div v-else-if="m.payments[0].purchased_at === null"
                                            class="p-2.5 px-5 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-500 font-bold text-sm tracking-wide border border-slate-200 dark:border-slate-700/50 flex items-center gap-2">
                                            In Basket
                                            <button @click="removePayment(m.payments[0].id)"
                                                class="text-red-500 hover:text-red-700 transition-colors">
                                                <span class="material-symbols-outlined text-sm">delete</span>
                                            </button>
                                        </div>
                                        <div v-else
                                            class="w-full sm:w-auto bg-green-50 dark:bg-green-900/10 text-green-500 dark:text-green-400 font-black p-4 px-6 rounded-2xl flex items-center justify-center gap-2 border border-green-100 dark:border-green-700/50">
                                            <span class="material-symbols-outlined text-lg">check_circle</span>
                                            Purchased
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column: Stats & Actions -->
                    <div class="md:col-span-1 space-y-6">
                        <div
                            class="bg-linear-to-br from-primary to-blue-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden group">
                            <div
                                class="absolute -right-4 -bottom-4 size-32 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform">
                            </div>
                            <h3 class="text-lg font-black mb-2 relative z-10">Need Help?</h3>
                            <p class="text-white/80 text-sm mb-6 relative z-10 font-medium">Have questions about your
                                lessons or
                                billing?</p>
                            <Link href="/contact"
                                class="inline-flex items-center gap-2 bg-white dark:bg-blue-950 text-primary dark:text-white px-6 py-3 rounded-xl font-black text-sm hover:bg-gray-100 dark:hover:bg-blue-950/20 transition-colors shadow-lg relative z-10">
                                Contact Support
                                <span class="material-symbols-outlined text-sm">mail</span>
                            </Link>
                        </div>

                        <button @click="router.post('/logout')"
                            class="flex w-full justify-center bg-white dark:bg-slate-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-700 border border-gray-200 dark:border-slate-600 font-bold py-2 px-4 rounded-xl text-xl transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">logout</span>
                            Log Out
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
