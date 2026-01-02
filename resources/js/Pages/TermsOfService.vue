<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { VMarkdownView } from 'vue3-markdown'

defineProps({
    terms: String,
});
</script>

<template>
    <AppLayout>

        <Head title="Terms of Service" />

        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            <div class="pt-4 bg-gray-100 dark:bg-gray-900">
                <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                    <div
                        class="w-full sm:max-w-4xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                        <VMarkdownView :content="terms">

                        </VMarkdownView>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
