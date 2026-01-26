<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from 'dayjs';
import advancedFormat from 'dayjs/plugin/advancedFormat';
import isoWeek from 'dayjs/plugin/isoWeek';
import DialogModal from '@/Components/DialogModal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

dayjs.extend(advancedFormat);
dayjs.extend(isoWeek);

const props = defineProps({
    month: {
        type: Object,
        default: () => { }
    }
});

const showLessonModal = ref(false);
const selectedLesson = ref(null);

const calendarDays = computed(() => {
    const startOfMonth = dayjs(props.month.started_at).startOf('month');
    const endOfMonth = dayjs(props.month.started_at).endOf('month');

    // Start calendar on the Monday of the week containing startOfMonth
    const startDate = startOfMonth.startOf('isoWeek');
    // End calendar on the Sunday of the week containing endOfMonth
    const endDate = endOfMonth.endOf('isoWeek');

    const days = [];
    let current = startDate;

    while (current.isBefore(endDate) || current.isSame(endDate, 'day')) {
        days.push({
            date: current,
            isCurrentMonth: current.isSame(startOfMonth, 'month'),
            isToday: current.isSame(dayjs(), 'day'),
            lessons: getLessonsForDate(current)
        });
        current = current.add(1, 'day');
    }
    return days;
});

const getLessonsForDate = (date) => {
    if (!props.month.lessons) return [];
    return props.month.lessons.filter(lesson =>
        dayjs(lesson.available_at).isSame(date, 'day')
    );
};

const openLessonModal = (lesson) => {
    selectedLesson.value = lesson;
    showLessonModal.value = true;
};

const closeLessonModal = () => {
    showLessonModal.value = false;
    setTimeout(() => {
        selectedLesson.value = null;
    }, 200);
};

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

const weekDeps = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
</script>

<template>
    <AppLayout :title="`Month View: ${dayjs(month.started_at).format('MMMM YYYY')}`">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Month View: {{ dayjs(month.started_at).format('MMMM YYYY') }}
            </h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Calendar -->
                <div
                    class="lg:col-span-2 bg-white dark:bg-slate-800 overflow-hidden shadow-xl rounded-2xl border border-gray-200 dark:border-slate-700/50">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">{{
                            dayjs(month.started_at).format('MMMM YYYY') }}</h2>

                        <!-- Calendar Header -->
                        <div class="grid grid-cols-7 mb-2">
                            <div v-for="day in weekDeps" :key="day"
                                class="text-center text-xs font-bold text-gray-500 uppercase tracking-wider py-2">
                                {{ day }}
                            </div>
                        </div>

                        <!-- Calendar Grid -->
                        <div
                            class="grid grid-cols-7 gap-px bg-gray-200 dark:bg-slate-700 border border-gray-200 dark:border-slate-700 rounded-lg overflow-hidden">
                            <div v-for="day in calendarDays" :key="day.date.toString()"
                                class="min-h-[120px] bg-white dark:bg-slate-800 p-2 relative group hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors"
                                :class="{ 'bg-gray-50 dark:bg-slate-900/50': !day.isCurrentMonth }">

                                <div class="text-right mb-1">
                                    <span
                                        class="text-sm font-semibold inline-flex items-center justify-center size-7 rounded-full"
                                        :class="{
                                            'bg-blue-600 text-white': day.isToday,
                                            'text-gray-900 dark:text-gray-100': !day.isToday && day.isCurrentMonth,
                                            'text-gray-400 dark:text-slate-500': !day.isCurrentMonth
                                        }">
                                        {{ day.date.date() }}
                                    </span>
                                </div>

                                <div class="space-y-1">
                                    <button v-for="lesson in day.lessons" :key="lesson.id"
                                        @click="openLessonModal(lesson)"
                                        class="w-full text-left text-xs p-1.5 rounded-md bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-900/40 text-blue-700 dark:text-blue-300 font-medium truncate transition-colors border border-blue-100 dark:border-blue-800/30">
                                        {{ dayjs(lesson.available_at).format('HH:mm') }} {{ lesson.title }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: All Lessons -->
                <div class="space-y-8">
                    <div
                        class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl rounded-2xl border border-gray-200 dark:border-slate-700/50 p-6">
                        <h3 class="font-bold text-lg mb-4 text-gray-900 dark:text-white">All Lessons</h3>

                        <div v-if="month.lessons" class="space-y-4">
                            <div v-for="lesson in month.lessons" :key="lesson.id"
                                class="border-b border-gray-100 dark:border-gray-700 pb-2 last:border-0 last:pb-0">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div
                                            class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wide">
                                            {{ dayjs(lesson.available_at).format('ddd, MMM D @ h:mm a') }}
                                        </div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-200 mt-1">
                                            {{ lesson.course.title }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                            {{ lesson.title }}
                                        </div>
                                    </div>
                                    <a v-if="canJoinLesson(lesson) && (month.purchase_tier === 'Live Access' || month.purchase_tier === 'Free' || $page.props.auth.user?.is_tutor)"
                                        :href="lesson.google_meet_link" target="_blank"
                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition shrink-0 ml-2">
                                        Join
                                    </a>
                                    <Link
                                        v-if="(month.is_purchased || $page.props.auth.user?.is_tutor) && lesson.is_video_available && isVideoAvailable(lesson)"
                                        :href="route('lessons.watch', lesson.id)"
                                        class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition">
                                        Watch Video
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-sm text-gray-500 dark:text-gray-400">
                            No lessons scheduled.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lesson Modal -->
        <DialogModal :show="showLessonModal" @close="closeLessonModal">
            <template #title>
                <div v-if="selectedLesson">
                    {{ selectedLesson.title }}
                </div>
            </template>

            <template #content>
                <div v-if="selectedLesson" class="space-y-4">
                    <div>
                        <span class="text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Course</span>
                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{ selectedLesson.course.title
                            }}</div>
                    </div>

                    <div>
                        <span class="text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Time</span>
                        <div class="text-gray-900 dark:text-gray-100">{{
                            dayjs(selectedLesson.available_at).format('dddd, D MMMM YYYY [at] h:mm a') }}</div>
                    </div>

                    <div v-if="selectedLesson.course.skills && selectedLesson.course.skills.length">
                        <span class="text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Skills</span>
                        <div class="flex flex-wrap gap-2 mt-1">
                            <span v-for="skill in selectedLesson.course.skills" :key="skill.id"
                                class="text-xs bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded">
                                {{ skill.name }}
                            </span>
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <div v-if="selectedLesson" class="flex gap-2">
                    <a v-if="canJoinLesson(selectedLesson) && (month.purchase_tier === 'Live Access' || month.purchase_tier === 'Free' || $page.props.auth.user?.is_tutor)"
                        :href="selectedLesson.google_meet_link" target="_blank"
                        class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-25 transition">
                        Join Lesson
                    </a>

                    <a v-else-if="$page.props.auth.user?.is_tutor && !selectedLesson.path && !selectedLesson.google_meet_link && dayjs(selectedLesson.available_at).isSame(dayjs(), 'day')"
                        :href="route('lessons.google-meet.create', selectedLesson.id)"
                        class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition">
                        Create Meet
                    </a>

                    <Link
                        v-if="(month.is_purchased || $page.props.auth.user?.is_tutor) && selectedLesson.is_video_available && isVideoAvailable(selectedLesson)"
                        :href="route('lessons.watch', selectedLesson.id)"
                        class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition">
                        Watch Video
                    </Link>

                    <SecondaryButton @click="closeLessonModal">
                        Close
                    </SecondaryButton>
                </div>
            </template>
        </DialogModal>
    </AppLayout>
</template>
