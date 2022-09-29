<template>
    <guest-layout>
        <template #header>
            <div class="flex justify-between ">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                w/{{ community.name }}</h2>
                <Link v-if="$page.props.auth.auth_check" :href="route('communities.posts.create', community.slug)" class="px-3 py-2 rounded bg-teal-800 hover:bg-teal-700 text-white">Create Post</Link>
            </div>
        </template>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <PostCard v-for="post in posts.data" :post="post" :community="community.slug" :key="post.id" />
                <div class="mt-4 p-2">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>
            <div class="w-4/12 p-3">
                <div>
                    <h2 class="font-semibold text-lg p-5 bg-teal-800 rounded-t-lg text-white">
                        About {{ community.name }}
                    </h2>
                    <p class="bg-white p-4 rounder-b-lg">
                        {{ community.description }}
                    </p>
                </div>
                <CommunityList class="mt-4" :communities="communities.data">
                    <template #title>Latest Communities</template>
                </CommunityList>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import PostCard from '@/Components/PostCard.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import CommunityList from '@/Components/CommunityList.vue';

defineProps({
    community: Object,
    posts: Object,
    communities: Object,
})

</script>