<template>
    <guest-layout>
        <section class="flex flex-col md:flex-row m-2 p-2">
            <div class="w-full md:w-8/12">
                <div class="mx-2 p-3  rounded-md ">
                    <h2 class="font-semibold text-2xl text-black">
                        <Link class="hover:text-teal-900" :href="route('wish.show', community.slug)">
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
                            {{ post.data.created_at }}
                        </div>
                        <div v-if="$page.props.auth.auth_check && post.data.owner">
                            <Link class="font-semibold bg-indigo-700 hover:bg-indigo-500 rounded-md text-white px-4 py-2" :href="route('communities.posts.edit', [community.slug, post.data.slug])">Edit</Link>
                            <Link class="font-semibold bg-red-500 ml-2 hover:bg-red-400 rounded-md text-white px-4 py-2" method="delete" as="button" type="button" :href="route('communities.posts.destroy', [community.slug, post.data.slug])">Delete</Link>
                        </div>
                    </div>
                    <div class="ml-2   py-5">
                    <h1 class="ml-4 font-semibold text-2xl text-gray-900 mr-4">{{ post.data.title }}</h1>
                    <p class="mt-5 ml-4 text-gray-900 mb-2">{{ post.data.description }}</p>
                    <a :href="post.data.url" class="ml-4 font-semibold text-indigo-700 text-sm" >{{ post.data.url }}</a>
                    </div>
                    <hr>
                    <div>
                        <ul role="list" class="divide-y-[4px] divide-white text-white m-2 mt-6 bg-teal-600 rounded">
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
                                <textarea v-model="form.content" id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:bg-teal-400 focus:border-gray-300 dark:bg-teal-400 dark:border-gray-400 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="Your comment..." required></textarea>
                            </div>
                            <div class="mt-2">
                                <button class="px-4 py-2 bg-teal-700 hover:bg-teal-600 text-white rounded-md">Comment</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-4/12">
                <PostList :posts="posts.data" :community="community">
                    <template #title>Popular Posts</template>
                </PostList>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link, useForm, methods } from '@inertiajs/inertia-vue3';
import PostList from '@/Components/PostList.vue';
import PostVote from '@/Components/PostVote.vue';

    const props = defineProps({
        community: Object,
        post: Object,
        posts: Object,
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