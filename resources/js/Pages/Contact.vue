<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
    website: '',
});

const submitted = ref(false);

const submit = () => {
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => {
            submitted.value = true;
            form.reset();
        },
    });
};
</script>

<template>
    <AppLayout>
        <div class="bg-background-light dark:bg-background-dark min-h-screen transition-colors duration-300">
            <!-- Header Section -->
            <section
                class="relative w-full max-w-4xl mx-auto px-4 pt-16 pb-12 md:pt-24 md:pb-16 text-center overflow-hidden">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-5 pointer-events-none">
                    <div class="absolute top-0 left-1/4 size-64 bg-primary blur-[120px] rounded-full"></div>
                    <div class="absolute bottom-0 right-1/4 size-64 bg-secondary blur-[120px] rounded-full"></div>
                </div>

                <div class="relative z-10">
                    <h1
                        class="text-slate-900 dark:text-white text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-tight mb-6">
                        Get in <span
                            class="text-transparent bg-clip-text bg-linear-to-r to-blue-500 from-green-500">Touch</span>
                    </h1>
                    <p
                        class="text-slate-500 dark:text-gray-300 text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">
                        Have questions about our coding courses or memberships?
                        Our team is here to help you and your child start their journey.
                    </p>
                </div>
            </section>

            <!-- Main Content Section -->
            <section class="w-full max-w-4xl mx-auto px-4 pb-24">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">

                    <!-- Contact Form Card -->
                    <div class="md:col-span-7 lg:col-span-7">
                        <div
                            class="bg-white dark:bg-[#151b28] border border-slate-200 dark:border-white/10 rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl transition-all h-full">
                            <div class="p-8 md:p-12">
                                <form v-if="!submitted" @submit.prevent="submit" class="space-y-6">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label for="name"
                                                class="text-sm font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider ml-1">Your
                                                Name</label>
                                            <input type="text" id="name" v-model="form.name" required
                                                class="w-full px-5 py-4 rounded-xl bg-slate-50 dark:bg-[#1a2232] border border-slate-200 dark:border-white/5 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all outline-none"
                                                placeholder="Enter name">
                                        </div>
                                        <div class="space-y-2">
                                            <label for="email"
                                                class="text-sm font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider ml-1">Email
                                                Address</label>
                                            <input type="email" id="email" v-model="form.email" required
                                                class="w-full px-5 py-4 rounded-xl bg-slate-50 dark:bg-[#1a2232] border border-slate-200 dark:border-white/5 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all outline-none"
                                                placeholder="Enter email">
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="subject"
                                            class="text-sm font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider ml-1">Subject</label>
                                        <div class="relative">
                                            <select id="subject" v-model="form.subject" required
                                                class="w-full px-5 py-4 rounded-xl bg-slate-50 dark:bg-[#1a2232] border border-slate-200 dark:border-white/5 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all outline-none appearance-none cursor-pointer">
                                                <option value="" disabled>Select a subject</option>
                                                <option value="Curriculum">Curriculum</option>
                                                <option value="Student">Student</option>
                                                <option value="Billing & Payment">Billing & Payment</option>
                                                <option value="Something Else">Something Else</option>
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                                                <span class="material-symbols-outlined">expand_more</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="message"
                                            class="text-sm font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider ml-1">Your
                                            Message</label>
                                        <textarea id="message" v-model="form.message" rows="5" required
                                            class="w-full px-5 py-4 rounded-xl bg-slate-50 dark:bg-[#1a2232] border border-slate-200 dark:border-white/5 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all outline-none resize-none"
                                            placeholder="Write your message here..."></textarea>
                                    </div>

                                    <button type="submit"
                                        class="w-full py-5 bg-linear-to-r from-secondary to-primary hover:from-green-400 hover:to-blue-400 text-white font-black text-xl rounded-2xl shadow-xl shadow-primary/20 transition-all transform hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-3 group">
                                        Send Message
                                        <span
                                            class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
                                    </button>

                                    <!-- Honeypot -->
                                    <div class="hidden">
                                        <label for="website">Website</label>
                                        <input type="text" id="website" v-model="form.website" tabindex="-1"
                                            autocomplete="off">
                                    </div>
                                </form>

                                <div v-else
                                    class="py-12 flex flex-col items-center text-center animate-in fade-in zoom-in duration-500">
                                    <div
                                        class="size-20 bg-green-100 dark:bg-green-500/20 text-green-600 dark:text-green-400 rounded-full flex items-center justify-center mb-6">
                                        <span class="material-symbols-outlined text-5xl">check_circle</span>
                                    </div>
                                    <h2 class="text-3xl font-black text-slate-900 dark:text-white mb-4">Message Sent!
                                    </h2>
                                    <p class="text-slate-500 dark:text-gray-400 text-lg max-w-sm mb-8">
                                        Thank you for reaching out. A developer or tutor from the family will get back
                                        to you shortly.
                                    </p>
                                    <button @click="submitted = false"
                                        class="text-primary font-bold hover:underline">Send another message</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Info Cards -->
                    <div class="md:col-span-5 lg:col-span-5 space-y-6">
                        <!-- Direct Info -->
                        <div
                            class="bg-slate-100 dark:bg-[#1a2232] border border-slate-200 dark:border-white/5 rounded-2xl p-8 shadow-sm">
                            <h3 class="text-xl font-black text-slate-900 dark:text-white mb-6">Contact Info</h3>
                            <div class="space-y-6">
                                <div class="flex gap-4">
                                    <div
                                        class="size-12 bg-white dark:bg-[#243047] rounded-xl flex items-center justify-center text-primary shadow-sm border border-slate-200 dark:border-white/5">
                                        <span class="material-symbols-outlined">mail</span>
                                    </div>
                                    <div>
                                        <div
                                            class="text-xs font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-1">
                                            Email Us</div>
                                        <div class="text-slate-900 dark:text-white font-bold">
                                            support@stupidly.uk
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div
                                        class="size-12 bg-white dark:bg-[#243047] rounded-xl flex items-center justify-center text-secondary shadow-sm border border-slate-200 dark:border-white/5">
                                        <span class="material-symbols-outlined">phone</span>
                                    </div>
                                    <div>
                                        <div
                                            class="text-xs font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-1">
                                            Call / WhatsApp</div>
                                        <div class="text-slate-900 dark:text-white font-bold underline cursor-pointer">
                                            07515 382159</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Redirect -->
                        <div
                            class="bg-linear-to-br from-primary to-blue-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden group">
                            <div
                                class="absolute -right-4 -bottom-4 size-32 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform">
                            </div>
                            <h3 class="text-xl font-black mb-2 relative z-10">Looking for Answers?</h3>
                            <p class="text-white/80 text-sm mb-6 relative z-10 font-medium leading-relaxed">
                                Most questions about billing, lessons, and schedules can be found in the Parent Guide.
                            </p>
                            <Link href="/parent-guide"
                                class="inline-flex items-center gap-2 bg-white dark:bg-blue-950 text-primary dark:text-white px-6 py-3 rounded-xl font-black text-sm hover:bg-gray-100 dark:hover:bg-blue-900 transition-colors shadow-lg relative z-10">
                                Parent Guide
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </Link>
                        </div>

                        <!-- Trust Badge Section -->
                        <div class="grid grid-cols-1 gap-4">
                            <div
                                class="flex items-center gap-3 p-4 bg-white/50 dark:bg-[#1a2232]/50 backdrop-blur-sm rounded-xl border border-dashed border-slate-300 dark:border-white/10 transition-colors hover:border-secondary/50">
                                <div
                                    class="size-8 rounded-lg bg-green-50 dark:bg-green-500/10 flex items-center justify-center text-secondary">
                                    <span class="material-symbols-outlined text-lg">verified</span>
                                </div>
                                <span
                                    class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-tight">Moderated
                                    Environment</span>
                            </div>
                            <div
                                class="flex items-center gap-3 p-4 bg-white/50 dark:bg-[#1a2232]/50 backdrop-blur-sm rounded-xl border border-dashed border-slate-300 dark:border-white/10 transition-colors hover:border-secondary/50">
                                <div
                                    class="size-8 rounded-lg bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined text-lg">encrypted</span>
                                </div>
                                <span
                                    class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-tight">Secure
                                    Data Handling</span>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Custom animations if needed */
.animate-pulse-slow {
    animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {

    0%,
    100% {
        opacity: 0.1;
    }

    50% {
        opacity: 0.2;
    }
}
</style>
