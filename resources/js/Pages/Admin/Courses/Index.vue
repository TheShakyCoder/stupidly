<template>
    <AdminLayout title="Courses">
        <template #header>
            <div class="flex items-center justify-between w-full">
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Courses</h1>
                <Link :href="route('admin.courses.create')"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                    Create Course
                </Link>
            </div>
        </template>

        <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg p-6 transition-colors border border-gray-200 dark:border-slate-700/50">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-700">
                    <thead class="bg-gray-50 dark:bg-slate-700/50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Key
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Level
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Lessons
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-slate-700">
                        <tr v-for="course in courses.data" :key="course.id"
                            class="hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                                {{ course.id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img v-if="course.image" :src="course.image" :alt="course.title"
                                    class="h-10 w-10 rounded-lg object-cover" />
                                <div v-else
                                    class="h-10 w-10 rounded-lg bg-gray-200 dark:bg-slate-700 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-gray-400 dark:text-gray-500">image</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100 font-medium">
                                {{ course.title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                <code class="text-xs bg-gray-100 dark:bg-slate-700 px-2 py-1 rounded">{{ course.key }}</code>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                {{ course.level || '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">
                                    {{ course.lessons_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <Link :href="route('admin.courses.edit', course.key)"
                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    Edit
                                </Link>
                                <button @click="deleteCourse(course)"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 ml-4">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <tr v-if="courses.data.length === 0">
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                No courses found. Create your first course to get started.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4" v-if="courses.links.length > 3">
                <div class="flex flex-wrap -mb-1">
                    <template v-for="(link, k) in courses.links" :key="k">
                        <div v-if="link.url === null"
                            class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 dark:text-slate-500 border dark:border-slate-700 rounded"
                            v-html="link.label" />
                        <Link v-else
                            class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border dark:border-slate-700 rounded hover:bg-white dark:hover:bg-slate-700 focus:border-indigo-500 focus:text-indigo-500 text-gray-700 dark:text-gray-300"
                            :class="{ 'bg-blue-700 !text-white dark:bg-blue-600': link.active }"
                            :href="link.url" v-html="link.label" />
                    </template>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';

defineProps({
    courses: Object,
});

const deleteCourse = (course) => {
    if (confirm(`Are you sure you want to delete "${course.title}"? This action cannot be undone.`)) {
        router.delete(route('admin.courses.destroy', course.key));
    }
};
</script>
