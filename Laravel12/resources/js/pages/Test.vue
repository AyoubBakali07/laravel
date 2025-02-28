<!-- resources/js/pages/Test.vue -->
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Test Page" />
    <div class="min-h-screen bg-gray-100 p-8">
        <h1 class="text-3xl font-bold mb-4">Test Page</h1>
        <p class="mb-4">This is the test page content.</p>
        <Link 
            :href="route('welcome')"
            class="text-blue-500 hover:text-blue-700"
        >
            ← Back to Welcome
        </Link>
    </div>
</template>