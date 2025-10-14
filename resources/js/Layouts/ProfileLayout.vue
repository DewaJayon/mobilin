<script setup>
import ProfileSidebar from "@/Components/ProfileSidebar.vue";
import HomeLayout from "./HomeLayout.vue";
</script>

<template>
    <HomeLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="mb-8">
                <h1 class="text-4xl font-bold mb-2">Pengaturan</h1>
                <p class="text-muted-foreground">
                    Kelola preferensi dan pengaturan akun Anda
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <ProfileSidebar />

                <main class="flex-1">
                    <slot />
                </main>
            </div>
        </div>
    </HomeLayout>
</template>
