<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    courses: Object,
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
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6">
                <div class="size-12 rounded-2xl bg-purple-500/20 flex items-center justify-center text-purple-400">
                    <span class="material-symbols-outlined text-3xl">sports_esports</span>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Game Design</h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">Create your own worlds and characters.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div
                    class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10">
                    <div class="aspect-video w-full bg-slate-800 relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                            data-alt="Colorful Scratch interface blocks"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDwQLNLpfHcLF89vRYWen_f5QVzW2n25K5YDIXVMd3yjoVvWPjyOVBlg5NSrE5Su-BbNlexm3nW5qiSLjF_u-vZhCE50aCftleK_fgpcO-GJTtIyjpANyfTybhIaCt1elUJ4XyYIlTc9njnSk3ziJfqCsO-Ubh8NnyJhmwNbUCODiZpux3YYjj9Qi-AJ3cUZBuhKhRf2jYdFAxaVbGzPlvQykuE_1ovRPdfyajeMamkoQUfo8_5kw8xQnE-mqgJkwUNwC66fsFNt2Y");'>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-3 py-1 rounded-full flex items-center gap-1 border border-white/10">
                            <span class="material-symbols-outlined text-yellow-400 text-sm fill-1">star</span>
                            <span class="text-xs font-bold text-white">4.9</span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-500 text-xs font-bold uppercase tracking-wider">Beginner</span>
                            <span
                                class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">book</span> 8 Lessons
                            </span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Scratch
                            for Beginners</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">Learn the basics
                            of block coding by building a space shooter game.</p>
                        <div
                            class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700/50 flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300 bg-cover"
                                    data-alt="Avatar 1"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBi4YYz4tO4l11KGm2_l6etQpEBLIx1AS8xr6oEWeNGakZNYn-gmlrcokPfNblS4wjtjfW37oeTeWFqwQYVEjsuPpMBkuK0h4K6sYG1R34ztcUw7hnQ2GjSOGYlMRoB7CLkI_uXkW3m1IpflL1jtr0eRh7WHtCtvGfYMQTw0fFLVkChukCOy7vw7o3VeAWYGZYNDF9FqlPpHM_B7PLU9c9zRW-re90wFBH9H-usaQtIUlJwidTLafk3Zf7mEY3aH7GY_IOAKDQZ59o")'>
                                </div>
                                <div class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300 bg-cover"
                                    data-alt="Avatar 2"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC3N6kebxUMFyQT7bd4IuYRi9tLoFXquPmt62mqkKZmMqBE3Ya6gpFtEg5aNcpgpBS5cE5T4gFJxfTK_638vI7I--f8EjHpohvq5ESx31qgtdNhXqZMy8grxv2QEo1ISolBcYa5-xpz4s5VIBJQUCCK-VgIP6lv3DoMutmS2_zqdDFXmtZU1qIMmWGc0pkXYq2uXlx_vOlGP1sbFIF8hg3VQenxq3fnGrxC5fpk9OEbMVhgNn-TTfyC1DHrDQHHDsD0TR8fttyGmmQ")'>
                                </div>
                                <div
                                    class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-slate-700 text-[10px] text-white flex items-center justify-center font-bold">
                                    +12k</div>
                            </div>
                            <button
                                class="bg-primary/10 hover:bg-primary text-primary hover:text-white p-2 rounded-full transition-colors">
                                <span class="material-symbols-outlined block">play_arrow</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10">
                    <div class="aspect-video w-full bg-slate-800 relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                            data-alt="Unity game engine interface screenshot"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCFaScGVwriQMY9UikcGejloYS2EuGUT1gKDOWuKCEtM1r9JXo08Bdr4WNww6QlWlLybOvOlCGf0WlE_EOZTHGp53uRqCQfhkBWJhH9beXtLmYam14YPNbCSdWHdUTuZoHgGkRzFmlbyW4q51WUwEyYQpWxd0lpoTArYkzQQUD84tFqfxGr795QOmYY0UC1q7MVx6YR_k28FPcBuDBDi7aInLrhX4vJCyuqQkGyLUCfxx_XJ9LlEoiiJGdIJ_zGMU4uWSHb74gJ1MI");'>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-3 py-1 rounded-full flex items-center gap-1 border border-white/10">
                            <span class="material-symbols-outlined text-yellow-400 text-sm fill-1">star</span>
                            <span class="text-xs font-bold text-white">4.7</span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="px-2.5 py-1 rounded-md bg-yellow-500/10 text-yellow-500 text-xs font-bold uppercase tracking-wider">Intermediate</span>
                            <span
                                class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">book</span> 15 Lessons
                            </span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Unity 2D
                            Basics</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">Jump into real
                            game development with C# and Unity engine basics.</p>
                        <div class="mt-auto">
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-slate-500">Progress</span>
                                <span class="text-primary">45%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-primary rounded-full w-[45%]"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10">
                    <div class="aspect-video w-full bg-slate-800 relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                            data-alt="Pixel art character sprite sheet"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCPvnixUi36fTmz80bsCFFvbW1FvpiWo66NebKxNN8kueOnM3-wOJ_703wOE0pONlilR6P3Lxoy2ddjE2LEXOnXHyiW0fKCUkcJuVSdvFIArTFaPSQCk2xAUJMA31tf6-UebVq46-t0lT3F-TJ-ffsJwbbq9mfPOsR3JHLMUx6kGWjlGZ3HscWejjvRvzgmWuwTm5rI0KeNY_vh4RF2k8aGRAX27KM9MSPjdRooN-oMxHMsxd8rX60oyeamvhwmiq4C6vm7N_XboHo");'>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-500 text-xs font-bold uppercase tracking-wider">Beginner</span>
                            <span
                                class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">book</span> 6 Lessons
                            </span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">Pixel Art
                            for Games</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">Design your own
                            characters and environments pixel by pixel.</p>
                        <div
                            class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700/50 flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300 bg-cover"
                                    data-alt="Avatar 3"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD5H70tXlHKE6bo-Fv0-UnSHN6ebSnEtypUAc6toHHh-Em5DEbza2lwbmi9z8cqeaFDGv2y1qAX-KtFqJqWZwWBduMvKyydAI_4ogit1UUYmX-ZYdBWj6_tdeTifLK1Nd1RWGh1X1uR8wJUITDpoKFj3qHp9BEHKjAhHLzhA4tcIIIFr2E-mgdyOW7neCaueYsiHlRTBBDBfxmk3UX-ECUaZ4Ry6G8KHSI1TlJR9cG4IVkpdgTjQRTGOTz1zkVOPSdMLC1GtvCFsXo")'>
                                </div>
                                <div
                                    class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-slate-700 text-[10px] text-white flex items-center justify-center font-bold">
                                    +5k</div>
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
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6">
                <div class="size-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400">
                    <span class="material-symbols-outlined text-3xl">html</span>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Web Wizardry</h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">Build websites and apps that live on
                        the internet.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div
                    class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10">
                    <div class="aspect-video w-full bg-slate-800 relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                            data-alt="HTML code on a computer screen"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDZLfqpROWjGu11tRpEPySDkA1OGaYcuq8z8yxf6f3_YgWj611rzW9a43B7Cx2a8FV5103_9kntpmP1PxuKFAcb1ehOhc2Cw00_k6qKvmkDhEcV2RJ8C5miMjN2o-eDVkr30kQXaAkakev_979nvR9oSz8-TwAOmCZcPnwIjiCkr9JE_R_jALPScF9zIDQiAz-cbOaqhkC-T5WQFOvzw4JeLGaCKH7qTabpQtdl7Vrqp1-6N_xtI8buEcHmUQfrVK7FgK74wcPvCxI");'>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-3 py-1 rounded-full flex items-center gap-1 border border-white/10">
                            <span class="material-symbols-outlined text-yellow-400 text-sm fill-1">star</span>
                            <span class="text-xs font-bold text-white">4.8</span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="px-2.5 py-1 rounded-md bg-green-500/10 text-green-500 text-xs font-bold uppercase tracking-wider">Beginner</span>
                            <span
                                class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">book</span> 10 Lessons
                            </span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">HTML
                            Heroes</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">The skeleton of
                            the web. Learn tags, elements, and structure.</p>
                        <div
                            class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700/50 flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-gray-300 bg-cover"
                                    data-alt="Avatar 4"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAWcMcJGmyhMaU_5ir-Gkw2fM_dbMfz3cMEfNRy3Y2t_gc8Xm7SvWvbT4vsXjCiPrQ4Qs0wcWdP7e5SV2x__RmPmMZrZidjlIiAkASB9JHiBDAlaIWeFc6sMu1mkz8ukWRPnRKEwqBIR2wNZmuEa6cmZtdSyPyYxHuhnHwSK9QgItwLGMhURyMR7ZAmkHIjoKQ_YmMR82BdB86vJ3N6p7NB2a280jN2PJIyJkqIbsHC1rfD2cupFSUGdLEpCaoSb3DAlCvrcFrAoXs")'>
                                </div>
                                <div
                                    class="size-6 rounded-full border-2 border-white dark:border-[#1a2230] bg-slate-700 text-[10px] text-white flex items-center justify-center font-bold">
                                    +8k</div>
                            </div>
                            <button
                                class="bg-primary/10 hover:bg-primary text-primary hover:text-white p-2 rounded-full transition-colors">
                                <span class="material-symbols-outlined block">play_arrow</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10">
                    <div class="aspect-video w-full bg-slate-800 relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                            data-alt="Abstract colorful CSS styling representation"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCpNry5T13j6vuU8XHAbQ6MtYvyRHhwMKb6tKUllXa-Ej4OYP-3ZEKd-Pv9STjq3fHE-WC_aIdMfsIoVDWi9KRCMsoGC6_uabK4E35Cu7A3qc7fMsdpqsItobEX59qbnEYeuwqpOF0FR8_AXu69UAQfEQmdfslxpF4EDXs7q3OAthkr1ZLTlDynm9LkoliA3sk3MQMZCd_bk4sO42jcCwlY3m7YQZkPjjxpg77GuBkm8qwOVi7A00_h4uUdeoHRUEK0ZBglV5nWnZ4");'>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="px-2.5 py-1 rounded-md bg-yellow-500/10 text-yellow-500 text-xs font-bold uppercase tracking-wider">Intermediate</span>
                            <span
                                class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">book</span> 12 Lessons
                            </span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">CSS
                            Styling</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">Make it pretty!
                            Colors, layouts, fonts, and animations.</p>
                        <div class="mt-auto">
                            <div class="flex justify-between text-xs font-bold mb-1">
                                <span class="text-slate-500">Progress</span>
                                <span class="text-primary">10%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-primary rounded-full w-[10%]"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="group flex flex-col bg-surface-light dark:bg-[#1a2230] rounded-2xl overflow-hidden hover:translate-y-[-4px] transition-all duration-300 border border-slate-200 dark:border-slate-800 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/10 opacity-75 grayscale hover:grayscale-0 hover:opacity-100">
                    <div
                        class="aspect-video w-full bg-slate-800 relative overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 opacity-40"
                            data-alt="Javascript code snippet"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCzY6ze8m3qSCuTYjMA3d_TbJXBNZ23UkcMXK0coodhpdJDh0hQ8_3XXx9QmKeCSgB17WaKaJWrldRwYFZ6Sp8nTbx0LF_9X8WBKuwby3MToJHoPT7wlWspLAIgRNswQ6xgBbm_3nj9gOrkw8UeD5icdK1qKTPKqAqLMTR8C54KaJG4cDMfg_EsyUzjp0dhUpJUKGxx2KVlf1s3KdjH0HIbUjmxB9c_75bWTm-F0Rgm7BGd99-uj_xrZZRsDkgpOl_TUt-CUXG_HCU");'>
                        </div>
                        <span
                            class="material-symbols-outlined text-4xl text-white/50 relative z-10 group-hover:hidden">lock</span>
                        <span
                            class="hidden group-hover:block relative z-10 text-white font-bold bg-primary px-4 py-2 rounded-full text-sm shadow-lg">Unlock
                            Now</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="px-2.5 py-1 rounded-md bg-red-500/10 text-red-500 text-xs font-bold uppercase tracking-wider">Advanced</span>
                            <span
                                class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">book</span> 20 Lessons
                            </span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">JavaScript
                            Jetpack</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-4">Make things
                            interactive. Click buttons, save data, and more.</p>
                        <div
                            class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-700/50 flex items-center justify-between text-xs text-slate-500">
                            <span>Requires: HTML Heroes</span>
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
