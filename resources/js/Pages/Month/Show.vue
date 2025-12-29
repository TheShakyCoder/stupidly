<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    month: {
        type: Object,
        default: () => { }
    }
})
</script>

<template>
    <AppLayout :title="`Month View: ${month.started_at}`">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Month View: {{ month.started_at }}
            </h2>
        </template>
    </AppLayout>
</template>

<style lang="scss" scoped></style>
