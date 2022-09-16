<template>
    <guest-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                w/{{ community.name }}
            </h2>
            <div class="flex justify-end m-2 p-2">
                <Link v-if="$page.props.auth.auth_check" :href="route('communities.posts.create', community.slug)" class="px-3 py-4 rounded bg-indigo-500 hover:bg-indigo-300 text-white">Create Post</Link>
            </div>
        </template>
        <section class="m-2 p-2">
            <PostCard v-for="post in posts.data" :post="post" :community="community.name" :key="post.id" />
        </section>
    </guest-layout>

</template>

<script setup>
import PostCard from '@/Components/PostCard.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    community: Object,
    posts: Object,
})

</script>