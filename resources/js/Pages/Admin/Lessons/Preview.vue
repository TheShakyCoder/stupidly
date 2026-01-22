<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { Link } from '@inertiajs/vue3';
import Hls from 'hls.js';

const props = defineProps({
    lesson: Object,
    playlistUrl: String,
});

const video = ref(null);
let hls = null;

onMounted(() => {
    if (Hls.isSupported()) {
        hls = new Hls();
        hls.loadSource(props.playlistUrl);
        hls.attachMedia(video.value);
    } else if (video.value.canPlayType('application/vnd.apple.mpegurl')) {
        video.value.src = props.playlistUrl;
    }
});

onBeforeUnmount(() => {
    if (hls) {
        hls.destroy();
    }
});
</script>

<template>
    <div class="fixed inset-0 bg-black flex flex-col items-center justify-center z-50">
        <div class="absolute top-4 right-4 z-50">
            <Link :href="route('admin.lessons.index')"
                class="text-white hover:text-gray-300 bg-gray-800/50 rounded-full p-2 transition-colors">
                <span class="material-symbols-outlined text-4xl">close</span>
            </Link>
        </div>

        <div class="w-full h-full max-w-7xl max-h-screen flex items-center justify-center p-4">
            <video ref="video" controls class="w-full max-h-full rounded-lg shadow-2xl bg-black" autoplay></video>
        </div>

        <div class="absolute bottom-12 left-12 text-white bg-black/50 p-4 rounded-lg backdrop-blur-sm">
            <h1 class="text-2xl font-bold">{{ lesson.title }}</h1>
            <p class="text-gray-300 mt-1">{{ lesson.course?.title || 'Unknown Course' }}</p>
        </div>
    </div>
</template>
