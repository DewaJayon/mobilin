<script setup>
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { RadioGroup, RadioGroupItem } from "@/Components/ui/radio-group";
import { Search } from "lucide-vue-next";

import { ref } from "vue";
import { Slider } from "@/Components/ui/slider";
import { formatPrice } from "@/lib/utils";
import { Separator } from "@/Components/ui/separator";

const price = ref([1000000]);

const categories = ["sedan", "suv", "mpv"];

const transmissions = ["manual", "automatic"];

const fuels = ["bensin", "diesel", "listrik"];
</script>

<template>
    <aside class="lg:w-80 flex-shrink-0">
        <div
            class="bg-white rounded-xl shadow-sm p-6 sticky top-24 dark:bg-zinc-900"
        >
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    Filter
                </h2>
                <Button variant="ghost" size="sm" class="text-sm text-blue-500">
                    Reset
                </Button>
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-2 dark:text-white"
                >
                    Cari Mobil
                </label>
                <div class="relative">
                    <Input
                        id="search"
                        type="text"
                        placeholder="Search..."
                        class="pl-10"
                    />
                    <span
                        class="absolute start-0 inset-y-0 flex items-center justify-center px-2"
                    >
                        <Search class="size-6 text-muted-foreground" />
                    </span>
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-3 dark:text-white"
                >
                    Kategori
                </label>
                <div class="space-y-2">
                    <RadioGroup default-value="all">
                        <div class="flex items-center space-x-2">
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                id="all"
                                value="all"
                            />
                            <Label for="all">Semua Kategori</Label>
                        </div>
                        <div
                            class="flex items-center space-x-2"
                            v-for="(category, index) in categories"
                            :key="index"
                        >
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                :id="category"
                                :value="category"
                            />
                            <Label :for="category" class="capitalize">
                                {{ category }}
                            </Label>
                        </div>
                    </RadioGroup>
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-3 dark:text-white"
                >
                    Transmisi
                </label>
                <div class="space-y-2">
                    <RadioGroup default-value="all-transmision">
                        <div class="flex items-center space-x-2">
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                id="all-transmision"
                                value="all-transmision"
                            />
                            <Label for="all-transmision">Semua Transmisi</Label>
                        </div>
                        <div
                            class="flex items-center space-x-2"
                            v-for="(transmission, index) in transmissions"
                            :key="index"
                        >
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                :id="transmission"
                                :value="transmission"
                            />
                            <Label :for="transmission" class="capitalize">
                                {{ transmission }}
                            </Label>
                        </div>
                    </RadioGroup>
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-3 dark:text-white"
                >
                    Bahan Bakar
                </label>
                <div class="space-y-2">
                    <RadioGroup default-value="all-fuel">
                        <div class="flex items-center space-x-2">
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                id="all-fuel"
                                value="all-fuel"
                            />
                            <Label for="all-fuel">Semua Bahan Bakar</Label>
                        </div>
                        <div
                            class="flex items-center space-x-2"
                            v-for="(fuel, index) in fuels"
                            :key="index"
                        >
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                :id="fuel"
                                :value="fuel"
                            />
                            <Label :for="fuel" class="capitalize">
                                {{ fuel }}
                            </Label>
                        </div>
                    </RadioGroup>
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-3 dark:text-white"
                >
                    Harga per Hari (Rp)
                </label>

                <div class="space-y-3">
                    <Slider
                        v-model="price"
                        :max="2000000"
                        :step="50000"
                        class="w-full"
                    />

                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-300">
                            Rp 0
                        </span>
                        <span class="font-semibold text-blue-600">
                            {{ formatPrice(price[0]) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</template>
