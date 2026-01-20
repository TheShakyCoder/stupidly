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

const canJoinLesson = (lesson) => {
    if (!lesson.google_meet_link) return false;
    const start = dayjs(lesson.available_at);
    // lesson is available 5 minutes before start
    const fiveMinutesBefore = start.subtract(5, 'minute');
    // and 60 minutes after start
    const sixtyMinutesAfter = start.add(60, 'minute');
    const now = dayjs();

    return now.isAfter(fiveMinutesBefore) && now.isBefore(sixtyMinutesAfter);
}

const isVideoAvailable = (lesson) => {
    const start = dayjs(lesson.available_at);
    const fiveMinutesBefore = start.subtract(5, 'minute');
    return dayjs().isAfter(fiveMinutesBefore);
}
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
                                                <svg viewBox="0 0 24 24" class="size-8" fill="none" role="img"
                                                    :aria-label="dayjs(lesson.available_at).format('h:mma')"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                    <title>{{ dayjs(lesson.available_at).format('h:mma') }}</title>
                                                    <desc>Clock showing {{ dayjs(lesson.available_at).format('h:mma') }}
                                                    </desc>
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="12" x2="12" y2="8"
                                                        :style="{ transform: `rotate(${(dayjs(lesson.available_at).hour() % 12) * 30 + dayjs(lesson.available_at).minute() * 0.5}deg)`, transformOrigin: '12px 12px' }" />
                                                    <line x1="12" y1="12" x2="12" y2="5"
                                                        :style="{ transform: `rotate(${dayjs(lesson.available_at).minute() * 6}deg)`, transformOrigin: '12px 12px' }" />
                                                </svg>
                                            </div>

                                            <div class="flex flex-col">

                                                <div class="overflow-hidden">
                                                    <div class="text-sm font-medium truncate">{{ lesson.course?.title }}
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-300 truncate">
                                                        {{ dayjs(lesson.available_at).format('h:mm a') }} - {{
                                                            lesson.title }}
                                                    </div>
                                                </div>
                                                <div class="ml-auto flex items-center space-x-2">
                                                    <a v-if="canJoinLesson(lesson)" :href="lesson.google_meet_link"
                                                        target="_blank"
                                                        class="text-blue-600 hover:underline text-sm whitespace-nowrap">
                                                        Join Meet
                                                    </a>
                                                    <a v-else-if="$page.props.auth.user?.is_tutor && !lesson.path && !lesson.google_meet_link && dayjs(lesson.available_at).isSame(dayjs(), 'day')"
                                                        :href="route('lessons.google-meet.create', lesson.id)"
                                                        class="bg-linear-to-r from-green-700 to-blue-600 hover:from-green-600 hover:to-blue-500 text-white px-3 py-1 rounded whitespace-nowrap">
                                                        Create Meet
                                                    </a>
                                                    <a v-if="month.is_purchased && lesson.path && isVideoAvailable(lesson)"
                                                        :href="lesson.path" target="_blank"
                                                        class="bg-linear-to-r from-green-700 to-blue-600 hover:from-green-600 hover:to-blue-500 text-white px-3 py-1 rounded whitespace-nowrap flex items-center gap-1">
                                                        <span
                                                            class="material-symbols-outlined text-sm">play_circle</span>
                                                        Watch Video
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div v-if="Object.keys(lessonsByDay).length === 0"
                                    class="text-gray-500 text-center py-4 text-sm">
                                    No upcoming lessons.
                                </div>
                                <p>For any lessons due today, a link to the live stream or pre-recorded video will be
                                    shown 5 minutes before the lesson is due to start.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>

<style lang="scss" scoped></style>
