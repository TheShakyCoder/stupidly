<template>
    <AppLayout title="Create User">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create User
            </h2>
        </template>

        <div class="py-12 bg-gray-100 dark:bg-gray-900 transition-colors">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-200 dark:border-slate-700/50">
                    <form @submit.prevent="submit">
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                <input id="name" v-model="form.name" type="text"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required autofocus autocomplete="name" />
                                <div v-if="form.errors.name" class="text-red-600 dark:text-red-400 text-sm mt-1">{{
                                    form.errors.name }}
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <input id="email" v-model="form.email" type="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required />
                                <div v-if="form.errors.email" class="text-red-600 dark:text-red-400 text-sm mt-1">{{
                                    form.errors.email }}
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                <input id="password" v-model="form.password" type="password"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    required autocomplete="new-password" />
                                <div v-if="form.errors.password" class="text-red-600 dark:text-red-400 text-sm mt-1">{{
                                    form.errors.password }}
                                </div>
                            </div>

                            <!-- Title -->
                            <div>
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title
                                    (Optional)</label>
                                <input id="title" v-model="form.title" type="text"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                <div v-if="form.errors.title" class="text-red-600 dark:text-red-400 text-sm mt-1">{{
                                    form.errors.title }}
                                </div>
                            </div>

                            <!-- Bio -->
                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio
                                    (Optional)</label>
                                <textarea id="bio" v-model="form.bio" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                <div v-if="form.errors.bio" class="text-red-600 dark:text-red-400 text-sm mt-1">{{
                                    form.errors.bio }}
                                </div>
                            </div>

                            <!-- Admin Checkbox -->
                            <div v-if="$page.props.auth.user.admin">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" v-model="form.admin"
                                        class="rounded border-gray-300 dark:border-slate-700 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900">
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">Admin User</span>
                                </label>
                            </div>

                            <!-- Free User Checkbox -->
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" v-model="form.free"
                                        class="rounded border-gray-300 dark:border-slate-700 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-900">
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">Free User</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="bg-gray-800 dark:bg-slate-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-slate-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4"
                                    :disabled="form.processing">
                                    Create User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    title: '',
    bio: '',
    admin: false,
    free: false,
});

const submit = () => {
    form.post(route('admin.users.store'));
};
</script>
