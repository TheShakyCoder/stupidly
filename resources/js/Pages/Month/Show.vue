<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from 'dayjs';
import advancedFormat from 'dayjs/plugin/advancedFormat' // ES 2015
import { computed } from 'vue';
dayjs.extend(advancedFormat);

const props = defineProps({
    month: {
        type: Object,
        default: () => { }
    }
})


const lessonsByDay = computed(() => {
    if (!props.month?.lessons) return {};

    return props.month.lessons.reduce((acc, lesson) => {
        const date = dayjs(lesson.available_at).format('YYYY-MM-DD');
        if (!acc[date]) {
            acc[date] = [];
        }
        acc[date].push(lesson);
        return acc;
    }, {});
});
</script>

<template>
    <AppLayout :title="`Month View: ${month.started_at}`">
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
                            <div class="text-xl font-bold">{{ lesson.course.title }}</div>
                            <div class="text-lg font-bold">{{ lesson.title }}</div>
                            <div>Skills: {{lesson.course.skills.map(skill => skill.name).join(', ')}}</div>
                            <div class="flex flex-col mt-2">
                                <div class="text-sm">available from</div>
                                <div>{{ dayjs(lesson.available_at).format('ddd Do MMMM, h:mma') }}</div>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-sm">
                        <div class="p-4">
                            <h2 class="text-2xl font-bold mb-4">Lessons Schedule</h2>
                            <div class="space-y-6">
                                <div v-for="(lessons, date) in lessonsByDay" :key="date">
                                    <h3 class="font-bold text-lg border-b pb-2 mb-3">
                                        {{ dayjs(date).format('dddd, D MMMM') }}</h3>
                                    <ul class="space-y-3">
                                        <li v-for="lesson in lessons" :key="lesson.id"
                                            class="flex items-center space-x-3 bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                                            <div
                                                class="size-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold flex-shrink-0">
                                                <svg viewBox="0 0 24 24" class="size-8" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="12" x2="12" y2="8"
                                                        :style="{ transform: `rotate(${(dayjs(lesson.available_at).hour() % 12) * 30 + dayjs(lesson.available_at).minute() * 0.5}deg)`, transformOrigin: '12px 12px' }" />
                                                    <line x1="12" y1="12" x2="12" y2="5"
                                                        :style="{ transform: `rotate(${dayjs(lesson.available_at).minute() * 6}deg)`, transformOrigin: '12px 12px' }" />
                                                </svg>
                                            </div>
                                            <div class="overflow-hidden">
                                                <div class="text-sm font-medium truncate">{{ lesson.course?.title }}
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-300 truncate">{{
                                                    lesson.title }}
                                                </div>
                                            </div>
                                            <!--<div class="ml-auto">-->
                                            <!--    <Link :href="route('lessons.show', lesson.id)"-->
                                            <!--        class="text-blue-600 hover:underline text-sm whitespace-nowrap">-->
                                            <!--        View-->
                                            <!--    </Link>-->
                                            <!--</div>-->
                                        </li>
                                    </ul>
                                </div>
                                <div v-if="Object.keys(lessonsByDay).length === 0"
                                    class="text-gray-500 text-center py-4 text-sm">
                                    No upcoming lessons.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>

<style lang="scss" scoped></style>
