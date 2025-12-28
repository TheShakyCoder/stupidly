<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    months: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <AppLayout>

        <pre>{{ months }}</pre>
        <Link href="/checkout">Checkout</Link>
    </AppLayout>
</template>
