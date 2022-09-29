<template>
    <div class="w-full bg-white  shadow-md border rounded-lg">
        <h2 class="font-semibold text-large p-4 bg-teal-800 text-white rounded-lg">
            <slot name="title" />
        </h2>
        <ul role="list" class="divide-y divide-slate-400 dark:divide-slate-700 p-4">
            <li v-for="community in communities" :key="community.id" class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <Link :href="route('wish.show', community.slug)" class="text-slate-800 hover:text-slate-500 dark:text-slate-700 font-semibold truncate text-sm">
                        {{ community.name }}
                    </Link>
                    <div>
                        Posts({{ community.posts_count }})
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3"

defineProps({
    communities: Object
})

</script>