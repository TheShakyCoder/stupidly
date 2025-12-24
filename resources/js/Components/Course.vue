<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    course: {
        type: Object,
        default: () => ({}),
    }
});

const levels = { Beginner: 'text-green-500', Intermediate: 'text-yellow-500', Advanced: 'text-red-500' };
</script>

<template>
    <div class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10">
        <div class="aspect-video w-full bg-slate-800 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                :style="{ backgroundImage: `url(${course.image || course.thumbnail || course.cover_url || course.image})` }"></div>
            <div
                class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-3 py-1 rounded-full flex items-center gap-1 border border-white/10">
                <span class="material-symbols-outlined text-yellow-400 text-sm fill-1">star</span>
                <span class="text-xs font-bold text-white">{{ (course.ratings && course.ratings.length) ? (course.ratings.reduce((sum, r) => sum + (r.score ?? 0), 0) / course.ratings.length).toFixed(1) : '—' }}</span>
            </div>
        </div>
        <div class="p-5 flex flex-col flex-1">
            <div class="flex items-center gap-2 mb-3">
                <span
                    class="px-2.5 py-1 rounded-md bg-green-500/10 text-xs font-bold uppercase tracking-wider"
                    :class="levels[course.level]">{{ course.level }}</span>
                <span
                    class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-xs">book</span> {{ course.lessons.length || '—' }} Lessons
                </span>
            </div>
            <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">{{ course.title || course.name }}</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">{{ course.description || '' }}</p>
            <div class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700/50 flex items-center justify-between">
                <div class="flex -space-x-2">
                    <!--<div v-if="course.avatars && course.avatars[0]"
                        class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300 bg-cover"
                        :style="{ backgroundImage: `url(${course.avatars[0]})` }"></div>
                    <div v-else class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300"></div>
                    <div
                        class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-slate-700 text-[10px] text-white flex items-center justify-center font-bold">
                        +{{ course.enrolled_count || '1k' }}</div>-->
                </div>
                <Link :href="`/courses/{{ course.id }}`"
                    class="bg-primary/10 hover:bg-primary text-primary hover:text-white p-2 rounded-full transition-colors">
                    <span class="material-symbols-outlined block">play_arrow</span>
                </Link>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

</style>
