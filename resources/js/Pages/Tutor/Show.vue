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
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Tutor Profile
                </h2>
                <Link :href="route('tutors.index')" class="text-sm text-indigo-600 hover:text-indigo-900">
                    &larr; Back to Tutors
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative h-48 bg-indigo-600">
                        <div class="absolute -bottom-12 left-8">
                            <img :src="tutor.user.profile_photo_url" :alt="tutor.user.name"
                                class="h-32 w-32 rounded-full border-4 border-white object-cover shadow-lg">
                        </div>
                    </div>
                    <div class="pt-16 pb-8 px-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">{{ tutor.user.name }}</h1>
                                <p class="text-xl text-indigo-600 font-medium">{{ tutor.headline }}</p>
                            </div>
                            <!-- Future: Add 'Book Lesson' button here -->
                        </div>

                        <div class="mt-8 prose max-w-none text-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">About Me</h3>
                            <div class="whitespace-pre-line">{{ tutor.bio }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
