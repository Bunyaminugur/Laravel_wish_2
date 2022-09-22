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
                <div class="flex m-2 p-6 bg-white text-sm text-gray-400 rounded-xl">
                    <div class="bg-gray-300 text-black">
                        <!-- work in progress -->
                        <!-- <PostVote :post="post.data" /> -->
                    </div>
                    <div class="w-full">
                        <div class="flex ml-4 flex-col md:flex-row justify-between m-2">
                        <div>
                            Posted by
                            <span class="ml-1 text-gray-900">{{ post.data.username }}</span>
                        </div>
                        <div v-if="$page.props.auth.auth_check && post.data.owner">
                            <Link class="font-semibold bg-indigo-700 hover:bg-indigo-500 rounded-md text-white px-4 py-2" :href="route('communities.posts.edit', [community.slug, post.data.slug])">Edit</Link>
                            <Link class="font-semibold bg-red-500 ml-2 hover:bg-red-400 rounded-md text-white px-4 py-2" method="delete" as="button" type="button" :href="route('communities.posts.destroy', [community.slug, post.data.slug])">Delete</Link>
                        </div>
                    </div>
                    <div class="ml-2 border-4 border-gray-600 rounded py-5">
                    <h1 class="ml-4 font-semibold text-2xl text-gray-900 mr-4">{{ post.data.title }}</h1>
                    <p class="mt-5 ml-4 text-gray-900 mb-2">{{ post.data.description }}</p>
                    <a :href="post.data.url" class="ml-4 font-semibold text-indigo-700 text-sm" >{{ post.data.url }}</a>
                    </div>
                    <hr>
                    <div>
                        <ul role="list" class="divide-y-[4px] divide-white text-white m-2 p-2 mt-6 bg-gray-400 rounded">
                            <li v-for="(comment, index) in post.data.comments" :key="index" class="py-4 flex flex-col">
                                <div class="text-sm ml-4">Commented by <span class="font-semibold ml-1 text-amber-400">{{comment.username}}</span></div>
                                <div class="text-white m-2 p-2">{{ comment.content }}</div>
                            </li>
                        </ul>
                    </div>
                    <div v-if="$page.props.auth.auth_check" class="mt-3">
                        <form class="m-2 p-2 max-w-md" @submit.prevent="submit">
                            <div class="mt-2">
                                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your comment</label>
                                <textarea v-model="form.content" id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-400 dark:border-gray-400 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your comment..." required></textarea>
                            </div>
                            <div class="mt-2">
                                <button class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Comment</button>
                            </div>
                        </form>
                    </div>
                    </div>
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
import { Link, useForm, methods } from '@inertiajs/inertia-vue3';
import PostVote from '@/Components/PostVote.vue';

    const props = defineProps({
        community: Object,
        post: Object,
    });

    const form = useForm({
        content: ""
    });

    const submit = () => {
        form.post(route("wish.comments", [props.community.slug, props.post.data.slug])), {
            this:form.content = null,
        };
    };


</script>