<script setup>
import { Head } from '@inertiajs/vue3'
import Course from '@/Components/Course.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';

const props = defineProps({
    skills: {
        type: Object,
        default: () => [],
    },
});

const levels = { Beginner: 'text-green-500', Intermediate: 'text-yellow-500', Advanced: 'text-red-500' };

</script>

<template>

    <Head>
        <title>Skills to learn @ StupidlySmart</title>
        <meta name="description" content="Skills to learn @ StupidlySmart">
    </Head>

    <PublicLayout>
        <div class="max-w-4xl mx-auto py-6 md:py-6 lg:py-12 pb-24">
            <div class="flex flex-col gap-8 mb-12">
                <div
                    class="flex flex-col md:flex-row gap-6 items-center bg-surface-light dark:bg-[#1a2230] p-8 rounded-2xl md:rounded-3xl border border-slate-200 dark:border-slate-800 relative overflow-hidden">
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
                                class="flex w-full flex-1 items-center rounded-xl sm:rounded-r-none bg-slate-100 dark:bg-[#243047] h-12 sm:h-full px-4 border border-transparent focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20 transition-all">
                                <span class="material-symbols-outlined text-slate-400">search</span>
                                <input
                                    class="w-full bg-transparent border-none text-slate-900 dark:text-white placeholder:text-slate-400 focus:ring-0 ml-2"
                                    placeholder="Search topics like 'Python' or 'Game'..." type="text" />
                            </div>
                            <button
                                class="h-12 sm:h-full px-8 rounded-xl sm:rounded-l-none bg-primary hover:bg-blue-600 text-white font-bold transition-colors shadow-lg shadow-primary/30">
                                Search
                            </button>
                        </label>
                    </div>
                    <div class="w-full max-w-xl md:w-1/3 aspect-square md:aspect-[4/3] rounded-2xl bg-cover bg-center shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500"
                        data-alt="3D illustration of a friendly robot teaching code"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuANDVwazWeNKB3QtQvb0xW-5plNsM5fGOLt29NuPBEDVK41Q7WMZZ171R8fMpWWbAh8EieAyiz2wwwXPPE0QaVdABNWQfCVv3IFzi0xLuJbDmYnqgUCyOfar0dRI61z2QUdxNCrLBdHXOKNXUIBunpy3eC2pua1-uCDPhvpNrGk5CL95tmXykIleElNaJjC572nB8zespvwCoC-VguPMnEStKKmPUa-oNk5VWYTje1OKJ4MeMxPEQNcbm7Bzxud4W1m9p2L9L8fesY");'>
                    </div>
                </div>

            </div>
            <div v-for="group in props.skills" :key="group.name" class="mb-16">
                <div class="flex items-center gap-4 mb-6">
                    <div class="size-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400">
                        <span class="material-symbols-outlined text-3xl">layers</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">{{ group.name }}</h2>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">Courses grouped by skill.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <Course v-for="course in group.courses" :key="course.id" :course="course"></Course>
                </div>
            </div>

        </div>
    </PublicLayout>
</template>

<style lang="scss" scoped>

</style>
