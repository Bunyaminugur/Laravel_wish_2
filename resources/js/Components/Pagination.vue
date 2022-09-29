<template>
    <div class="flex">
      <template v-for="(link, key) in links" :key="key">
        <div
          v-if="link.url === null"
          v-html="link.label"
          class="
            mb-1
            mr-1
            px-4
            py-3
            text-black text-sm
            leading-4
            border
            rounded
          "
        ></div>
        <Link
          v-else
          :href="link.url"
          v-html="link.label"
          class="
            mb-1
            mr-1
            px-4
            py-3
            text-gray-900 text-sm
            leading-4
            border
            rounded
            hover:bg-teal-500
            focus:text-teal-600 focus:border-teal-600
          "
          :class="{ 'bg-teal-600': link.active }"
        ></Link>
      </template>
    </div>
  </template>
  
  <script setup>
  import { Link } from "@inertiajs/inertia-vue3";
  
  defineProps({
    links: [],
  });
  </script>