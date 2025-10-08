<script setup>
import { Separator } from "@/Components/ui/separator";
import CarCard from "./CarCard.vue";
</script>

<template>
    <Separator
        class="border-t border-dashed border-zinc-400/40 dark:border-zinc-600"
    />

    <section id="cars" class="bg-slate-100/80 dark:bg-zinc-900">
        <div class="max-w-7xl mx-auto">
            <div class="relative">
                <div
                    class="px-4 sm:px-6 lg:px-8 py-10 text-center border border-dashed border-b-0 border-zinc-400/40 dark:border-zinc-600/50 border-t-0"
                >
                    <h2
                        class="text-4xl font-bold text-gray-900 mb-4 dark:text-white"
                    >
                        Katalog Mobil
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Pilih mobil sesuai kebutuhan perjalanan Anda
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full">
            <Separator
                class="border-t border-dashed border-zinc-400/40 dark:border-zinc-600"
            />
        </div>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 border border-dashed border-t-0 border-b-0 border-zinc-400/40 dark:border-zinc-600/50"
        >
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8"
            >
                <CarCard v-for="i in 6" :key="i" />
            </div>
        </div>

        <div class="w-full">
            <Separator
                class="border-t border-dashed border-zinc-400/40 dark:border-zinc-600"
            />
        </div>
    </section>
</template>
