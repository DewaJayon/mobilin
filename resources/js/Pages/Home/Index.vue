<script setup>
import { Head } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";

import HomeLayout from "@/Layouts/HomeLayout.vue";
import HeroSection from "./Partials/HeroSection.vue";
import FeatureSection from "./Partials/FeatureSection.vue";
import CatalogSection from "./Partials/CatalogSection.vue";

const props = defineProps({
    cars: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head>
        <title>Home</title>
    </Head>

    <HomeLayout>
        <HeroSection />

        <FeatureSection />

        <CatalogSection :cars="cars" />

        <section class="bg-blue-600 py-20 dark:bg-zinc-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Siap Memulai Perjalanan Anda?
                </h2>
                <p class="text-xl text-blue-100 mb-8">
                    Dapatkan penawaran terbaik dan mulai petualangan Anda hari
                    ini
                </p>
                <Button
                    @click="$inertia.visit(route('catalog'))"
                    class="bg-white text-blue-600 px-8 py-4 rounded-lg hover:bg-gray-100 transition font-semibold text-lg shadow-lg p-6"
                >
                    Sewa Sekarang
                </Button>
            </div>
        </section>
    </HomeLayout>
</template>
