<script setup>
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

const shorts = [
    {
        value: "price-asc",
        label: "Harga Terendah",
    },
    {
        value: "price-desc",
        label: "Harga Tertinggi",
    },
    {
        value: "year-asc",
        label: "Tahun Terbaru",
    },
];
</script>

<template>
    <div
        class="mb-6 p-4 bg-white rounded-lg border border-gray-200 dark:bg-zinc-900 dark:border-zinc-800"
    >
        <div class="flex items-center gap-2 flex-wrap">
            <span class="text-sm font-semibold text-gray-700 dark:text-white">
                Filter Aktif:
            </span>
        </div>
    </div>

    <div
        class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4"
    >
        <p class="text-gray-600 dark:text-gray-300">
            Menampilkan
            <span class="font-semibold">12</span>
            dari
            <span class="font-semibold">50</span>
            mobil
        </p>

        <div class="flex items-center gap-2">
            <Label for="sort">Urutkan:</Label>

            <Select id="sort">
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
