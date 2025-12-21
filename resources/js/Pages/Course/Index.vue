<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';

const props = defineProps({
    courses: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
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
            <div class="flex items-center gap-3 overflow-x-auto pb-2 no-scrollbar">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-primary text-white text-sm font-bold shadow-md shadow-primary/20 shrink-0">
                    <span class="material-symbols-outlined text-[20px]">apps</span>
                    All Topics
                </button>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-surface-light dark:bg-[#243047] text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-[#2f3e5b] text-sm font-medium transition-colors shrink-0">
                    <span class="material-symbols-outlined text-[20px]">new_releases</span>
                    Newest
                </button>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-surface-light dark:bg-[#243047] text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-[#2f3e5b] text-sm font-medium transition-colors shrink-0">
                    <span class="material-symbols-outlined text-[20px] fill-1">favorite</span>
                    Popular
                </button>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-surface-light dark:bg-[#243047] text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-[#2f3e5b] text-sm font-medium transition-colors shrink-0">
                    <span class="material-symbols-outlined text-[20px]">signal_cellular_alt</span>
                    Difficulty
                </button>
            </div>
        </div>
        <div v-for="group in props.courses" :key="group.skill" class="mb-16">
            <div class="flex items-center gap-4 mb-6">
                <div class="size-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400">
                    <span class="material-symbols-outlined text-3xl">layers</span>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">{{ group.skill }}</h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">Courses grouped by skill.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div v-for="course in group.courses" :key="course.id || course.key || course.title"
                    class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10">
                    <div class="aspect-video w-full bg-slate-800 relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                            :style="{ backgroundImage: `url(${course.image || course.thumbnail || course.cover_url || 'https://via.placeholder.com/800x450'})` }"></div>
                        <div
                            class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-3 py-1 rounded-full flex items-center gap-1 border border-white/10">
                            <span class="material-symbols-outlined text-yellow-400 text-sm fill-1">star</span>
                            <span class="text-xs font-bold text-white">{{ course.rating ?? '—' }}</span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-500 text-xs font-bold uppercase tracking-wider">{{ course.level || 'Beginner' }}</span>
                            <span
                                class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">book</span> {{ course.lessons || course.lessons_count || '—' }} Lessons
                            </span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">{{ course.title || course.name }}</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">{{ course.description || '' }}</p>
                        <div class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700/50 flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div v-if="course.avatars && course.avatars[0]"
                                    class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300 bg-cover"
                                    :style="{ backgroundImage: `url(${course.avatars[0]})` }"></div>
                                <div v-else class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300"></div>
                                <div
                                    class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-slate-700 text-[10px] text-white flex items-center justify-center font-bold">
                                    +{{ course.enrolled_count || '1k' }}</div>
                            </div>
                            <button
                                class="bg-primary/10 hover:bg-primary text-primary hover:text-white p-2 rounded-full transition-colors">
                                <span class="material-symbols-outlined block">play_arrow</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </PublicLayout>
</template>

<style lang="scss" scoped>

</style>
