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
                <div class="text-transparent bg-clip-text bg-linear-to-r to-blue-500 from-green-500">Coding Potential
                </div>
            </h1>
            <div class="text-slate-500 dark:text-gray-300 text-lg md:text-xl font-medium max-w-2xl mx-auto">
                One plan. Three options.
                <div>Monthly access to everything your child needs to master code from home.</div>
            </div>
        </section>
        <section class="w-full max-w-6xl mx-auto px-4 pb-12">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Tier 2: Live Access (Featured) -->
                <div
                    class="flex flex-col justify-self-center lg:justify-self-end max-w-2xl lg:max-w-2/3 bg-white dark:bg-[#1a2232] border border-slate-200 dark:border-border-dark rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow">
                    <div
                        class="absolute top-0 right-0 bg-primary text-white text-[10px] font-black px-3 py-1 uppercase tracking-widest rounded-bl-xl">
                        Most Popular</div>
                    <div class="p-8 flex-grow">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Live Access Pass</h3>
                        <p class="text-slate-500 dark:text-gray-400 text-sm mb-6">The complete experience with live
                            interaction.</p>
                        <div class="flex items-baseline gap-1 mb-6">
                            <span class="text-4xl font-black text-slate-900 dark:text-white">£29</span>
                            <span class="text-slate-500 dark:text-gray-400 font-medium">/month</span>
                        </div>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                                Access to all live sessions
                            </li>
                            <li class="flex items-center gap-2 text-sm text-slate-700 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-lg">verified</span>
                                <b>All recordings for the month permanently available</b>
                            </li>
                            <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                                Live tutor interaction
                            </li>
                        </ul>
                    </div>
                    <div class="p-6 border-t border-slate-100 dark:border-white/5">
                        <Link href="/dashboard"
                            class="block w-full py-4 text-center rounded-xl bg-primary text-white font-black shadow-lg shadow-primary/25 hover:bg-blue-600 transition-all hover:scale-[1.02]">
                            Get Started
                        </Link>
                    </div>
                </div>

                <!-- Tier 3: 1-2-1 Lessons -->
                <div
                    class="flex flex-col justify-self-center lg:justify-self-start max-w-2xl lg:max-w-2/3  bg-white dark:bg-[#1a2232] border border-slate-200 dark:border-border-dark rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow">
                    <div class="p-8 grow">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">1-2-1 Computer Science</h3>
                        <p class="text-slate-500 dark:text-gray-400 text-sm mb-6">2027 UK Curriculum based tuition
                            (including AI)</p>
                        <div class="flex items-baseline gap-1 mb-6">
                            <span class="text-4xl font-black text-slate-900 dark:text-white">£58</span>
                            <span class="text-slate-500 dark:text-gray-400 font-medium">/lesson*</span>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                                Free computer° with remote support
                            </li>
                            <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                                48 week course, guaranteed 3 hours per week minimum
                            </li>
                            <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                                Extra 12 hours as needed.
                            </li>
                            <li class="flex items-center gap-2 text-sm text-slate-600 dark:text-gray-300">
                                <span class="material-symbols-outlined text-green-500 text-lg">check_circle</span>
                                Other programmable devices provided
                            </li>
                        </ul>
                    </div>
                    <div class="p-6 border-t border-slate-100 dark:border-white/5">
                        <Link href="/contact"
                            class="block w-full py-3 text-center rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white font-bold hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                            Enquire Now
                        </Link>
                    </div>
                </div>
            </div>
            <p
                class="mt-4 flex flex-col items-center justify-center text-center gap-1 text-slate-500 dark:text-gray-400 text-xs">
                <small class="text-slate-500 dark:text-gray-400 text-xs">* Minimum 156 hours, £900 pcm x 10
                    months = £57.69 / lesson</small>
                <small class="text-slate-500 dark:text-gray-400 text-xs">° Raspberry Pi + accessories, keyboard,
                    mouse and monitor</small>
            </p>
        </section>
        <section class="w-full max-w-4xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
                <div
                    class="flex flex-col items-center text-center p-6 rounded-lg border border-slate-200 dark:border-border-dark bg-slate-100 dark:bg-[#1a2232] hover:border-primary/50 transition-colors">
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
                    class="flex flex-col items-center text-center p-6 rounded-lg border border-slate-200 dark:border-border-dark bg-slate-100 dark:bg-[#1a2232] hover:border-primary/50 transition-colors">
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
                    class="flex flex-col items-center text-center p-6 rounded-lg border border-slate-200 dark:border-border-dark bg-slate-100 dark:bg-[#1a2232] hover:border-primary/50 transition-colors">
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
