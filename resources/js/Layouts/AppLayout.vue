<script setup>
import NavLink from '@/Components/NavLink.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const user = computed(() => page.props.auth.user);
</script>

<template>
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">

        <div class="w-full px-4 pt-6 z-50 fixed top-0 left-0 right-0 pointer-events-none">
            <div
                class="pointer-events-auto max-w-4xl mx-auto bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur-md rounded-full shadow-lg border border-blue-100 dark:border-blue-900">
                <header class="flex items-center justify-between whitespace-nowrap px-6 py-3">
                    <NavLink href="/" class="flex items-center gap-3">
                        <div class="size-8 text-secondary flex items-center justify-center">
                            <span class="material-symbols-outlined text-3xl">terminal</span>
                        </div>
                        <h2 class="text-lg font-bold leading-tight tracking-[-0.015em] dark:text-white text-gray-900">
                            Stupidly Smart</h2>
                    </NavLink>
                    <div class="flex flex-1 justify-end items-center gap-4 sm:gap-8">
                        <div class="hidden md:flex items-center gap-6">
                            <NavLink
                                class="text-sm font-medium leading-normal hover:text-primary transition-colors dark:text-white text-gray-700"
                                href="/courses">Courses</NavLink>
                            <NavLink
                                class="text-sm font-medium leading-normal hover:text-primary transition-colors dark:text-white text-gray-700"
                                href="/skills">Skills</NavLink>
                            <NavLink
                                class="text-sm font-medium leading-normal hover:text-primary transition-colors dark:text-white text-gray-700"
                                href="/pricing">Pricing</NavLink>
                        </div>

                        <div class="flex gap-2">
                            <Link href="/dashboard" v-if="user"
                                class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-5 bg-linear-to-r from-green-600 to-blue-500 hover:from-green-500 hover:to-blue-400 text-white text-sm font-bold leading-normal shadow-[0_4px_14px_0_rgba(59,130,246,0.39)] transition-all">
                                <span class="truncate">Dashboard</span>
                            </Link>
                            <Link href="/basket" v-if="user"
                                class="hidden md:flex cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-5 bg-transparent border border-gray-300 dark:border-blue-800 hover:bg-gray-100 dark:hover:bg-blue-900/50 text-sm font-bold leading-normal transition-colors dark:text-white text-gray-900">
                                <span class="truncate">Basket</span>
                            </Link>
                            <Link href="/login" v-if="!user"
                                class="hidden md:flex cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-5 bg-transparent border border-gray-300 dark:border-blue-800 hover:bg-gray-100 dark:hover:bg-blue-900/50 text-sm font-bold leading-normal transition-colors dark:text-white text-gray-900">
                                <span class="truncate">Login</span>
                            </Link>
                            <Link href="/register" v-if="!user"
                                class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-5 bg-linear-to-r from-secondary to-primary hover:from-green-400 hover:to-blue-400 text-white text-sm font-bold leading-normal shadow-[0_4px_14px_0_rgba(59,130,246,0.39)] transition-all">
                                <span class="truncate">Register</span>
                            </Link>
                        </div>

                    </div>
                </header>
            </div>
        </div>
        <div class="h-24 w-full"></div>

        <main>
            <slot />
        </main>

        <footer class="w-full border-t border-slate-200 dark:border-border-dark bg-white dark:bg-[#0f131a] mt-auto">
            <div class="layout-container max-w-4xl mx-auto px-4 py-12 flex flex-col items-center">
                <div class="mb-8 text-primary">
                    <svg class="size-8" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M42.4379 44C42.4379 44 36.0744 33.9038 41.1692 24C46.8624 12.9336 42.2078 4 42.2078 4L7.01134 4C7.01134 4 11.6577 12.932 5.96912 23.9969C0.876273 33.9029 7.27094 44 7.27094 44L42.4379 44Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-6 md:gap-12 mb-8">
                    <Link
                        class="text-slate-500 dark:text-text-secondary hover:text-primary transition-colors text-sm font-medium"
                        href="/privacy">Privacy Policy</Link>
                    <Link
                        class="text-slate-500 dark:text-text-secondary hover:text-primary transition-colors text-sm font-medium"
                        href="/terms">Terms of Use</Link>
                    <Link
                        class="text-slate-500 dark:text-text-secondary hover:text-primary transition-colors text-sm font-medium"
                        href="/parent-guide">Parent Guide</Link>
                    <Link
                        class="text-slate-500 dark:text-text-secondary hover:text-primary transition-colors text-sm font-medium"
                        href="/contact">Contact Support</Link>
                </div>
                <p class="text-slate-400 dark:text-[#5a6b85] text-sm text-center">
                    © 2025 Stupidly Smart. Helping future geniuses write their first "Hello World".
                </p>
            </div>
        </footer>
    </div>
</template>

<style lang="scss" scoped></style>
