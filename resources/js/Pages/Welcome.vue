<template>
    <guest-layout>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <PostCard v-for="post in posts.data" :post="post" :community="post.community_slug" :key="post.id" />
            </div>
            <div class="w-4/12 p-3">
                <div class="m-2 p-2 bg-slate-600 text-white rounded-md">
                    <h2>Top Communities</h2>
                </div>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import PostCard from '@/Components/PostCard.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    communities: Object,
    posts: Object,
})

</script>