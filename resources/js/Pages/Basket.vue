<script setup>
import { Link, Form } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import { ref, computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import PaymentListItems from '@/Components/PaymentListItems.vue';

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

        <div
            class="py-12 px-4 sm:px-6 lg:px-8 bg-background-light dark:bg-background-dark min-h-screen transition-colors duration-300">
            <div class="max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Basket Items Column -->
                    <div class="flex-grow space-y-6">
                        <div class="flex items-center justify-between mb-8">
                            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white flex items-center gap-3">
                                <span
                                    class="material-symbols-outlined text-4xl text-primary animate-pulse-slow">shopping_basket</span>
                                <span class="tracking-tight">Your Basket</span>
                            </h1>
                            <span v-if="payments.length > 0"
                                class="px-3 py-1 bg-gray-100 dark:bg-slate-800 text-gray-500 dark:text-slate-400 font-bold text-xs rounded-full uppercase tracking-wider">
                                {{ payments.length }} {{ payments.length === 1 ? 'item' : 'items' }}
                            </span>
                        </div>

                        <div v-if="payments.length === 0"
                            class="bg-white/50 dark:bg-slate-900/40 backdrop-blur-sm rounded-2xl p-16 flex flex-col items-center justify-center text-center border-2 border-dashed border-gray-200 dark:border-slate-800 transition-all">
                            <div
                                class="size-24 bg-gray-100 dark:bg-slate-800/50 rounded-full flex items-center justify-center mb-8 shadow-inner">
                                <span
                                    class="material-symbols-outlined text-6xl text-gray-300 dark:text-slate-600">shopping_cart_off</span>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-3">Your basket is empty</h2>
                            <p class="text-gray-500 dark:text-slate-400 mb-8 max-w-xs text-lg">
                                Ready to start your learning journey? Add some courses to see them here!
                            </p>
                            <Link href="/courses"
                                class="inline-flex items-center px-8 py-4 bg-primary hover:bg-blue-600 text-white font-black rounded-full transition-all shadow-lg hover:shadow-blue-500/40 transform hover:-translate-y-0.5">
                                Explore Courses
                            </Link>
                        </div>

                        <PaymentListItems v-else :payments="payments" />

                    </div>

                    <!-- Summary Column -->
                    <div class="w-full md:w-72 lg:w-80 shrink-0">
                        <div class="sticky top-24 space-y-6">
                            <div class="relative group">
                                <!-- Background Glow for Dark Mode -->
                                <div
                                    class="absolute -inset-1 bg-linear-to-r from-primary to-secondary rounded-2xl blur opacity-0 dark:group-hover:opacity-20 transition duration-1000 group-hover:duration-200">
                                </div>

                                <div
                                    class="relative bg-white dark:bg-slate-900/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200 dark:border-white/10 overflow-hidden transition-all">
                                    <div class="p-6 border-b border-gray-100 dark:border-white/5">
                                        <h2 class="text-xl font-black text-gray-900 dark:text-white tracking-tight">
                                            Order Summary</h2>
                                    </div>
                                    <div class="p-6 space-y-5">
                                        <div class="flex justify-between text-gray-600 dark:text-slate-400 font-medium">
                                            <span>Subtotal</span>
                                            <span class="font-bold text-gray-900 dark:text-white">£{{
                                                (payments.reduce((total, payment) => total + payment.month.fee, 0) /
                                                    100).toFixed(0)}}</span>
                                        </div>
                                        <div class="flex justify-between text-gray-600 dark:text-slate-400 font-medium">
                                            <span>Processing Fee</span>
                                            <span
                                                class="text-secondary font-black uppercase text-xs tracking-widest">Free</span>
                                        </div>

                                        <div
                                            class="pt-6 border-t border-gray-100 dark:border-white/5 flex justify-between items-end">
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-xs uppercase tracking-widest font-black text-gray-400 dark:text-slate-500 mb-1">Total
                                                    Due</span>
                                                <div
                                                    class="text-gray-900 dark:text-white font-black text-lg leading-none">
                                                    Standard Billing</div>
                                            </div>
                                            <div
                                                class="text-4xl font-black text-gray-900 dark:text-white tracking-tighter">
                                                £{{(payments.reduce((total, payment) => total + payment.month.fee, 0) /
                                                    100).toFixed(0)}}
                                            </div>
                                        </div>

                                        <button type="button"
                                            class="w-full mt-6 py-4 px-6 rounded-2xl text-white text-xl font-black transition-all flex items-center justify-center gap-2 group/btn relative overflow-hidden active:scale-95 shadow-xl hover:shadow-primary/30"
                                            :class="[checkingOut || !canCheckout ? 'bg-gray-300 dark:bg-slate-800 text-gray-500 dark:text-slate-600 cursor-not-allowed' : 'bg-linear-to-r from-green-600 to-blue-600 cursor-pointer']"
                                            @click="startCheckout" :disabled="checkingOut || !canCheckout">
                                            <div
                                                class="absolute inset-0 bg-white/20 opacity-0 group-hover/btn:opacity-100 transition-opacity">
                                            </div>
                                            <template v-if="checkingOut">
                                                <span class="material-symbols-outlined animate-spin">refresh</span>
                                                Processing...
                                            </template>
                                            <template v-else>
                                                <span>Go to Payment</span>
                                                <span
                                                    class="material-symbols-outlined group-hover/btn:translate-x-1.5 transition-transform duration-300">double_arrow</span>
                                            </template>
                                        </button>

                                        <div
                                            class="flex items-center justify-center gap-2 text-[10px] text-gray-400 dark:text-slate-500 uppercase tracking-[0.2em] font-black mt-6">
                                            <span
                                                class="material-symbols-outlined text-sm text-secondary">encrypted</span>
                                            Secure Payments by Stripe
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-blue-50/50 dark:bg-blue-900/20 rounded-2xl p-6 border border-blue-100 dark:border-blue-900/20 backdrop-blur-sm">
                                <p class="text-sm text-blue-900/70 dark:text-blue-200/60 leading-relaxed font-medium">
                                    <span class="material-symbols-outlined text-sm align-middle mr-1">info</span>
                                    Payments for <strong
                                        class="text-blue-900 dark:text-blue-200 font-black">StupidlySmart</strong> are
                                    managed by
                                    <strong class="text-blue-900 dark:text-blue-200 font-black">Fig Limited</strong>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
