<script setup>
import HomeFooter from "@/Components/HomeFooter.vue";
import HomeNav from "@/Components/HomeNav.vue";

import { Toaster } from "@/Components/ui/sonner";
import "vue-sonner/style.css";
</script>

<template>
    <div class="min-h-screen dark:bg-zinc-800 bg-zinc-100">
        <HomeNav />
        <slot />
        <HomeFooter />
    </div>

    <Toaster rich-colors position="top-right" />
</template>
