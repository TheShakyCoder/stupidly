<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    page: String,
});
</script>

<template>
    <AppLayout>
        <div class="container mx-auto">
            <h1>{{ page }}</h1>
        </div>
    </AppLayout>
</template>