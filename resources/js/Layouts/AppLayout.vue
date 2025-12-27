<script setup>
import { ref } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import Menu from '@/Components/Menu.vue';

const page = usePage()

defineProps({
    title: String,
});

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>

        <Head :title="title" />
        <Banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <div class="w-full px-4 pt-6 z-50 fixed top-0 left-0 right-0 pointer-events-none">
                <div
                    class="pointer-events-auto max-w-4xl mx-auto bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur-md rounded-full shadow-lg border border-blue-100 dark:border-blue-900">
                    <header class="flex items-center justify-between whitespace-nowrap px-6 py-3">
                        <div class="flex">
                            <!-- Logo -->
                            <NavLink href="/" class="flex items-center gap-3">
                                <div class="size-8 text-secondary flex items-center justify-center">
                                    <span class="material-symbols-outlined text-3xl">terminal</span>
                                </div>
                                <h2
                                    class="text-lg font-bold leading-tight tracking-[-0.015em] dark:text-white text-gray-900">
                                    Stupidly Smart</h2>
                            </NavLink>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink v-if="page.props.auth.user.is_admin" :href="route('admin.index')"
                                    :active="route().current('admin.index')">
                                    Admin
                                </NavLink>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <Menu @logout="logout"></Menu>



                    </header>
                </div>
            </div>
            <div class="h-24 w-full"></div>


            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
