<template>
    <AdminLayout title="Lessons">
        <template #header>
            <div class="flex items-center justify-between w-full">
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Lessons</h1>
                <Link :href="route('admin.lessons.create')"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                    Create Lesson
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
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Course
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Month
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Available At
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-slate-700">
                        <tr v-for="lesson in lessons.data" :key="lesson.id"
                            class="hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ lesson.id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ lesson.title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">{{ lesson.course?.title || '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                {{ lesson.month ? new Date(lesson.month.started_at).toLocaleString('default', { month: 'long', year: 'numeric' }) : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                {{ new Date(lesson.available_at).toLocaleString() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <Link v-if="lesson.signed_path && lesson.is_video_available" :href="route('admin.lessons.preview', lesson.id)"
                                    class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                    Play
                                </Link>
                                <Link :href="route('admin.lessons.edit', lesson.id)"
                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    Edit</Link>
                                <button @click="deleteLesson(lesson)"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 ml-4">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4" v-if="lessons.links.length > 3">
                <div class="flex flex-wrap -mb-1">
                    <template v-for="(link, k) in lessons.links" :key="k">
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
    lessons: Object,
});

const deleteLesson = (lesson) => {
    if (confirm('Are you sure you want to delete this lesson? It will also delete the associated files from Spaces.')) {
        router.delete(route('admin.lessons.destroy', lesson.id));
    }
};
</script>
