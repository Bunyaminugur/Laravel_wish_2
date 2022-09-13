<template>
    <h1>Hi {{ wish.name }} Hi</h1>
</template>

<script setup>

defineProps({
    wish: Object(),
})

</script>