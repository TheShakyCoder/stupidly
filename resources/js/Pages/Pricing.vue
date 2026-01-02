<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <AppLayout>

        <section class="w-full max-w-4xl mx-auto px-4 pt-12 pb-6 md:pt-20 md:pb-10 text-center">
            <h1
                class="text-slate-900 dark:text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-[-0.033em] mb-4">
                Unlock Your Child's
                <div class="text-transparent bg-clip-text bg-linear-to-r from-secondary to-primary">Coding Potential
                </div>
            </h1>
            <p class="text-slate-500 dark:text-text-secondary text-lg md:text-xl font-medium max-w-2xl mx-auto">
                One simple plan.
            <div>Unlimited monthly access to everything your child needs to master code from home.</div>
            </p>
        </section>
        <section class="w-full max-w-4xl mx-auto px-4 pb-12">
            <div
                class="relative flex flex-col md:flex-row bg-white dark:bg-surface-dark border border-slate-200 dark:border-border-dark rounded-xl md:rounded-lg overflow-hidden shadow-2xl shadow-black/20">
                <div
                    class="flex-1 p-8 md:p-12 flex flex-col justify-center relative overflow-hidden bg-slate-50 dark:bg-[#151b28]">
                    <div class="absolute inset-0 opacity-10 pointer-events-none"
                        style="background-image: radial-gradient(#344465 1px, transparent 1px); background-size: 24px 24px;">
                    </div>
                    <div class="relative z-10">
                        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-4">The
                            All-Access Pass</h2>
                        <p class="text-slate-500 dark:text-text-secondary mb-8 leading-relaxed">
                            Stop paying per course. Get instant access to our entire library of kid-friendly
                            Lua, JavaScript, and HTML lessons, plus live sessions with expert
                            tutors.
                        </p>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center size-6 rounded-full bg-primary/20 text-primary">
                                    <span class="material-symbols-outlined text-[16px]">videocam</span>
                                </span>
                                <span class="text-slate-700 dark:text-gray-200 font-medium">Multiple Live Coding
                                    Sessions each week</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center size-6 rounded-full bg-primary/20 text-primary">
                                    <span class="material-symbols-outlined text-[16px]">library_books</span>
                                </span>
                                <span class="text-slate-700 dark:text-gray-200 font-medium">Hours of
                                    Recorded Lessons</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center size-6 rounded-full bg-primary/20 text-primary">
                                    <span class="material-symbols-outlined text-[16px]">school</span>
                                </span>
                                <span class="text-slate-700 dark:text-gray-200 font-medium">Home-Ed Friendly
                                    Schedule</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center size-6 rounded-full bg-primary/20 text-primary">
                                    <span class="material-symbols-outlined text-[16px]">groups</span>
                                </span>
                                <span class="text-slate-700 dark:text-gray-200 font-medium">Safe Community
                                    Access</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full md:w-[380px] bg-slate-100 dark:bg-[#1a2232] border-t md:border-t-0 md:border-l border-slate-200 dark:border-border-dark p-8 md:p-12 flex flex-col justify-center items-center text-center relative">
                    <div class="absolute top-0 right-0 p-4 opacity-50">
                        <svg fill="none" height="100" viewBox="0 0 100 100" width="100"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="80" cy="20" r="40" stroke="#195de6" stroke-dasharray="4 4" stroke-width="2">
                            </circle>
                        </svg>
                    </div>
                    <h3
                        class="text-slate-500 dark:text-text-secondary text-sm font-semibold uppercase tracking-widest mb-2">
                        Monthly Access</h3>
                    <div class="flex items-baseline justify-center gap-1 mb-2">
                        <span
                            class="text-5xl md:text-6xl font-black text-slate-900 dark:text-white tracking-tight">£29</span>
                        <span class="text-lg text-slate-500 dark:text-text-secondary font-medium">/mo</span>
                    </div>
                    <p class="text-sm text-accent-green font-medium mb-8 bg-accent-green/10 px-3 py-1 rounded-full">
                        Pay monthly. No lock-in.
                    </p>
                    <Link href="/dashboard"
                        class="w-full bg-primary hover:bg-blue-600 text-white font-bold text-lg h-14 rounded-full shadow-xl shadow-primary/25 transition-all transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2 group">
                        Start Learning Now
                        <span
                            class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </Link>
                    <div class="mt-6 flex flex-col gap-2 text-xs text-slate-400 dark:text-[#6b7c93]">
                        <div class="flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">lock</span>
                            Secure payment via Stripe
                        </div>
                        <div class="flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">verified</span>
                            14-day money-back guarantee
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full max-w-4xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
                <div
                    class="flex flex-col items-center text-center p-6 rounded-lg border border-slate-200 dark:border-border-dark bg-white dark:bg-surface-dark hover:border-primary/50 transition-colors">
                    <div
                        class="size-12 rounded-full bg-slate-100 dark:bg-[#243047] flex items-center justify-center text-slate-900 dark:text-white mb-4">
                        <span class="material-symbols-outlined">calendar_month</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">No Tie-in</h3>
                    <p class="text-sm text-slate-500 dark:text-text-secondary">
                        Life changes, and that's okay. Only pay for the months you want.
                    </p>
                </div>
                <div
                    class="flex flex-col items-center text-center p-6 rounded-lg border border-slate-200 dark:border-border-dark bg-white dark:bg-surface-dark hover:border-primary/50 transition-colors">
                    <div
                        class="size-12 rounded-full bg-slate-100 dark:bg-[#243047] flex items-center justify-center text-slate-900 dark:text-white mb-4">
                        <span class="material-symbols-outlined">shield</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">Secure Platform</h3>
                    <p class="text-sm text-slate-500 dark:text-text-secondary">
                        Built for kids. No ads, no external tracking, and fully moderated community spaces.
                    </p>
                </div>
                <div
                    class="flex flex-col items-center text-center p-6 rounded-lg border border-slate-200 dark:border-border-dark bg-white dark:bg-surface-dark hover:border-primary/50 transition-colors">
                    <div
                        class="size-12 rounded-full bg-slate-100 dark:bg-[#243047] flex items-center justify-center text-slate-900 dark:text-white mb-4">
                        <span class="material-symbols-outlined">diversity_1</span>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">Safe Community</h3>
                    <p class="text-sm text-slate-500 dark:text-text-secondary">
                        Active moderation, strict safety features, and a supportive atmosphere ensure a positive
                        learning environment.
                    </p>
                </div>
            </div>
        </section>


    </AppLayout>
</template>

<style lang="scss" scoped></style>
