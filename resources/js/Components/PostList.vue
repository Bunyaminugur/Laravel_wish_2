<template>
    <div class="w-full bg-white  shadow-md border rounded-lg">
        <h2 class="font-semibold text-large p-4 bg-teal-800 text-white rounded-lg">
            <slot name="title" />
        </h2>
        <ul role="list" class="divide-y divide-slate-400 dark:divide-slate-700 p-4">
            <li v-for="post in posts" :key="post.id" class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <Link :href="route('onewish.show', [community.slug, post.slug])" class="text-slate-800 hover:text-amber-500 dark:text-slate-500 font-semibold truncate text-sm">
                        {{ post.title }}
                    </Link>
                    <div>
                        Votes({{ post.votes }})
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3"

defineProps({
    community: Object,
    posts: Object,
})

</script>