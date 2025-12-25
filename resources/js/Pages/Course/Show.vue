<script setup>
import dayjs from 'dayjs'
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Link } from '@inertiajs/vue3';
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
    <PublicLayout>
        <div class="max-w-4xl mx-auto py-8">
            <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                <a class="hover:text-primary transition-colors" href="#">Home</a>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
                <a class="hover:text-primary transition-colors" href="#">Courses</a>
                <span class="material-symbols-outlined text-sm">chevron_right</span>
                <span class="text-slate-900 dark:text-white font-medium">Scratch for Beginners</span>
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
                        <div class="flex flex-col sm:flex-row gap-4">
                            <Link href="/register"
                                class="px-8 py-4 rounded-xl bg-primary hover:bg-blue-600 text-white font-bold text-lg shadow-lg shadow-primary/30 hover:shadow-primary/50 transition-all flex items-center justify-center gap-2 group">
                                <span
                                    class="material-symbols-outlined group-hover:-translate-y-0.5 transition-transform">rocket_launch</span>
                                Register
                            </Link>
                            <Link href="/dashboard"
                                class="px-6 py-4 rounded-xl bg-slate-100 dark:bg-[#243047] hover:bg-slate-200 dark:hover:bg-[#2f3e5b] text-slate-700 dark:text-slate-200 font-bold text-lg transition-all flex items-center justify-center gap-2 border border-transparent hover:border-slate-300 dark:hover:border-slate-600">
                                <span class="material-symbols-outlined fill-0">bookmark_border</span>
                                Login
                            </Link>
                        </div>
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
                        <div class="grid sm:grid-cols-2 gap-y-4 gap-x-6">
                            <div class="flex gap-3 items-start">
                                <span
                                    class="material-symbols-outlined text-green-500 shrink-0 mt-0.5">check_circle</span>
                                <span class="text-slate-600 dark:text-slate-300 font-body">Understand how
                                    computer
                                    logic and sequences work</span>
                            </div>
                            <div class="flex gap-3 items-start">
                                <span
                                    class="material-symbols-outlined text-green-500 shrink-0 mt-0.5">check_circle</span>
                                <span class="text-slate-600 dark:text-slate-300 font-body">Create moving
                                    characters
                                    (Sprites) and backgrounds</span>
                            </div>
                            <div class="flex gap-3 items-start">
                                <span
                                    class="material-symbols-outlined text-green-500 shrink-0 mt-0.5">check_circle</span>
                                <span class="text-slate-600 dark:text-slate-300 font-body">Use loops to repeat
                                    actions without extra code</span>
                            </div>
                            <div class="flex gap-3 items-start">
                                <span
                                    class="material-symbols-outlined text-green-500 shrink-0 mt-0.5">check_circle</span>
                                <span class="text-slate-600 dark:text-slate-300 font-body">Handle events like
                                    mouse
                                    clicks and key presses</span>
                            </div>
                            <div class="flex gap-3 items-start">
                                <span
                                    class="material-symbols-outlined text-green-500 shrink-0 mt-0.5">check_circle</span>
                                <span class="text-slate-600 dark:text-slate-300 font-body">Build a scoring
                                    system
                                    using variables</span>
                            </div>
                            <div class="flex gap-3 items-start">
                                <span
                                    class="material-symbols-outlined text-green-500 shrink-0 mt-0.5">check_circle</span>
                                <span class="text-slate-600 dark:text-slate-300 font-body">Publish your game for
                                    friends to play</span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-surface-light dark:bg-[#1a2230] rounded-3xl p-8 border border-slate-200 dark:border-slate-800">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div
                                class="size-10 rounded-xl bg-orange-500/20 text-orange-500 flex items-center justify-center">
                                <span class="material-symbols-outlined">description</span>
                            </div>
                            About this Adventure
                        </h2>
                        <div class="prose dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 font-body">
                            <p class="mb-4">
                                Have you ever wanted to create your own video game? In this course, we use
                                <strong>Scratch</strong>, a visual coding language developed by MIT, to make
                                coding
                                as easy as snapping building blocks together.
                            </p>
                            <p class="mb-4">
                                We start from the very beginning. You'll meet "Scratchy" the cat and learn how
                                to
                                make him talk and move. By the end of the course, you'll have built a fully
                                functional "Space Shooter" game where you pilot a rocket, dodge asteroids, and
                                collect power-ups!
                            </p>
                            <p>
                                This course is perfect for creative minds who love games and want to see how
                                they
                                are made. No previous math or coding knowledge is needed.
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-surface-light dark:bg-[#1a2230] rounded-3xl p-8 border border-slate-200 dark:border-slate-800">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div
                                class="size-10 rounded-xl bg-purple-500/20 text-purple-500 flex items-center justify-center">
                                <span class="material-symbols-outlined">list_alt</span>
                            </div>
                            Mission Log (8 Lessons)
                        </h2>
                        <div class="space-y-4">
                            <div
                                class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-[#243047]/30 border border-primary/30 hover:bg-slate-100 dark:hover:bg-[#243047]/60 transition-colors cursor-pointer group">
                                <div
                                    class="size-10 rounded-full bg-primary/20 text-primary flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                                    01</div>
                                <div class="flex-1">
                                    <h4
                                        class="font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                                        Introduction to Space</h4>
                                    <div class="flex items-center gap-3 mt-1">
                                        <span
                                            class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">play_circle</span>
                                            Video</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">•</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">5 mins</span>
                                    </div>
                                </div>
                                <span
                                    class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">play_circle</span>
                            </div>
                            <div
                                class="flex items-center gap-4 p-4 rounded-2xl border border-slate-100 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-[#243047]/30 transition-all opacity-80 hover:opacity-100 cursor-not-allowed">
                                <div
                                    class="size-10 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold text-sm shrink-0">
                                    02</div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-slate-700 dark:text-slate-300">Designing Your Ship
                                    </h4>
                                    <div class="flex items-center gap-3 mt-1">
                                        <span
                                            class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">videogame_asset</span>
                                            Interactive</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">•</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">15 mins</span>
                                    </div>
                                </div>
                                <span class="material-symbols-outlined text-slate-400">lock</span>
                            </div>
                            <div
                                class="flex items-center gap-4 p-4 rounded-2xl border border-slate-100 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-[#243047]/30 transition-all opacity-80 hover:opacity-100 cursor-not-allowed">
                                <div
                                    class="size-10 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold text-sm shrink-0">
                                    03</div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-slate-700 dark:text-slate-300">Asteroids &amp;
                                        Enemies
                                    </h4>
                                    <div class="flex items-center gap-3 mt-1">
                                        <span
                                            class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">videogame_asset</span>
                                            Interactive</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">•</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">20 mins</span>
                                    </div>
                                </div>
                                <span class="material-symbols-outlined text-slate-400">lock</span>
                            </div>
                            <div
                                class="flex items-center gap-4 p-4 rounded-2xl border border-slate-100 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-[#243047]/30 transition-all opacity-80 hover:opacity-100 cursor-not-allowed">
                                <div
                                    class="size-10 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 flex items-center justify-center font-bold text-sm shrink-0">
                                    04</div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-slate-700 dark:text-slate-300">Pew Pew! Lasers
                                        &amp;
                                        Projectiles</h4>
                                    <div class="flex items-center gap-3 mt-1">
                                        <span
                                            class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1"><span
                                                class="material-symbols-outlined text-[14px]">videogame_asset</span>
                                            Interactive</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">•</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400">25 mins</span>
                                    </div>
                                </div>
                                <span class="material-symbols-outlined text-slate-400">lock</span>
                            </div>
                        </div>
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
                                <span class="font-bold text-slate-900 dark:text-white text-sm">~8 Hours</span>
                            </div>
                            <div
                                class="flex items-center justify-between p-4 border-b border-slate-100 dark:border-slate-700/50">
                                <span
                                    class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm font-medium">
                                    <span class="material-symbols-outlined text-lg">signal_cellular_alt</span>
                                    Level
                                </span>
                                <span class="font-bold text-green-500 text-sm uppercase tracking-wider">Beginner</span>
                            </div>
                            <div
                                class="flex items-center justify-between p-4 border-b border-slate-100 dark:border-slate-700/50">
                                <span
                                    class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm font-medium">
                                    <span class="material-symbols-outlined text-lg">folder_open</span>
                                    Projects
                                </span>
                                <span class="font-bold text-slate-900 dark:text-white text-sm">3 Games</span>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <span
                                    class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm font-medium">
                                    <span class="material-symbols-outlined text-lg">military_tech</span>
                                    XP Reward
                                </span>
                                <span class="font-bold text-yellow-500 text-sm">+500 XP</span>
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
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBi4YYz4tO4l11KGm2_l6etQpEBLIx1AS8xr6oEWeNGakZNYn-gmlrcokPfNblS4wjtjfW37oeTeWFqwQYVEjsuPpMBkuK0h4K6sYG1R34ztcUw7hnQ2GjSOGYlMRoB7CLkI_uXkW3m1IpflL1jtr0eRh7WHtCtvGfYMQTw0fFLVkChukCOy7vw7o3VeAWYGZYNDF9FqlPpHM_B7PLU9c9zRW-re90wFBH9H-usaQtIUlJwidTLafk3Zf7mEY3aH7GY_IOAKDQZ59o");'>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-slate-900 dark:text-white">Sarah Codey</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Game Dev Wizard</p>
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
                        <p class="text-center text-xs text-slate-400 mt-3">30-day money-back guarantee on paid
                            plans.</p>
                    </div>
                </div>
            </div>
            <div
                class="mt-20 py-8 border-t border-slate-200 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500 dark:text-slate-400">
                <p>© 2024 Stupidly Smart. Learning made fun.</p>
                <div class="flex gap-6">
                    <a class="hover:text-primary transition-colors" href="#">Curriculum</a>
                    <a class="hover:text-primary transition-colors" href="#">Parent Guide</a>
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

    </PublicLayout>

</template>

<style lang="scss" scoped></style>
