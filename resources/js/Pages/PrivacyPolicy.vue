<script setup>
import { defineAsyncComponent, onMounted, ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const VMarkdownView = defineAsyncComponent(() =>
    import('vue3-markdown').then(({ VMarkdownView }) => VMarkdownView),
);

const isClient = ref(false);
onMounted(() => {
    isClient.value = true;
});

defineProps({
    privacy: String
});
</script>

<template>
    <AppLayout>

        <Head title="Privacy Policy" />
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            <div class="pt-4">
                <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                    <div
                        class="w-full sm:max-w-4xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                        <VMarkdownView v-if="isClient" :content="privacy" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
