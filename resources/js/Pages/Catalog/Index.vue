<script setup>
import { Head } from "@inertiajs/vue3";

import HomeLayout from "@/Layouts/HomeLayout.vue";
import SidebarFilter from "./Partials/SidebarFilter.vue";
import FilterSortBarVue from "./Partials/FilterSortBar.vue.vue";
import CarList from "./Partials/CarList.vue";
import CatalogPagination from "./Partials/CatalogPagination.vue";
</script>

<template>
    <Head>
        <title>Catalog</title>
    </Head>

    <HomeLayout>
        <div class="relative">
            <div
                class="border-b border-dashed border-zinc-400/40 dark:border-zinc-600"
            >
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">
                    <div class="mb-8 flex items-start justify-between">
                        <div class="bg-red">
                            <h1
                                class="text-4xl font-bold text-gray-900 mb-2 dark:text-white"
                            >
                                Katalog Mobil
                            </h1>
                            <p class="text-muted-foreground">
                                Temukan mobil yang sempurna untuk perjalanan
                                Anda
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="absolute inset-0 h-full max-w-7xl mx-auto border border-dashed border-zinc-400/40 dark:border-zinc-600 border-t-0 border-b-0 pointer-events-none"
            />

            <div class="relative">
                <div
                    class="absolute inset-0 mt-2 border border-dashed border-zinc-400/40 dark:border-zinc-600 pointer-events-none"
                />

                <div
                    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-3 pb-16 relative"
                >
                    <div class="flex flex-col lg:flex-row gap-8">
                        <SidebarFilter />
                        <main
                            class="flex-1 p-3 border border-dashed border-zinc-400/40 dark:border-zinc-600 border-t-0 border-b-0 -mt-3"
                        >
                            <FilterSortBarVue />
                            <CarList />
                        </main>
                    </div>

                    <div
                        class="absolute bottom-0 left-0 right-0 border-t border-dashed border-zinc-400/40 dark:border-zinc-600 pointer-events-none"
                    />
                </div>

                <div class="w-full flex justify-center py-3">
                    <CatalogPagination />
                </div>
            </div>
        </div>
    </HomeLayout>
</template>
