<template>
    <AppLayout title="Create Course">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Course
            </h2>
        </template>

        <div class="py-12 bg-gray-100 dark:bg-gray-900 transition-colors">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg p-6 transition-colors border border-gray-200 dark:border-slate-700/50">
                    
                    <form @submit.prevent="submit">
                        <div class="grid grid-cols-1 gap-6">
                            
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Title <span class="text-red-500">*</span></label>
                                <input v-model="form.title" type="text" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="e.g. Introduction to Mathematics" />
                                <div v-if="form.errors.title" class="text-red-500 text-xs mt-1">{{ form.errors.title }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Synopsis</label>
                                <input v-model="form.synopsis" type="text" maxlength="500" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Short description (max 500 characters)" />
                                <div v-if="form.errors.synopsis" class="text-red-500 text-xs mt-1">{{ form.errors.synopsis }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Description</label>
                                <textarea v-model="form.description" rows="5" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Full course description..."></textarea>
                                <div v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Level</label>
                                <select v-model="form.level" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Select a level</option>
                                    <option value="Scratch">Scratch</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                                <div v-if="form.errors.level" class="text-red-500 text-xs mt-1">{{ form.errors.level }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Image URL</label>
                                <input v-model="form.image" type="url" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="https://example.com/image.jpg" />
                                <div v-if="form.errors.image" class="text-red-500 text-xs mt-1">{{ form.errors.image }}</div>
                                <div v-if="form.image" class="mt-2">
                                    <img :src="form.image" alt="Preview" class="h-32 w-auto rounded-lg object-cover border border-gray-200 dark:border-slate-700" @error="form.image = ''" />
                                </div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Preview Video URL</label>
                                <input v-model="form.preview" type="url" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="https://example.com/preview.mp4" />
                                <div v-if="form.errors.preview" class="text-red-500 text-xs mt-1">{{ form.errors.preview }}</div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <Link :href="route('admin.courses.index')" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 underline mr-4">Cancel</Link>
                                <button type="submit" :disabled="form.processing" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }">
                                    Create Course
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
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    synopsis: '',
    description: '',
    level: '',
    image: '',
    preview: '',
});

const submit = () => {
    form.post(route('admin.courses.store'));
};
</script>
