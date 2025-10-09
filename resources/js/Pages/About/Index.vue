<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import StorySection from "./Partials/StorySection.vue";
import VisionMissionSection from "./Partials/VisionMissionSection.vue";
import ValuesSection from "./Partials/ValuesSection.vue";
import Button from "@/Components/ui/button/Button.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Head>
        <title>Tentang Kami</title>
    </Head>

    <HomeLayout>
        <div
            class="bg-cover bg-center bg-no-repeat text-white py-20 relative"
            style="background-image: url('/img/hero.jpg')"
        >
            <div
                class="absolute inset-0 bg-black/80 border-b border-dashed border-zinc-400 dark:border-zinc-600"
            />
            <div class="absolute inset-0 bg-radial-gradient at-center" />

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">
                        Tentang Mobilin
                    </h1>
                    <p class="text-xl text-gray-200">
                        Mobilin adalah jasa penyedia rental mobil terbaik di
                        Bali. Kami menyediakan mobil berkualitas tinggi dengan
                        harga terjangkau untuk memenuhi kebutuhan perjalanan
                        Anda.
                    </p>
                </div>
            </div>
        </div>

        <StorySection />

        <VisionMissionSection />

        <ValuesSection />

        <div class="dark:bg-zinc-800">
            <div
                class="w-full relative border border-dashed border-zinc-400 dark:border-zinc-600"
            >
                <div
                    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-x border-dashed border-zinc-400 dark:border-zinc-600"
                >
                    <div class="max-w-4xl mx-auto text-center">
                        <h2
                            class="text-4xl font-bold text-blue-600 mb-6 dark:text-white"
                        >
                            Siap Memulai Perjalanan dengan Kami?
                        </h2>
                        <p class="text-xl text-sky-800 mb-8 dark:text-gray-300">
                            Dapatkan penawaran terbaik dan mulai petualangan
                            Anda hari ini
                        </p>
                        <div class="flex gap-3 justify-center">
                            <Link :href="route('catalog')">
                                <Button
                                    class="font-semibold text-lg shadow-lg p-6 bg-blue-600 border text-white hover:bg-blue-700 hover:text-blue-100 transition-all duration-300"
                                >
                                    Lihat Katalog Mobil
                                </Button>
                            </Link>
                            <Button
                                variant="outline"
                                class="font-semibold text-lg shadow-lg p-6 bg-transparent border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-blue-100 transition-all duration-300"
                            >
                                Hubungi Kami
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
