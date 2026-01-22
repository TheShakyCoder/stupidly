<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from 'vue';
import Hls from 'hls.js';

const props = defineProps({
    src: {
        type: String,
        required: true,
    },
    autoplay: {
        type: Boolean,
        default: false,
    },
    controls: {
        type: Boolean,
        default: true,
    }
});

const video = ref(null);
let hls = null;

const initPlayer = () => {
    if (!video.value) return;

    if (Hls.isSupported()) {
        if (hls) hls.destroy();
        hls = new Hls();
        hls.loadSource(props.src);
        hls.attachMedia(video.value);
        hls.on(Hls.Events.MANIFEST_PARSED, () => {
            if (props.autoplay) video.value.play().catch(e => console.error("Autoplay prevented", e));
        });
    } else if (video.value.canPlayType('application/vnd.apple.mpegurl')) {
        video.value.src = props.src;
        if (props.autoplay) {
            video.value.addEventListener('loadedmetadata', () => {
                video.value.play().catch(e => console.error("Autoplay prevented", e));
            });
        }
    }
};

onMounted(() => {
    initPlayer();
});

watch(() => props.src, () => {
    initPlayer();
});

onBeforeUnmount(() => {
    if (hls) {
        hls.destroy();
    }
});
</script>

<template>
    <video ref="video" :controls="controls" class="w-full h-full rounded-lg shadow-2xl bg-black"></video>
</template>
