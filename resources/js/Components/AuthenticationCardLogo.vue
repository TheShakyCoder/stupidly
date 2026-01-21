<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <Link :href="'/'" class="flex items-center gap-2">
        <img src="/images/logo.png" alt="" class=" max-w-10 w-full">
        <h1 class="text-4xl font-bold tracking-widest">{{ page.props.app_name }}</h1>
    </Link>
</template>
