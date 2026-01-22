<template>
    <AppLayout title="Create Lesson">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Lesson
            </h2>
        </template>

        <div class="py-12 bg-gray-100 dark:bg-gray-900 transition-colors">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg p-6 transition-colors border border-gray-200 dark:border-slate-700/50">
                    
                    <form @submit.prevent="submit">
                        <div class="grid grid-cols-1 gap-6">
                            
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Course</label>
                                <select v-model="form.course_id" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" disabled>Select a Course</option>
                                    <option v-for="course in courses" :key="course.id" :value="course.id">
                                        {{ course.title }}
                                    </option>
                                </select>
                                <div v-if="form.errors.course_id" class="text-red-500 text-xs mt-1">{{ form.errors.course_id }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Month</label>
                                <select v-model="form.month_id" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" disabled>Select a Month</option>
                                    <option v-for="month in months" :key="month.id" :value="month.id">
                                        {{ new Date(month.started_at).toLocaleString('default', { month: 'long', year: 'numeric' }) }}
                                    </option>
                                </select>
                                <div v-if="form.errors.month_id" class="text-red-500 text-xs mt-1">{{ form.errors.month_id }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Title</label>
                                <input v-model="form.title" type="text" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                <div v-if="form.errors.title" class="text-red-500 text-xs mt-1">{{ form.errors.title }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Available At</label>
                                <input v-model="form.available_at" type="datetime-local" class="mt-1 block w-full border-gray-300 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                                <div v-if="form.errors.available_at" class="text-red-500 text-xs mt-1">{{ form.errors.available_at }}</div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Lesson Video Folder (Upload Content)</label>
                                <div class="mt-1 flex items-center">
                                    <input 
                                        type="file" 
                                        @change="handleFolderUpload"
                                        webkitdirectory 
                                        directory 
                                        multiple 
                                        class="block w-full text-sm text-gray-500 dark:text-gray-400
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-full file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-blue-50 file:text-blue-700
                                            hover:file:bg-blue-100
                                            dark:file:bg-slate-700 dark:file:text-blue-300
                                        "
                                    />
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Select the folder containing the .m3u8 file and segments.</p>
                                <div v-if="form.errors.folder" class="text-red-500 text-xs mt-1">{{ form.errors.folder }}</div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <Link :href="route('admin.lessons.index')" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 underline mr-4">Cancel</Link>
                                <button type="submit" :disabled="form.processing" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" :class="{ 'opacity-25': form.processing }">
                                    Create Lesson
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
import { ref } from 'vue';

const props = defineProps({
    courses: Array,
    months: Array,
});

const form = useForm({
    course_id: '',
    month_id: '',
    title: '',
    available_at: '',
    folder: [],
});

const handleFolderUpload = (event) => {
    // Convert FileList to Array
    form.folder = Array.from(event.target.files);
};

const submit = () => {
    form.post(route('admin.lessons.store'), {
        forceFormData: true,
    });
};
</script>
