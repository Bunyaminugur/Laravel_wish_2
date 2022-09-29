<template>

<div class="w-12 flex flex-col">

    <Link :href="route('posts.upVote', post.slug)" class="hover:text-amber-500" method="post" as="button" type="button"
            :class="{'text-amber-500': post.postVotes[0] && post.postVotes[0].vote == 1}" preserve-scroll>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
            </svg>
    </Link>
    <div class="m-2">{{ post.votes }}</div>
    <!-- <Link :href="route('posts.downVote', post.slug)" class="hover:text-amber-500" method="post" as="button" type="button"
        :class="{'text-amber-500': post.postVotes[0] && post.postVotes[0].vote == -1}" preserve-scroll>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
        </svg>
    </Link> -->

</div>


</template>




<script setup>

import { Link } from "@inertiajs/inertia-vue3"

defineProps({
    post: Object,
})
</script>

