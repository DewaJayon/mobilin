<script setup>
import HomeFooter from "@/Components/HomeFooter.vue";
import HomeNav from "@/Components/HomeNav.vue";
</script>

<template>
    <div class="min-h-screen dark:bg-zinc-800">
        <HomeNav />
        <slot />
        <HomeFooter />
    </div>
</template>
