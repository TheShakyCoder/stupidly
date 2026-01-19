<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    tutors: Object,
});
</script>

<template>
    <AppLayout title="Our Tutors">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Our Tutors
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="tutor in tutors.data" :key="tutor.id"
                        class="bg-white overflow-hidden shadow-xl sm:rounded-lg transition duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <img :src="tutor.user.profile_photo_url" :alt="tutor.user.name"
                                    class="h-16 w-16 rounded-full object-cover mr-4 border-2 border-indigo-500">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ tutor.user.name }}</h3>
                                    <p class="text-sm text-indigo-600 font-medium">{{ tutor.headline }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                {{ tutor.bio }}
                            </p>
                            <div class="flex justify-end">
                                <Link :href="route('tutors.show', tutor.id)"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                                    View Profile
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div v-if="tutors.links.length > 3" class="mt-6 flex justify-center">
                    <div class="flex flex-wrap -mb-1">
                        <template v-for="(link, k) in tutors.links" :key="k">
                            <div v-if="link.url === null"
                                class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                v-html="link.label" />
                            <Link v-else
                                class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                :class="{ 'bg-indigo-600 text-white': link.active }" :href="link.url"
                                v-html="link.label" />
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
