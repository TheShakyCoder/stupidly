<script setup>
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { VMarkdownView } from 'vue3-markdown'

defineProps({
    privacy: String
});
</script>

<template>
    <PublicLayout>

        <Head title="Privacy Policy" />
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            <div class="pt-4">
                <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                    <div
                        class="w-full sm:max-w-4xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                        <VMarkdownView :content="privacy">

                        </VMarkdownView>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
