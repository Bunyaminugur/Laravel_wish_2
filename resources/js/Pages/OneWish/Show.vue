<template>
    <guest-layout>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <h1>{{ post.title }}</h1>
                Post Details
            </div>
            <div class="w-4/12 p-3">
                <div class="m-2 p-2 bg-slate-600 text-white">
                    <h2>Latest Communities</h2>
                </div>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import PostCard from '@/Components/PostCard.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    community: Object,
    post: Object,
})

</script>