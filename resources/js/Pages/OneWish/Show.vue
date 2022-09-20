<template>
    <guest-layout>
        <section class="flex flex-col md:flex-row m-2 p-2">
            <div class="w-full md:w-8/12">
                <div class="m-2 p-2">
                    <h2 class="font-semibold text-2xl text-black">
                        <Link :href="route('wish.show', community.slug)">
                        w/{{ community.name }}
                        </Link>
                    </h2>
                </div>
                <div class="m-2 p-6 bg-white text-sm text-gray-400 rounded-xl">
                    <div class="flex flex-col md:flex-row justify-between m-2">
                        <div>
                            Posted by
                            <span class="ml-1 text-gray-900">{{ post.data.username }}</span>
                        </div>
                        <div v-if="$page.props.auth.auth_check">
                            <Link class="font-semibold bg-indigo-700 hover:bg-indigo-500 rounded-md text-white px-4 py-2" :href="route('communities.posts.edit', [community.slug, post.data.slug])">Edit</Link>
                            <Link class="font-semibold bg-red-500 ml-2 hover:bg-red-400 rounded-md text-white px-4 py-2" :href="route('communities.posts.edit', [community.slug, post.data.slug])">Delete</Link>
                        </div>
                    </div>
                    <h1 class="mt-2 font-semibold text-2xl text-gray-900">{{ post.data.title }}</h1>
                    <p class="mt-2 text-gray-900 mb-2">{{ post.data.description }}</p>
                    <a :href="post.data.url" class="font-semibold text-indigo-700 text-sm" >{{ post.data.url }}</a>
                </div>
            </div>
            <div class="w-full md:w-4/12 p-3">
                <div class="m-2 p-2 bg-slate-600 text-white rounded-md">
                    <h2>Latest Communities</h2>
                </div>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    community: Object,
    post: Object,
})

</script>