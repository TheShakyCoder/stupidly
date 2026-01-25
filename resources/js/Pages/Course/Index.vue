<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import Course from '@/Components/Course.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from 'dayjs'

const props = defineProps({
    courses: {
        type: Array,
        default: () => [],
    },
});

const activeFilter = ref('scheduled');
const searchQuery = ref('');

const filteredCourses = computed(() => {
    let courses = props.courses || [];

    // Apply search filter first
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        console.log(query, courses)
        courses = courses.filter(course =>
            course.title.toLowerCase().includes(query)
            || course.description.toLowerCase().includes(query)
            || course.level.toLowerCase().includes(query)
            || course.skills?.some(skill => skill.name.toLowerCase().includes(query))
        );
    }

    // Apply active filter
    if (activeFilter.value === 'all') {
        return courses;
    }

    if (activeFilter.value === 'available') {
        return courses.filter(course => {
            return course.lessons.filter(l => l.available_at < dayjs().format('YYYY-MM-DD HH:mm:ss')).length > 0;
        });
    }

    if (activeFilter.value === 'scheduled') {
        return courses.filter(course => {
            return course.lessons.filter(l => l.available_at > dayjs().format('YYYY-MM-DD HH:mm:ss')).length > 0;
        });
    }

    if (activeFilter.value === 'coming') {
        return courses.filter(course => {
            return course.lessons.length === 0;
        });
    }

    return courses;
});
</script>

<template>

    <Head>
        <title>Courses available @ StupidlySmart</title>
        <meta name="description" content="Courses available @ StupidlySmart">
    </Head>

    <AppLayout>

        <div class="max-w-4xl mx-auto py-6 md:py-6 lg:py-12 pb-24">
            <div class="flex flex-col gap-8 mb-12">
                <div
                    class="flex flex-col md:flex-row gap-6 items-center bg-surface-light dark:bg-[#1a2230] p-8 mx-4 rounded-2xl md:rounded-3xl border border-slate-200 dark:border-slate-800 relative overflow-hidden">
                    <div
                        class="absolute -top-24 -right-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div
                        class="absolute -bottom-24 -left-24 w-64 h-64 bg-green-500/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div class="flex-1 z-10 max-w-xl w-full">
                        <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">Ready to build something <span
                                class="text-primary">epic?</span></h1>
                        <p class="text-slate-600 dark:text-slate-400 text-lg mb-8 max-w-lg">Explore our library of
                            coding adventures designed just for you. From simple blocks to real code.</p>
                        <label class="flex flex-col sm:flex-row w-full max-w-[500px] h-auto sm:h-14 gap-2 sm:gap-0">
                            <div
                                class="flex w-full flex-1 items-center rounded-xl bg-slate-100 dark:bg-[#243047] h-12 sm:h-full px-4 border border-transparent focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20 transition-all">
                                <span class="material-symbols-outlined text-slate-400">search</span>
                                <input v-model="searchQuery"
                                    class="w-full bg-transparent border-none text-slate-900 dark:text-white placeholder:text-slate-400 focus:ring-0 ml-2"
                                    placeholder="Search topics like 'CSS' or 'Game'..." type="text" />
                            </div>

                        </label>
                    </div>
                    <div class="w-full max-w-xl hidden md:inline md:w-1/3 aspect-square md:aspect-[4/3] rounded-2xl bg-cover bg-center shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500"
                        data-alt="3D illustration of a friendly robot teaching code"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuANDVwazWeNKB3QtQvb0xW-5plNsM5fGOLt29NuPBEDVK41Q7WMZZ171R8fMpWWbAh8EieAyiz2wwwXPPE0QaVdABNWQfCVv3IFzi0xLuJbDmYnqgUCyOfar0dRI61z2QUdxNCrLBdHXOKNXUIBunpy3eC2pua1-uCDPhvpNrGk5CL95tmXykIleElNaJjC572nB8zespvwCoC-VguPMnEStKKmPUa-oNk5VWYTje1OKJ4MeMxPEQNcbm7Bzxud4W1m9p2L9L8fesY");'>
                    </div>
                </div>

                <div class="flex items-center gap-3 overflow-x-auto pb-2 no-scrollbar">
                    <button @click="activeFilter = 'all'" :class="[
                        'flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-bold shadow-md shrink-0 transition-all',
                        activeFilter === 'all'
                            ? 'bg-linear-to-r from-green-600 to-blue-500 hover:from-green-500 hover:to-blue-400 text-white shadow-primary/20'
                            : 'bg-surface-light dark:bg-[#243047] text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-[#2f3e5b]'
                    ]">
                        <span class="material-symbols-outlined text-[20px]">apps</span>

                        <span class="hidden sm:inline">All Courses</span>
                    </button>
                    <button @click="activeFilter = 'available'" :class="[
                        'flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-medium transition-all shrink-0',
                        activeFilter === 'available'
                            ? 'bg-linear-to-r from-green-600 to-blue-500 hover:from-green-500 hover:to-blue-400 text-white shadow-md shadow-primary/20'
                            : 'bg-surface-light dark:bg-[#243047] text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-[#2f3e5b]'
                    ]">
                        <span class="material-symbols-outlined text-[20px]">check</span>

                        <span class="hidden sm:inline">Available Now</span>
                    </button>
                    <button @click="activeFilter = 'scheduled'" :class="[
                        'flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-medium transition-all shrink-0',
                        activeFilter === 'scheduled'
                            ? 'bg-linear-to-r from-green-600 to-blue-500 hover:from-green-500 hover:to-blue-400 text-white shadow-md shadow-primary/20'
                            : 'bg-surface-light dark:bg-[#243047] text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-[#2f3e5b]'
                    ]">
                        <span class="material-symbols-outlined text-[20px] fill-1">calendar_check</span>

                        <span class="hidden sm:inline">Scheduled</span>
                    </button>
                    <button @click="activeFilter = 'coming'" :class="[
                        'flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-medium transition-all shrink-0',
                        activeFilter === 'coming'
                            ? 'bg-linear-to-r from-green-600 to-blue-500 hover:from-green-500 hover:to-blue-400 text-white shadow-md shadow-primary/20'
                            : 'bg-surface-light dark:bg-[#243047] text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-[#2f3e5b]'
                    ]">
                        <span class="material-symbols-outlined text-[20px] fill-1">calendar_clock</span>
                        <span class="hidden sm:inline">Coming Soon</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <Course v-for="course in filteredCourses" :key="course.id" :course="course"></Course>
            </div>

        </div>
    </AppLayout>
</template>

<style lang="scss" scoped></style>
