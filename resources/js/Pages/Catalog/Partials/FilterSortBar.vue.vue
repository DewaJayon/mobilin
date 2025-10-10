<script setup>
import { computed, reactive, ref, watchEffect } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import { watchDebounced } from "@vueuse/core";

import { Badge } from "@/Components/ui/badge";
import { Label } from "@/Components/ui/label";
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";

const props = defineProps({
    carPagination: Object,
});

const page = usePage();

const filters = reactive({
    search: "",
    transmission: "",
    fuel: "",
    category: "",
    sort: "all-short",
});

watchEffect(() => {
    const f = page.props.filters || {};
    filters.search = f.search ?? "";
    filters.transmission = f.transmission ?? "all-transmision";
    filters.fuel = f.fuel ?? "all-fuel";
    filters.category = f.category ?? "all-category";
    filters.sort = f.sort ?? "all-short";
});

const activeFilters = computed(() => {
    const active = [];
    if (filters.search && filters.search.trim() !== "")
        active.push({ label: `Kata kunci: ${filters.search}` });
    if (filters.category && filters.category !== "all-category")
        active.push({ label: `Kategori: ${filters.category}` });
    if (filters.transmission && filters.transmission !== "all-transmision")
        active.push({ label: `Transmisi: ${filters.transmission}` });
    if (filters.fuel && filters.fuel !== "all-fuel")
        active.push({ label: `Bahan Bakar: ${filters.fuel}` });
    return active;
});

const shorts = [
    { value: "all-short", label: "Semua" },
    { value: "price-asc", label: "Harga Terendah" },
    { value: "price-desc", label: "Harga Tertinggi" },
    { value: "year-asc", label: "Tahun Terlama" },
    { value: "year-desc", label: "Tahun Terbaru" },
];

const sort = ref(filters.sort);

watchDebounced(sort, (value) => {
    router.get(
        route("catalog"),
        {
            ...filters,
            sort: value,
        },
        { preserveState: true, replace: true }
    );
});
</script>

<template>
    <div
        v-if="activeFilters.length"
        class="mb-6 p-4 bg-white rounded-lg border border-gray-200 dark:bg-zinc-900 dark:border-zinc-800"
    >
        <div class="flex items-center gap-2 flex-wrap">
            <span class="text-sm font-semibold text-gray-700 dark:text-white">
                Filter Aktif:
            </span>

            <Badge
                v-for="(filter, index) in activeFilters"
                :key="index"
                variant="outline"
                class="capitalize px-3 py-1"
            >
                {{ filter.label }}
            </Badge>
        </div>
    </div>

    <div
        class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4"
    >
        <p class="text-gray-600 dark:text-gray-300">
            Menampilkan
            <span class="font-semibold">
                {{ props.carPagination?.to }}
            </span>
            dari
            <span class="font-semibold">
                {{ props.carPagination?.total }}
            </span>
            mobil
        </p>

        <div class="flex items-center gap-2">
            <Label for="sort">Urutkan:</Label>

            <Select id="sort" v-model="sort">
                <SelectTrigger
                    class="border border-zinc-500 dark:border-zinc-600"
                >
                    <SelectValue placeholder="Urutkan" />
                </SelectTrigger>
                <SelectContent>
                    <SelectGroup>
                        <SelectLabel>Urutkan</SelectLabel>
                        <SelectItem
                            v-for="short in shorts"
                            :key="short.value"
                            :value="short.value"
                            class="capitalize cursor-pointer"
                        >
                            {{ short.label }}
                        </SelectItem>
                    </SelectGroup>
                </SelectContent>
            </Select>
        </div>
    </div>
</template>
