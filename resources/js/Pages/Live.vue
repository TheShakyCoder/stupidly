<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';

defineProps({
    liveStreams: Object,
});

const joinLivestream = (liveStream) => {
    document.getElementById('frame').innerHTML = liveStream.assets.iframe;
};
</script>

<template>
    <AppLayout :title="'Live Streams'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Live Streams
            </h2>
        </template>

        <div id="frame" class="my-8">
        </div>

        <div v-if="liveStreams.data.length === 0" class="text-center text-gray-500 my-8">
            No live streams found.
        </div>

        <ul v-else class="my-8">
            <li v-for="liveStream in liveStreams.data" :key="liveStream.liveStreamId"
                class="flex items-center justify-between text-lg bg-gray-800 p-6 rounded-lg shadow hover:shadow-md transition-shadow">
                <div class="font-medium text-gray-100">{{ liveStream.name }}</div>
                <button @click="joinLivestream(liveStream)"
                    class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                    Join Livestream
                </button>
            </li>
        </ul>
    </AppLayout>
</template>