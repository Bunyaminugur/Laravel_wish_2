<template>
    <guest-layout>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <PostCard v-for="post in posts.data" :post="post" :community="post.community_slug" :key="post.id" />
            </div>
            <div class="w-4/12 p-3">
                    <CommunityList :communities="communities.data">
                        <template #title>Top Communities</template>
                    </CommunityList>
                </div>
        </section>
    </guest-layout>
</template>

<script setup>
import PostCard from '@/Components/PostCard.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import CommunityList from '@/Components/CommunityList.vue';

defineProps({
    communities: Object,
    posts: Object,
})

</script>