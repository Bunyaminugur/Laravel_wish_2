<template>
    <div
      class="
        mt-4
        p-6
        max-w-4xl
        flex
        bg-white
        rounded-lg
        border border-y-200
        shadow-md
      ">
      <div class="mr-3">
        <PostVote :post="post"/>
      </div>
      <div>
        <div class="flex my-2 py-2 text-sm">
          <Link :href="route('wish.show', community)" class="font-semibold mr-3 hover:text-amber-500">w/{{ community }}</Link>
          <div class="flex">
            Posted by
            <span class="font-semibold mx-1">{{ post.username }}</span>
            {{ post.created_at }}
          </div>
        </div>
        <Link :href="route('onewish.show', [community, post.slug])">
          <h5
            class="
              mb-2
              text-2xl
              font-bold
              tracking-tight
              text-y-700
              dark:text-y
              hover:text-amber-500
            "
          >
            {{ post.title }}
          </h5>
        </Link>
        <p class="mb-3 font-normal text-y-900 dark:text-y-800">
          {{ post.description }}
        </p>
        <div class="flex m-2 p-2">
          <Link  :href="route('onewish.show', [community, post.slug])"
              class="flex
              items-center mx-2
              py-2
              px-3
              text-sm
              font-medium
              text-center text-white
              bg-teal-800
              rounded-lg
              hover:bg-teal-800
              focus:ring-4 focus:outline-none focus:bg-teal-800
              dark:bg-teal-800 dark:hover:bg-teal-500 dark:focus:bg-grteal-500
            ">Comments({{ post.comments_count }})</Link>
          <Link
            :href="route('onewish.show', [community, post.slug])"
            class="
              inline-flex
              items-center
              py-2
              px-3
              text-sm
              font-medium
              text-center text-white
              bg-teal-800
              rounded-lg
              hover:bg-teal-800
              focus:ring-4 focus:outline-none focus:bg-teal-800
              dark:bg-teal-800 dark:hover:bg-teal-500 dark:focus:bg-teal-500
            ">
            Read more
            <svg
              aria-hidden="true"
              class="ml-2 -mr-1 w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </Link>
        </div>
      </div>
    </div>
  </template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import PostVote from "./PostVote.vue";
  defineProps({
    post: Object,
    community: String,
  });

</script>