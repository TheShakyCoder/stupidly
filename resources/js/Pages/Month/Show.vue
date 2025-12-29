<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import dayjs from 'dayjs';
import advancedFormat from 'dayjs/plugin/advancedFormat' // ES 2015
dayjs.extend(advancedFormat);

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

        <div class="py-12 max-w-4xl mx-auto">


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="rounded-xl p-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl col-span-2">
                    <h2 class="text-xl tracking-wider uppercase font-bold mb-4">All Lessons</h2>
                    <ul class="flex flex-col space-y-8">
                        <li v-for="lesson in month.lessons" class="flex flex-col">
                            <div class="text-xl font-bold">{{ lesson.course.title }}: {{ lesson.title }}</div>
                            <div>Skills: {{lesson.course.skills.map(skill => skill.name).join(', ')}}</div>
                            <div class="flex flex-col mt-2">
                                <div class="text-sm">available from</div>
                                <div>{{ dayjs(lesson.available_at).format('ddd Do MMMM, h:mma') }}</div>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="rounded-xl p-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                    <h1>...</h1>
                    <ul>
                        <li v-for="recording in month.recordings">
                            {{ recording }}
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </PublicLayout>
</template>

<style lang="scss" scoped></style>
