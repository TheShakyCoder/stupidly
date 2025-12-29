<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    month: {
        type: Object,
        default: () => { }
    }
})
</script>

<template>
    <PublicLayout :title="`Month View: ${month.started_at}`">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Month View: {{ month.started_at }}
            </h2>
        </template>

        <div class="py-12">
            <div class=" max-w-4xl mx-auto">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    <div class="rounded-xl p-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl col-span-2">
                        <h1>All Lessons</h1>
                        <ul>
                            <li v-for="lesson in month.lessons">
                                {{ lesson }}
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-xl p-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                        <h1>Recordings</h1>
                    </div>
                </div>

            </div>
        </div>
    </PublicLayout>
</template>

<style lang="scss" scoped></style>
