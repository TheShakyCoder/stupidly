<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    tutor: Object,
});
</script>

<template>
    <AppLayout :title="tutor.user.name">
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                    Tutor Profile
                </h2>
                <Link :href="route('tutors.index')"
                    class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                    &larr; Back to Tutors
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-[#1a2230] overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative h-48 bg-indigo-600">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?auto=format&fit=crop&q=80&w=2070"
                            class="w-full h-full object-cover mix-blend-overlay" alt="Cover Image">
                        <div class="absolute -bottom-12 left-8">
                            <img :src="tutor.user.profile_photo_url" :alt="tutor.user.name"
                                class="h-32 w-32 rounded-full border-4 border-white object-cover shadow-lg">
                        </div>
                    </div>
                    <div class="pt-16 pb-8 px-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ tutor.user.name }}</h1>
                                <p class="text-xl text-indigo-600 dark:text-indigo-400 font-medium">{{ tutor.title }}
                                </p>
                            </div>
                            <!-- Future: Add 'Book Lesson' button here -->
                        </div>

                        <div class="mt-8 prose dark:prose-invert max-w-none text-gray-600 dark:text-slate-300">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">About {{
                                tutor.user.name }}
                            </h3>
                            <div class="whitespace-pre-line">{{ tutor.bio }}</div>

                            <div v-if="tutor.social_links.length > 0"
                                class="mt-8 border-t border-gray-100 dark:border-slate-800 pt-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Connect</h3>

                                <ul class="flex flex-wrap gap-4">
                                    <li v-for="link in tutor.social_links" :key="link.id">
                                        <template v-if="link.type === 'url'">
                                            <a :href="link.value" target="_blank" class="flex flex-col">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 mr-2 text-gray-400 dark:text-slate-500"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <div>{{ link.name }}</div>
                                                </div>
                                                <div>{{ link.value }}</div>
                                            </a>
                                        </template>
                                        <template v-if="link.type === 'email'">
                                            <a :href="'mailto:' + link.value" target="_blank" class="flex flex-col">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 mr-2 text-gray-400 dark:text-slate-500"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path
                                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                                    <div>{{ link.name }}</div>
                                                </div>
                                                <div>{{ link.value }}</div>
                                            </a>
                                        </template>
                                        <template v-if="link.type === 'phone'">
                                            <a :href="'tel:' + link.value" target="_blank" class="flex flex-col">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 mr-2 text-gray-400 dark:text-slate-500"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                    </svg>
                                                    <div>{{ link.name }}</div>
                                                </div>
                                                <div>{{ link.value }}</div>
                                            </a>
                                        </template>
                                        <template v-if="link.type === 'whatsapp'">
                                            <a :href="'https://wa.me/' + link.value" target="_blank"
                                                class="flex flex-col">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 mr-2 text-gray-400" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <div>{{ link.name }}</div>
                                                </div>
                                                <div>{{ link.value }}</div>
                                            </a>
                                        </template>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>