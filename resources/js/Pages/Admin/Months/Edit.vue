<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import dayjs from 'dayjs';

const props = defineProps({
    month: Object,
});

const form = useForm({
    fee_recordings: props.month.fee_recordings,
    fee: props.month.fee,
});

const updateMonth = () => {
    form.put(route('admin.months.update', props.month.id), {
        errorBag: 'updateMonth',
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Edit Month Pricing">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Pricing: {{ dayjs(month.started_at).format('MMMM YYYY') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <FormSection @submitted="updateMonth">
                    <template #title>
                        Pricing Configuration
                    </template>

                    <template #description>
                        Update the pricing tiers for this month. Prices are in pence (e.g., 900 = £9.00).
                    </template>

                    <template #form>
                        <!-- Tier 1: Recordings Only -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="fee_recordings" value="Tier 1: Recordings Only (in pence)" />
                            <TextInput id="fee_recordings" v-model="form.fee_recordings" type="number"
                                class="mt-1 block w-full" />
                            <p class="mt-1 text-sm text-gray-500">
                                Current: £{{ (form.fee_recordings / 100).toFixed(2) }}
                            </p>
                            <InputError :message="form.errors.fee_recordings" class="mt-2" />
                        </div>

                        <!-- Tier 2: Live Access -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="fee" value="Tier 2: Live Access (in pence)" />
                            <TextInput id="fee" v-model="form.fee" type="number" class="mt-1 block w-full" />
                            <p class="mt-1 text-sm text-gray-500">
                                Current: £{{ (form.fee / 100).toFixed(2) }}
                            </p>
                            <InputError :message="form.errors.fee" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <ActionMessage :on="form.recentlySuccessful" class="me-3">
                            Saved.
                        </ActionMessage>

                        <Link :href="route('admin.months.index')"
                            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150 mr-3">
                            Cancel
                        </Link>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AppLayout>
</template>
