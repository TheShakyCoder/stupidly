<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps({
    title: {
        type: String,
        default: 'Admin',
    },
});

const page = usePage();
const user = computed(() => page.props.auth.user);

const navigation = [
    { name: 'Dashboard', href: '/admin/dashboard', icon: 'dashboard', routeName: 'admin.dashboard' },
    { name: 'Users', href: '/admin/users', icon: 'group', routeName: 'admin.users' },
    { name: 'Courses', href: '/admin/courses', icon: 'menu_book', routeName: 'admin.courses' },
    { name: 'Lessons', href: '/admin/lessons', icon: 'school', routeName: 'admin.lessons' },
    { name: 'Months', href: '/admin/months', icon: 'calendar_month', routeName: 'admin.months' },
];

const isActive = (routeName) => {
    const currentRoute = page.url;
    if (routeName === 'admin.dashboard') {
        return currentRoute === '/admin/dashboard';
    }
    return currentRoute.startsWith(routeName.replace('admin.', '/admin/'));
};
</script>

<template>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-slate-800 border-r border-gray-200 dark:border-slate-700 transform transition-transform duration-300 ease-in-out">
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-200 dark:border-slate-700">
                <Link href="/admin/dashboard" class="flex items-center gap-3">
                    <div class="size-8 text-secondary flex items-center justify-center">
                        <img src="/images/logo.png" :alt="page.props.app_name + ' Logo'">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold leading-tight tracking-[-0.015em] dark:text-white text-gray-900">
                            {{ page.props.app_name }}
                        </h2>
                        <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Admin Panel</span>
                    </div>
                </Link>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-1">
                <Link v-for="item in navigation" :key="item.name" :href="item.href"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors"
                    :class="isActive(item.routeName) 
                        ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400' 
                        : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700/50'">
                    <span class="material-symbols-outlined text-xl">{{ item.icon }}</span>
                    {{ item.name }}
                </Link>
            </nav>

            <!-- User section -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 dark:border-slate-700">
                <div class="flex items-center gap-3 px-3 py-2">
                    <div class="size-9 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-sm">
                        {{ user?.name?.charAt(0)?.toUpperCase() || 'A' }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ user?.name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ user?.email }}</p>
                    </div>
                </div>
                <Link href="/dashboard" class="mt-3 flex items-center justify-center gap-2 w-full px-3 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-slate-700/50 rounded-lg transition-colors">
                    <span class="material-symbols-outlined text-lg">arrow_back</span>
                    Back to Site
                </Link>
            </div>
        </aside>

        <!-- Main content -->
        <div class="pl-64">
            <!-- Top header -->
            <header class="sticky top-0 z-40 bg-white/80 dark:bg-slate-800/80 backdrop-blur-md border-b border-gray-200 dark:border-slate-700">
                <div class="flex items-center justify-between px-6 py-4">
                    <slot name="header">
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">{{ title }}</h1>
                    </slot>
                </div>
            </header>

            <!-- Page content -->
            <main class="p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
