<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome to StupidlySmart" description="Coding skills for home-educated children" />
    <Head>
        <title>Welcome to StupidlySmart</title>
        <meta name="description" content="Coding skills for home-educated children">
    </Head>

    <PublicLayout>
        <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
            <div class="layout-container flex grow flex-col">
                <div class="px-4 flex flex-1 justify-center py-5">
                    <div class="layout-content-container flex flex-col max-w-4xl flex-1">
                        <div class="@container">
                            <div class="flex flex-col-reverse gap-10 py-10 md:flex-row md:items-start">

                                <div class="flex flex-col gap-8 flex-1 md:max-w-60">
                                    <div class="flex flex-col gap-4 text-left">
                                        <div
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/30 w-fit border border-blue-200 dark:border-blue-800">
                                            <span
                                                class="material-symbols-outlined text-primary text-sm">rocket_launch</span>
                                            <span class="text-primary text-xs font-bold uppercase tracking-wider">New
                                                Fall Cohort Open</span>
                                        </div>
                                        <h1
                                            class="text-4xl font-black leading-[1.1] tracking-[-0.033em] @[480px]:text-5xl @[864px]:text-6xl dark:text-white text-gray-900">
                                            Unlock Your Child's <span
                                                class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-primary">Coding
                                                Superpower</span>
                                        </h1>
                                        <h2
                                            class="text-base font-medium leading-relaxed dark:text-blue-200 text-gray-600">
                                            Interactive, self-paced coding lessons designed specifically for home
                                            education.
                                        </h2>
                                    </div>
                                    <div class="flex flex-wrap gap-4">
                                        <button class="flex min-w-[140px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 bg-secondary hover:bg-green-400 text-white text-base font-bold leading-normal tracking-[0.015em] shadow-[0_0_20px_rgba(16,185,129,0.4)] transition-all transform hover:scale-105">
                                            <span class="material-symbols-outlined group-hover:text-primary transition-colors">play_circle</span>
                                            <span class="truncate ml-2">Free Lesson</span>
                                        </button>

                                    </div>

                                    <div class="flex items-center gap-4 pt-2">
                                        <div class="flex -space-x-3">
                                            <div class="w-10 h-10 rounded-full border-2 border-background-light dark:border-background-dark bg-gray-300 bg-cover bg-center"
                                                data-alt="Portrait of a young student smiling"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAYRarJ7VGCC_QLcC8W7SvHTfj2haNKJEKhk6ELIJHcSARWekYTpIBBfgYLB0upUJSrk9-Au7k0_vde5nCTTxDy_ke5ga_JVQOrErDy_vO0f21gWjYW_uS3Dpk8-t6vEfDnzWoEBcc0XdW3cZK1UR4st_vYcYxALj0AJVn0cMR59G3GNHi_yx8DN7lYY8MA7oJK2x9YmUvVdq8a_-WTBufviJMp9OXZd_BlpCD5i4IwKhS4bYWJAZ-fj_pFggLRlEQ9AGN-qR1lNXE");'>
                                            </div>
                                            <div class="w-10 h-10 rounded-full border-2 border-background-light dark:border-background-dark bg-gray-300 bg-cover bg-center"
                                                data-alt="Portrait of a diverse young coder"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCz3_RpiIqZDguEqENsLANld2c6Uvc0eyExw0p7HXl13YG_v7n6uzmzkVX6MnOYSV--FJxJTspR_TY3Q8U0hIFtVgf6k4ogNO84w5SNHykKj6ZxyS_Cv0qRCNdzNjLfLPXfYxHzPL12_FPXIBUeEkuZANcz0Kg2aZ6lY1ozzDdXTNMFdd0bafLttYXE0kkGKKKPcyMKNq-M4X9unQOyWMgXrZnjEAbS2iiEmm2j71N2P38JfTrSuESsSPgdUPLrqo_0qqb8GBmARyo");'>
                                            </div>
                                            <div class="w-10 h-10 rounded-full border-2 border-background-light dark:border-background-dark bg-gray-300 bg-cover bg-center"
                                                data-alt="Portrait of a happy child learning"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAOb3vObBCuSfZ0O8EpyUXSyEzUGG9Y2Sg-cfeAvwZkW4d3RomKLiCkb6qSYL6kCNEkAr-uryaUlaSjFZUrK010ix6vujNKKT2R8faLiZHFFIAPhwX7_LZGrAi4wdGByvLF1YygQju-sdhL6b2lK_EzJ5oXQGMW2aK0uIbs5b4lqjZgOecnBuolHm63IIaN172FBZf6jnWFZkWZQoluXw6XOHj91ZjtMZdSriMMPMjHHWKcRniP1CkPDCj9PQeRmEB6Bkm89ZQS7L4");'>
                                            </div>
                                        </div>
                                        <p class="text-sm font-medium dark:text-blue-200 text-gray-600">Trusted by home-educated families</p>
                                    </div>

                                </div>

                                <div class="w-full flex-1">
                                    <div
                                        class="relative w-full aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-2xl border border-blue-100 dark:border-blue-900">
                                        <div class="absolute inset-0 bg-cover bg-center"
                                            data-alt="Children working together on a laptop in a bright home environment"
                                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAhdsEBsYi6yuFOR3DuFyNngkbARKCHxe59D8Dlg3NDOV3svx0VhpjccpiPqn_cTp98GMVt_19FS0CyNYgDt6v-ttd1eCJCghztsdTbiqkNLBLyBBdbmJuPrV1FzT19HzrSXemOZD0Kt2J0j1NUtSuVGv9kP6CPvqDU0VEgjHA7_AtjrWNij6VdqV8Ebuxk-R4MY7sPOO6qDGAlWlSosY5VBoF3VXS0oiE2sKYw1Oa6WHMGQQIl7diyLs4jXF1eHJ1YSl-SS-I182s");'>
                                        </div>
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-background-dark/80 to-transparent">
                                        </div>
                                        <div
                                            class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur-md border border-gray-200 dark:border-blue-800 flex items-center gap-4">
                                            <div
                                                class="size-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                                                <span class="material-symbols-outlined">code</span>
                                            </div>
                                            <div>
                                                <p
                                                    class="text-xs text-gray-500 dark:text-blue-200 font-bold uppercase tracking-wider">Coming Soon</p>
                                                <p class="text-sm font-bold dark:text-white text-gray-900">Tic-Tac-Toe Game</p>
                                            </div>
                                            <div class="ml-auto">
                                                <span
                                                    class="material-symbols-outlined text-secondary">check_circle</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 sm:px-10 md:px-20 lg:px-40 py-20 bg-white dark:bg-[#0b1120]">
                <div class="flex justify-center">
                    <div class="flex flex-col max-w-4xl flex-1 gap-12">
                        <div class="flex flex-col gap-4 text-center items-center">
                            <h2
                                class="text-3xl md:text-4xl font-black leading-tight tracking-tight max-w-[720px] dark:text-white text-gray-900">
                                Why Choose Stupidly Smart?
                            </h2>
                            <p
                                class="text-base md:text-lg font-normal leading-normal max-w-[600px] dark:text-blue-200 text-gray-600">
                                We make learning to code fun, safe, and effective for homeschoolers with a platform
                                built for curiosity.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <div
                                class="flex flex-col gap-4 rounded-2xl border border-blue-50 dark:border-blue-900 bg-surface-light dark:bg-surface-dark p-8 shadow-sm hover:shadow-lg transition-all hover:border-primary/30 group">
                                <div
                                    class="size-14 rounded-2xl bg-blue-50 dark:bg-blue-900/40 flex items-center justify-center text-primary group-hover:scale-110 transition-transform duration-300">
                                    <span class="material-symbols-outlined text-3xl">menu_book</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-xl font-bold leading-tight dark:text-white text-gray-900">Curriculum
                                        Aligned</h3>
                                    <p
                                        class="text-sm md:text-base font-normal leading-relaxed dark:text-blue-100 text-gray-600">
                                        Lessons structured to match national educational standards for computer science
                                        literacy.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex flex-col gap-4 rounded-2xl border border-green-50 dark:border-green-900/50 bg-surface-light dark:bg-surface-dark p-8 shadow-sm hover:shadow-lg transition-all hover:border-secondary/30 group">
                                <div
                                    class="size-14 rounded-2xl bg-green-50 dark:bg-green-900/40 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform duration-300">
                                    <span class="material-symbols-outlined text-3xl">verified_user</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-xl font-bold leading-tight dark:text-white text-gray-900">Safe
                                        Community</h3>
                                    <p
                                        class="text-sm md:text-base font-normal leading-relaxed dark:text-green-100 text-gray-600">
                                        A strictly moderated space for kids to share projects and get feedback without
                                        worry.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex flex-col gap-4 rounded-2xl border border-blue-50 dark:border-blue-900 bg-surface-light dark:bg-surface-dark p-8 shadow-sm hover:shadow-lg transition-all hover:border-accent/30 group">
                                <div
                                    class="size-14 rounded-2xl bg-sky-50 dark:bg-sky-900/40 flex items-center justify-center text-accent group-hover:scale-110 transition-transform duration-300">
                                    <span class="material-symbols-outlined text-3xl">support_agent</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-xl font-bold leading-tight dark:text-white text-gray-900">Live
                                        Mentor Support</h3>
                                    <p
                                        class="text-sm md:text-base font-normal leading-relaxed dark:text-blue-100 text-gray-600">
                                        Real help from vetted coding mentors when your child gets stuck on a tricky bug.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 sm:px-10 md:px-20 lg:px-40 py-20">
                <div class="flex justify-center">
                    <div class="flex flex-col max-w-4xl flex-1">
                        <div class="flex items-center justify-between mb-10 px-2">
                            <h2
                                class="text-2xl md:text-3xl font-bold leading-tight tracking-tight dark:text-white text-gray-900">
                                Popular Courses</h2>
                            <Link class="flex items-center gap-1 text-primary font-bold hover:underline" href="/courses">
                                View all <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </Link>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <div
                                class="flex flex-col rounded-2xl overflow-hidden bg-surface-light dark:bg-surface-dark border border-gray-200 dark:border-blue-900 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                <div class="relative w-full aspect-video bg-cover bg-center overflow-hidden"
                                    data-alt="Minecraft style blocks and pixelated landscape"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDjlbA75E7C_EKEx5rSjh_YgXW3PCLaZ21IWaVzWR5mEIl6uDCZTZX6svs0VO8wivD2GBqTNR9RGcbhFVB8EnFA-ET2ydia68WBs2vr8hW7rbohuBJBFp9IIwyVZmnPefYSaPcn6ZKT4I69h0vMH_T9Az1cYt_wZjOmqaTaeno5J5oi6wwkN46-1JtHjzynpwhNNRh5FBH9MP4VmCR7A0YWQchVlLopacJ5j324dZXm2zEN7H1LH_8HDO1ldP1ojVLFy7pvyr4sVLc");'>
                                    <div class="absolute inset-0 bg-blue-900/20 group-hover:bg-black/0 transition-all">
                                    </div>
                                    <div
                                        class="absolute top-3 left-3 bg-secondary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                        Beginner</div>
                                </div>
                                <div class="flex flex-col p-6 gap-3 grow">
                                    <h3
                                        class="text-xl font-bold leading-tight dark:text-white text-gray-900 group-hover:text-secondary transition-colors">
                                        Minecraft Modding 101</h3>
                                    <p class="text-sm dark:text-blue-200 text-gray-600 line-clamp-2 mb-4">
                                        Learn Java concepts while modifying your favorite game. Build custom blocks and
                                        items.
                                    </p>
                                    <div
                                        class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100 dark:border-blue-800">
                                        <div
                                            class="flex items-center gap-1 text-xs font-medium dark:text-blue-300 text-gray-500">
                                            <span class="material-symbols-outlined text-base">schedule</span>
                                            <span>8 Weeks</span>
                                        </div>
                                        <button
                                            class="flex items-center justify-center rounded-full h-8 px-4 bg-transparent border border-secondary text-secondary hover:bg-secondary hover:text-white text-xs font-bold transition-all">
                                            Explore
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col rounded-2xl overflow-hidden bg-surface-light dark:bg-surface-dark border border-gray-200 dark:border-blue-900 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                <div class="relative w-full aspect-video bg-cover bg-center overflow-hidden"
                                    data-alt="Code syntax on a computer screen with python logo"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCJdz0rIEgbZzz34W8AokmfwSMeFbQj20igBGPAECUQRlrUJBZtTXbQEZQljJ7nE2OMLLxDiPf2AB0HbWRi58RFXdBO1WoLLPRgsNM1ZXeJJpMh07btclbyL-lCUco6sRharLa34Ao30aZ7I7WzRmjtFUX9aEmK19rBr2BVDw3IXlLgO7D__J2GYYUNXHtQtlPTF_oe-BHjxeKSLtM3z0zImgLjlQYefxe3vYffaChB_vPe26L9IrcVlr4ZmtkTnG4GjGmSBZBCsjQ");'>
                                    <div class="absolute inset-0 bg-blue-900/20 group-hover:bg-black/0 transition-all">
                                    </div>
                                    <div
                                        class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                        Intermediate</div>
                                </div>
                                <div class="flex flex-col p-6 gap-3 grow">
                                    <h3
                                        class="text-xl font-bold leading-tight dark:text-white text-gray-900 group-hover:text-primary transition-colors">
                                        Python for Puzzle Solvers</h3>
                                    <p class="text-sm dark:text-blue-200 text-gray-600 line-clamp-2 mb-4">
                                        Master logic and syntax by solving increasingly difficult logic puzzles and
                                        riddles using Python.
                                    </p>
                                    <div
                                        class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100 dark:border-blue-800">
                                        <div
                                            class="flex items-center gap-1 text-xs font-medium dark:text-blue-300 text-gray-500">
                                            <span class="material-symbols-outlined text-base">schedule</span>
                                            <span>12 Weeks</span>
                                        </div>
                                        <button
                                            class="flex items-center justify-center rounded-full h-8 px-4 bg-transparent border border-primary text-primary hover:bg-primary hover:text-white text-xs font-bold transition-all">
                                            Explore
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col rounded-2xl overflow-hidden bg-surface-light dark:bg-surface-dark border border-gray-200 dark:border-blue-900 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                                <div class="relative w-full aspect-video bg-cover bg-center overflow-hidden"
                                    data-alt="Colorful abstract web design interface wireframes"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCSlEiy7xUFk6sqTujY9HGaGhktRtnbkQR1QLoSf_d8PnfSX4zB6zVXHAx7wHdeWfQIwGFfuQFjtHlVkJLhi4egLSBPnvLsq15vFOH13EcBEED6MMi2IVPZIrSTewM4KjMtlSgzV-uDmERtGAOIy2mt9RmgZZW2aQCGpzYul1jd6L78-_gqgaeK-m21i_2MZP8SgRe5fwcsGyKgrVwJ7Kui4ADUsAWktLg_hD7dNvqtdwxyULdl0yNTSh5DD2IuJWMN72wimOrq6Js");'>
                                    <div class="absolute inset-0 bg-blue-900/20 group-hover:bg-black/0 transition-all">
                                    </div>
                                    <div
                                        class="absolute top-3 left-3 bg-accent text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                        Creative</div>
                                </div>
                                <div class="flex flex-col p-6 gap-3 grow">
                                    <h3
                                        class="text-xl font-bold leading-tight dark:text-white text-gray-900 group-hover:text-accent transition-colors">
                                        Web Design for Kids</h3>
                                    <p class="text-sm dark:text-blue-200 text-gray-600 line-clamp-2 mb-4">
                                        From HTML basics to colorful CSS styling. Build your own portfolio website from
                                        scratch.
                                    </p>
                                    <div
                                        class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100 dark:border-blue-800">
                                        <div
                                            class="flex items-center gap-1 text-xs font-medium dark:text-blue-300 text-gray-500">
                                            <span class="material-symbols-outlined text-base">schedule</span>
                                            <span>6 Weeks</span>
                                        </div>
                                        <button
                                            class="flex items-center justify-center rounded-full h-8 px-4 bg-transparent border border-accent text-accent hover:bg-accent hover:text-white text-xs font-bold transition-all">
                                            Explore
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 sm:px-10 md:px-20 lg:px-40 py-20 bg-blue-50 dark:bg-[#0c1322]">
                <div class="flex justify-center">
                    <div class="flex flex-col max-w-4xl flex-1">
                        <h2
                            class="text-2xl md:text-3xl font-bold leading-tight tracking-tight text-center mb-12 dark:text-white text-gray-900">
                            What Parents Say</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div
                                class="flex gap-4 p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-gray-100 dark:border-blue-900">
                                <div class="w-12 h-12 shrink-0 rounded-full bg-cover bg-center"
                                    data-alt="Smiling mother headshot"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA0WGfnnatEXZpTqpAxcyCRemvt_swAZFh-T9CvdyrkaSC_hpVaAb0WKfhB-wcYxg-7HA5OeKdbq42sN5FQaUFxTUPbXThccAB1lzQxhl_9LUGAn0fc6aCRGX2__xzAi3ZKCp0za8rXeWbt6wAF-JDWyA5zLUXKgCNl4sOHas2FgnuVubUHhgEpLiO8i7j4-ybNiVD8LvcL1j32HJ1ofY_WGDR8RkRAZh6iED1SEuZJDthSX05Dy5w5-fk-t47Jqba6gKM4kiswpAc");'>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex text-amber-400">
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                    </div>
                                    <p class="text-sm font-medium italic dark:text-blue-200 text-gray-600">"The only
                                        curriculum that kept my son engaged! He actually asks to do his coding lessons
                                        now. The mentors are fantastic."</p>
                                    <p class="text-xs font-bold uppercase tracking-wider text-primary mt-1">- Sarah,
                                        Homeschool Mom</p>
                                </div>
                            </div>
                            <div
                                class="flex gap-4 p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-gray-100 dark:border-blue-900">
                                <div class="w-12 h-12 shrink-0 rounded-full bg-cover bg-center"
                                    data-alt="Smiling father headshot"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCUjyazy5qu_yv6wwnjJBO8u2fUw_scLcb-MHmYD5sYNeARJsNRvZatmZpPWRs9jdvfIIGAGaRIdi_nYd4DXGtf3VBq8wsHq6Mq2nA5_KY50TdEcoODRl5riO_QawettGykXWFPDns5z_cbF-F69lr5M4I_0ihaoLqEAwrjxFgfs22y0yFWHkPl6LPxOk0ji2VoxFw3rS7rPJ7Lx42sXzIVqzP5fLipDis7dYDcedts2qKEG2YkZHlrdtV1wZDfd9Sm1WzmLr2jLx8");'>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex text-amber-400">
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                        <span class="material-symbols-outlined text-sm">star</span>
                                    </div>
                                    <p class="text-sm font-medium italic dark:text-blue-200 text-gray-600">"I love the
                                        self-paced nature. It fits perfectly into our flexible schedule, and the
                                        projects are genuinely impressive."</p>
                                    <p class="text-xs font-bold uppercase tracking-wider text-primary mt-1">- Michael,
                                        Parent of two</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer
                class="w-full bg-surface-light dark:bg-background-dark border-t border-gray-200 dark:border-blue-900">
                <div class="max-w-4xl mx-auto px-4 sm:px-10 md:px-20 lg:px-40 py-12">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                        <div class="col-span-2 md:col-span-1 flex flex-col gap-4">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary text-2xl">terminal</span>
                                <h3 class="font-bold text-lg dark:text-white text-gray-900">Stupidly Smart</h3>
                            </div>
                            <p class="text-sm dark:text-blue-200 text-gray-600">Empowering the next generation of
                                creators through code.</p>
                        </div>
                        <div class="flex flex-col gap-3">
                            <h4 class="font-bold text-sm uppercase tracking-wider dark:text-white text-gray-900">Learn
                            </h4>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">Courses</a>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">Curriculum</a>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">Pricing</a>
                        </div>
                        <div class="flex flex-col gap-3">
                            <h4 class="font-bold text-sm uppercase tracking-wider dark:text-white text-gray-900">Support
                            </h4>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">For Parents</a>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">Help Center</a>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">Contact</a>
                        </div>
                        <div class="flex flex-col gap-3">
                            <h4 class="font-bold text-sm uppercase tracking-wider dark:text-white text-gray-900">Legal
                            </h4>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">Privacy</a>
                            <a class="text-sm dark:text-blue-200 text-gray-600 hover:text-primary transition-colors"
                                href="#">Terms</a>
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center justify-between gap-4 pt-8 border-t border-gray-200 dark:border-blue-900">
                        <p class="text-xs dark:text-blue-300 text-gray-400">© 2023 Stupidly Smart Inc. All rights
                            reserved.</p>
                        <div class="flex gap-4">
                            <a class="dark:text-blue-300 text-gray-500 hover:text-primary transition-colors"
                                href="#"><span class="material-symbols-outlined">public</span></a>
                            <a class="dark:text-blue-300 text-gray-500 hover:text-primary transition-colors"
                                href="#"><span class="material-symbols-outlined">mail</span></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>





    </PublicLayout>






</template>
