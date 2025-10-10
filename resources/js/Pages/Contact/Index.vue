<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
import ContactInformation from "./Partials/ContactInformation.vue";
import ContactForm from "./Partials/ContactForm.vue";
import MapSection from "./Partials/MapSection.vue";
import FaqSection from "./Partials/FaqSection.vue";
</script>

<template>
    <Head>
        <title>Hubungi Kami</title>
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
                        Hubungi Kami
                    </h1>
                    <p class="text-xl text-gray-200">
                        Tim kami siap membantu Anda 24/7. Jangan ragu untuk
                        menghubungi kami!
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full relative">
            <div
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-x border-dashed border-zinc-400 dark:border-zinc-600"
            >
                <div
                    class="absolute inset-0 h-20 border-b border-dashed border-zinc-400 dark:border-zinc-600"
                />
                <div class="grid lg:grid-cols-3 gap-12">
                    <ContactInformation />

                    <ContactForm />
                    <div
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 w-screen h-20 border-t border-dashed border-zinc-400 dark:border-zinc-600"
                    />
                </div>
            </div>
        </div>

        <MapSection />

        <FaqSection />
    </HomeLayout>
</template>
