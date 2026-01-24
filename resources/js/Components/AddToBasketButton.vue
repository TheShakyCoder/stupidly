<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    fee: {
        type: Number,
        default: 0,
    },
    label: {
        type: String,
        default: '',
    },
    isFree: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <button :type="type"
        class="w-full sm:w-auto transition-all transform hover:scale-105 active:scale-95 shadow-xl hover:shadow-green-500/25 p-4 px-6 rounded-2xl bg-linear-to-br from-green-600 to-green-800 text-white flex flex-col sm:flex-row md:flex-col items-center justify-center gap-3 cursor-pointer">
        <span class="flex items-center gap-2">

            <span v-if="isFree" class="text-xl font-black tracking-widest leading-none">FREE</span>
            <span v-else class="text-2xl font-black tracking-tighter leading-none"><span
                    class="text-sm align-top mr-0.5">£</span>{{ (parseInt(fee) / 100).toFixed(0) }}</span>
        </span>
        <span v-if="label" class="text-xs font-bold uppercase tracking-wider opacity-90">{{ label }}</span>
    </button>
</template>
