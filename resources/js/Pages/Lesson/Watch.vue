<script setup>
import { Link } from '@inertiajs/vue3';
import VideoPlayer from '@/Components/VideoPlayer.vue';

const props = defineProps({
    lesson: Object,
    playlistUrl: String,
});

const goBack = () => {
    window.history.back();
};
</script>

<template>
    <div class="fixed inset-0 bg-black flex flex-col items-center justify-center z-50">
        <div class="absolute top-4 right-4 z-50">
            <!-- Navigate back to history or dashboard/month view -->
            <button @click="goBack"
                class="text-white hover:text-gray-300 bg-gray-800/50 rounded-full p-2 transition-colors">
                <span class="material-symbols-outlined text-4xl">close</span>
            </button>
        </div>

        <div class="w-full h-full max-w-7xl max-h-screen flex items-center justify-center p-4">
            <VideoPlayer :src="playlistUrl" autoplay />
        </div>

        <div class="absolute bottom-12 left-12 text-white bg-black/50 p-4 rounded-lg backdrop-blur-sm">
            <h1 class="text-2xl font-bold">{{ lesson.title }}</h1>
            <p class="text-gray-300 mt-1">{{ lesson.course?.title || 'Unknown Course' }}</p>
        </div>
    </div>
</template>
