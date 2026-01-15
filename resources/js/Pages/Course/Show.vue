<script setup>
import dayjs from 'dayjs'
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue'

const props = defineProps({
    course: {
        type: Object,
        default: () => { }
    }
})

const levels = { Beginner: 'text-green-500', Intermediate: 'text-yellow-500', Advanced: 'text-red-500' };
const ratings = (props.course.ratings && props.course.ratings.length) ? (props.course.ratings.reduce((sum, r) => sum + (r.score ?? 0), 0) / props.course.ratings.length).toFixed(1) : '—'
const students = props.course.ratings?.length ?? '-'

const showVideo = ref(false)

const playPreviewVideo = () => {
    showVideo.value = true
}
</script>

<template>
    <AppLayout>
        <div class="max-w-4xl mx-auto py-8">
            <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                <a class="hover:text-primary transition-colors" href="#">Home</a>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
                <a class="hover:text-primary transition-colors" href="#">Courses</a>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
                <span class="text-slate-900 dark:text-white font-medium">{{ course.title }}</span>
            </nav>
            <div
                class="bg-surface-light dark:bg-[#1a2230] rounded-3xl p-8 lg:p-10 border border-slate-200 dark:border-slate-800 mb-10 relative overflow-hidden shadow-sm">
                <div
                    class="absolute -top-32 -right-32 w-80 h-80 bg-primary/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-32 -left-32 w-80 h-80 bg-green-500/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <div class="flex flex-col lg:flex-row gap-10 items-center relative z-10">
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-4 mb-5">
                            <span
                                class="px-3 py-1.5 rounded-lg bg-green-500/10  text-xs font-bold uppercase tracking-wider flex items-center gap-1"
                                :class="levels[course.level]">
                                <span class="material-symbols-outlined text-sm">signal_cellular_alt</span>
                                {{ course.level }}
                            </span>
                            <div class="h-4 w-px bg-slate-300 dark:bg-slate-700"></div>
                            <div class="flex items-center gap-1 text-yellow-400">
                                <span class="material-symbols-outlined text-lg fill-1">star</span>
                                <span class="text-slate-900 dark:text-white font-bold text-sm">{{ ratings }}</span>
                                <span class="text-slate-500 dark:text-slate-400 font-normal text-sm ml-1">({{ students
                                    }}
                                    students)</span>
                            </div>
                            <div class="h-4 w-px bg-slate-300 dark:bg-slate-700 hidden sm:block"></div>
                            <div
                                class="flex items-center gap-1 text-slate-500 dark:text-slate-400 text-sm hidden sm:flex">
                                <span class="material-symbols-outlined text-lg">update</span>
                                <span>Last updated {{ dayjs().format('MMMM YYYY', course.updated_at) }}</span>
                            </div>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-bold mb-5 text-slate-900 dark:text-white leading-tight">
                            {{ course.title }}
                        </h1>
                        <p class="text-slate-600 dark:text-slate-300 text-lg mb-8 leading-relaxed max-w-2xl font-body">
                            {{ course.synopsis }}
                        </p>

                    </div>
                    <div class="w-full lg:w-[450px] shrink-0">
                        <div
                            class="aspect-video rounded-2xl bg-slate-800 overflow-hidden shadow-2xl shadow-black/20 relative group border-4 border-surface-light dark:border-[#243047] transform rotate-2 hover:rotate-0 transition-all duration-500">
                            <div class="absolute inset-0 bg-cover bg-center"
                                :style="`background-image: url(${course.image});`"></div>
                            <div
                                class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition-colors flex items-center justify-center backdrop-blur-[2px] group-hover:backdrop-blur-0">
                                <button @click="playPreviewVideo"
                                    class="size-20 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/40 cursor-pointer shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <span
                                        class="material-symbols-outlined text-white text-5xl fill-1 ml-1">play_arrow</span>
                                </button>
                            </div>
                            <div
                                class="absolute bottom-4 right-4 bg-black/70 backdrop-blur-md px-3 py-1 rounded-lg text-white text-xs font-bold border border-white/10">
                                Preview Course
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 flex flex-col gap-8">
                    <div
                        class="bg-surface-light dark:bg-[#1a2230] rounded-3xl p-8 border border-slate-200 dark:border-slate-800">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div
                                class="size-10 rounded-xl bg-blue-500/20 text-blue-500 flex items-center justify-center">
                                <span class="material-symbols-outlined">school</span>
                            </div>
                            What you will master
                        </h2>
                        <ul class="grid sm:grid-cols-2 gap-y-4 gap-x-6">
                            <li v-for="bullet in course.bullets" class="flex gap-3 items-start">
                                <span
                                    class="material-symbols-outlined text-green-500 shrink-0 mt-0.5">check_circle</span>
                                <span class="text-slate-600 dark:text-slate-300 font-body">{{ bullet.name }}</span>
                            </li>

                        </ul>
                    </div>
                    <div
                        class="bg-surface-light dark:bg-[#1a2230] rounded-3xl p-8 border border-slate-200 dark:border-slate-800">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div
                                class="size-10 rounded-xl bg-orange-500/20 text-orange-500 flex items-center justify-center">
                                <span class="material-symbols-outlined">description</span>
                            </div>
                            About this Course
                        </h2>
                        <div class="prose dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 font-body">
                            {{ course.description }}
                        </div>
                    </div>
                    <div
                        class="bg-surface-light dark:bg-[#1a2230] rounded-3xl p-8 border border-slate-200 dark:border-slate-800">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div
                                class="size-10 rounded-xl bg-purple-500/20 text-purple-500 flex items-center justify-center">
                                <span class="material-symbols-outlined">list_alt</span>
                            </div>
                            {{ course.lessons.length }}{{ course.is_ended ? '' : '+' }} Lessons
                        </h2>
                        <ul class="space-y-4">
                            <li v-for="lesson in course.lessons"
                                class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-[#243047]/30 border border-[#e5e7eb]/30 hover:bg-slate-100 dark:hover:bg-[#243047]/60 transition-colors  group">
                                <div
                                    class="size-10 rounded-full bg-primary/20 text-primary flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                                    01
                                </div>
                                <div class="flex-1">
                                    <h4
                                        class="font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                                        {{ lesson.title }}</h4>

                                    <a v-if="lesson.path" :href="lesson.path"
                                        class="flex items-center gap-3 mt-1 cursor-pointer">
                                        <span
                                            class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">play_circle</span>
                                            Video</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">•</span>
                                        <span
                                            class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">play_circle</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button
                            class="w-full mt-4 py-3 text-sm font-bold text-slate-500 dark:text-slate-400 hover:text-primary transition-colors flex items-center justify-center gap-1">
                            Show all 8 lessons
                            <span class="material-symbols-outlined">expand_more</span>
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <div
                        class="bg-surface-light dark:bg-[#1a2230] rounded-3xl p-6 border border-slate-200 dark:border-slate-800 sticky top-24 shadow-xl shadow-slate-200/50 dark:shadow-none">
                        <h3 class="font-bold text-lg mb-4 text-slate-900 dark:text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">analytics</span>
                            Mission Data
                        </h3>
                        <div
                            class="space-y-0 mb-8 rounded-2xl bg-slate-50 dark:bg-[#161c27] overflow-hidden border border-slate-100 dark:border-slate-700">
                            <div
                                class="flex items-center justify-between p-4 border-b border-slate-100 dark:border-slate-700/50">
                                <span
                                    class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm font-medium">
                                    <span class="material-symbols-outlined text-lg">schedule</span>
                                    Duration
                                </span>
                                <span class="font-bold text-slate-900 dark:text-white text-sm">~1 Hour</span>
                            </div>
                            <div
                                class="flex items-center justify-between p-4 border-b border-slate-100 dark:border-slate-700/50">
                                <span
                                    class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm font-medium">
                                    <span class="material-symbols-outlined text-lg">signal_cellular_alt</span>
                                    Level
                                </span>
                                <span class="font-bold text-sm uppercase tracking-wider"
                                    :class="levels[course.level]">{{ course.level }}</span>
                            </div>

                        </div>

                        <div
                            class="p-4 bg-slate-50 dark:bg-[#243047]/30 rounded-2xl mb-6 border border-transparent hover:border-slate-200 dark:hover:border-slate-600 transition-colors cursor-pointer group">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-xs font-bold text-slate-500 uppercase">Your Instructor</p>
                                <span
                                    class="material-symbols-outlined text-slate-400 text-sm group-hover:text-primary transition-colors">arrow_outward</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="size-12 rounded-full bg-cover bg-center border-2 border-white dark:border-slate-600"
                                    :style="`background-image: url( ${course.user.profile_photo_url} );`">
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-slate-900 dark:text-white">{{ course.user.name }}
                                    </p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ course.user.title }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-xs font-bold text-slate-500 uppercase mb-2">Software Needed</p>
                            <a class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-100 dark:hover:bg-[#243047] transition-colors border border-dashed border-slate-300 dark:border-slate-600"
                                href="#">
                                <div
                                    class="size-8 rounded-lg bg-orange-500 text-white flex items-center justify-center font-bold text-xs">
                                    S</div>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-slate-900 dark:text-white">Scratch</p>
                                    <p class="text-xs text-slate-500">Free • Browser-based</p>
                                </div>
                                <span class="material-symbols-outlined text-slate-400 text-sm">open_in_new</span>
                            </a>
                        </div>
                        <button
                            class="w-full py-4 rounded-xl bg-primary hover:bg-blue-600 text-white font-bold transition-colors shadow-lg shadow-primary/20 flex items-center justify-center gap-2">
                            Enroll Now - Free
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>

                    </div>
                </div>
            </div>
            <div
                class="mt-20 py-8 border-t border-slate-200 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500 dark:text-slate-400">
                <p>© 2024 Stupidly Smart. Learning made fun.</p>
                <div class="flex gap-6">
                    <a class="hover:text-primary transition-colors" href="#">Curriculum</a>
                    <Link class="hover:text-primary transition-colors" href="/parent-guide">Parent Guide</Link>
                    <a class="hover:text-primary transition-colors" href="#">Support</a>
                </div>
            </div>
        </div>

        <!-- Video Modal -->
        <div v-if="showVideo"
            class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            @click.self="showVideo = false">
            <div class="relative w-full max-w-4xl">
                <button @click="showVideo = false"
                    class="absolute -top-12 right-0 text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-3xl">close</span>
                </button>
                <div class="aspect-video rounded-2xl overflow-hidden bg-black">


                    <template v-if="course.preview">
                        <iframe width="100%" height="100%" :src="course.preview" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                        <video :src="course.preview" controls autoplay class="w-full h-full">
                            Your browser does not support the video tag.
                        </video>
                    </template>
                    <div v-else class="w-full h-full flex items-center justify-center text-white/60">
                        <div class="text-center">
                            <span class="material-symbols-outlined text-6xl mb-4">video_not_supported</span>
                            <p>Preview video not available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>

</template>

<style lang="scss" scoped></style>
