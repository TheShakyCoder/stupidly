<template>
    <AdminLayout title="Users">
        <template #header>
            <div class="flex items-center justify-between w-full">
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Users</h1>
                <Link :href="route('admin.users.create')"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                    Create User
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
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-slate-700">
                        <tr v-for="user in users.data" :key="user.id"
                            class="hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ user.id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10" v-if="user.profile_photo_url">
                                        <img class="h-10 w-10 rounded-full" :src="user.profile_photo_url" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ user.name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">{{ user.email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span v-if="user.admin"
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">Admin</span>
                                <span v-else
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">User</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span v-if="user.free"
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">Free</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <Link :href="route('admin.users.edit', user.id)"
                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    Edit</Link>
                                <button @click="deleteUser(user)"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 ml-4">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4" v-if="users.links.length > 3">
                <div class="flex flex-wrap -mb-1">
                    <template v-for="(link, k) in users.links" :key="k">
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
    users: Object,
});

const deleteUser = (user) => {
    if (confirm('Are you sure you want to delete this user?')) {
        router.delete(route('admin.users.destroy', user.id));
    }
};
</script>
