<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import axios from 'axios';

defineProps({
    upcomingLessons: Array,
});

const currentLivestreamUrl = ref(null);
const liveStreamId = ref(null);
const streamKey = ref(null);

const createLivestream = async (lesson) => {
    try {
        console.log('Creating livestream for lesson:', lesson);
        const response = await axios.post('/api/livestream', {
            lesson_id: lesson.id
        });

        // Handle potential double-encoding if backend returns string
        let livestreamData = response.data.livestream;
        if (typeof livestreamData === 'string') {
            try {
                livestreamData = JSON.parse(livestreamData);
            } catch (e) {
                console.error("Could not parse livestream data", e);
            }
        }

        liveStreamId.value = livestreamData.liveStreamId;
        streamKey.value = livestreamData.streamKey;

        if (livestreamData?.assets?.player) {
            currentLivestreamUrl.value = livestreamData.assets.player;
        } else {
            console.error('No player URL found in response', livestreamData);
        }

        // // Create a new WebSocket connection to OBS with the server password
        // const obsSocket = new WebSocket('wss://192.168.0.120:4455', 'Iqfs9kLb4bTqDFRq');
        // // When the connection is established
        // obsSocket.onopen = () => {
        //     console.log('Connected to OBS WebSocket');
        //     // Retrieve the record button element
        // };
        // // When a message is received from OBS
        // obsSocket.onmessage = (event) => {
        //     const message = JSON.parse(event.data);
        //     console.log('Received message from OBS:', message);
        // };
        // // When an error occurs
        // obsSocket.onerror = (error) => {
        //     console.error('OBS WebSocket error:', error);
        // };
        // // When the connection is closed
        // obsSocket.onclose = () => {
        //     console.log('Disconnected from OBS WebSocket');
        // };
    } catch (error) {
        console.error('Failed to create livestream:', error);
    }
};
</script>

<template>
    <AppLayout title="Tutor Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tutor Dashboard - Live Stream Configuration
            </h2>
        </template>

        <div v-if="currentLivestreamUrl" class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="relative aspect-video bg-black rounded-lg overflow-hidden border border-gray-200 shadow-lg">
                <iframe :src="currentLivestreamUrl" width="100%" height="100%" frameborder="0" allowfullscreen
                    scrolling="no"></iframe>
            </div>
            <h2 class="text-xl font-semibold text-gray-100 mt-4">{{ streamKey }}</h2>
        </div>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <ul class="flex flex-col space-y-4">
                    <li v-for="lesson in upcomingLessons" :key="lesson.id"
                        class="flex items-center justify-between text-lg bg-gray-800 p-6 rounded-lg shadow hover:shadow-md transition-shadow">
                        <div class="font-medium text-gray-100">{{ lesson.course.title }} - {{ lesson.title }}</div>
                        <button @click="createLivestream(lesson)"
                            class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                            Create Livestream
                        </button>
                    </li>
                </ul>
                <div v-if="upcomingLessons.length === 0" class="text-center text-gray-500 mt-8">
                    No upcoming lessons found.
                </div>
            </div>
        </div>

    </AppLayout>
</template>
