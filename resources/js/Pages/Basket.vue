<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    months: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <pre>{{ months }}</pre>
    <Link href="/checkout">Checkout</Link>
</template>
