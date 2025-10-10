<script setup>
import { Button } from "@/Components/ui/button";
import CarCard from "@/Pages/Home/Partials/CarCard.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    cars: {
        type: Object,
        required: true,
    },
});

const resetAllFilters = () => {
    router.get(route("catalog"));
};
</script>

<template>
    <template v-if="cars.length">
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            <CarCard v-for="car in cars" :key="car.id" :car="car" />
        </div>
    </template>

    <template v-else>
        <div
            class="bg-white rounded-xl shadow-sm p-12 text-center dark:bg-zinc-900"
        >
            <svg
                class="w-24 h-24 mx-auto text-gray-300 mb-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>
            <h3
                class="text-xl font-semibold text-gray-900 mb-2 dark:text-white"
            >
                Tidak ada mobil ditemukan
            </h3>
            <p class="text-gray-600 mb-6 dark:text-gray-300">
                Coba ubah filter atau kata kunci pencarian Anda
            </p>

            <Button
                @click="resetAllFilters"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold p-6"
            >
                Reset Semua Filter
            </Button>
        </div>
    </template>
</template>
