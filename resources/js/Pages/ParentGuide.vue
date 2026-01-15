<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const faqs = [
    {
        question: "Why should my child learn to code?",
        answer: "Coding fosters critical thinking, problem-solving, and creativity. In today's digital world, understanding how technology works is a superpower that opens doors to future careers in every industry, not just tech."
    },
    {
        question: "Is this environment safe for my child?",
        answer: "Absolutely. Safety is our top priority. We provide a moderated environment where interactions are monitored to ensure a positive and secure learning space for all students. All our tutors are DBS checked."
    },
    {
        question: "What equipment do we need?",
        answer: "A standard computer or laptop (Windows, Mac, or Linux) with a stable internet connection is all you need. iPads and tablets are not recommended for the best coding experience but can be used to view the lessons."
    },
    {
        question: "What support is available if my child gets stuck?",
        answer: "Our dedicated tutors are available to help. Students can ask questions directly through our platform and get personalized support to overcome challenges."
    },
    {
        question: "Do I need to check their work?",
        answer: "While we encourage parents to be involved, our curriculum is designed to be self-guided with built-in checks and tutor support, so you don't need to be a coding expert to help your child succeed."
    }
];
</script>

<template>

    <Head title="Parent Guide" />

    <AppLayout>
        <div class="bg-background-light dark:bg-background-dark min-h-screen transition-colors duration-300">
            <!-- Hero Section -->
            <section class="relative w-full py-20 px-4 text-center overflow-hidden">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-5 pointer-events-none">
                    <div class="absolute top-0 right-1/4 size-64 bg-primary blur-[120px] rounded-full"></div>
                    <div class="absolute bottom-0 left-1/4 size-64 bg-secondary blur-[120px] rounded-full"></div>
                </div>

                <div class="relative z-10 max-w-4xl mx-auto">
                    <h1
                        class="text-slate-900 dark:text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-tight mb-6">
                        Parent <span
                            class="text-transparent bg-clip-text bg-linear-to-r to-blue-500 from-green-500">Guide</span>
                    </h1>
                    <p
                        class="text-slate-500 dark:text-gray-300 text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">
                        Answers to the most common questions concerning your child's education and safety.
                    </p>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="w-full max-w-3xl mx-auto px-4 pb-24">
                <div class="grid gap-6">
                    <div v-for="(faq, index) in faqs" :key="index"
                        class="bg-white dark:bg-[#151b28] border border-slate-200 dark:border-white/10 rounded-2xl p-8 shadow-sm hover:shadow-md transition-all">
                        <h3 class="text-xl font-black text-slate-900 dark:text-white mb-3">
                            {{ faq.question }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ faq.answer }}
                        </p>
                    </div>
                </div>

                <!-- CTA -->
                <div class="mt-16 text-center">
                    <p class="text-slate-500 dark:text-gray-400 mb-6 font-medium">Still have questions?</p>
                    <a href="/contact"
                        class="inline-flex items-center gap-2 bg-slate-100 dark:bg-[#1a2232] text-slate-900 dark:text-white px-6 py-3 rounded-xl font-bold hover:bg-slate-200 dark:hover:bg-[#243047] transition-colors">
                        Contact Support
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
