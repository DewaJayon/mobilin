<script setup>
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { RadioGroup, RadioGroupItem } from "@/Components/ui/radio-group";
import { Search } from "lucide-vue-next";

import { computed, ref, watch } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3";

const props = defineProps({
    transmissions: {
        type: Object,
    },
    fuels: {
        type: Object,
    },
    categories: {
        type: Object,
    },
});

const page = usePage();
const currentQuery = page.props.filters || {};

const categoryList = computed(() => {
    if (props.categories?.data) {
        return props.categories.data;
    }

    return props.categories;
});

const hadleResetAllFilter = () => {
    router.get(route("catalog"), {}, { preserveState: true, replace: true });
};

const UrlParams = new URLSearchParams(window.location.search);

const search = ref(UrlParams.get("search") ?? "");
const transmission = ref(UrlParams.get("transmission") ?? "all-transmision");
const fuel = ref(UrlParams.get("fuel") ?? "all-fuel");
const category = ref(UrlParams.get("category") ?? "all-category");

watch(
    [transmission, fuel, search, category],
    ([newTransmission, newFuel, newSearch, newCategory]) => {
        if (newTransmission === "") newTransmission = null;
        if (newFuel === "") newFuel = null;
        if (newSearch === "") newSearch = null;
        if (newCategory === "") newCategory = null;

        const params = {
            search: newSearch,
            transmission: newTransmission,
            fuel: newFuel,
            category: newCategory,
        };

        const currentParams = new URLSearchParams(window.location.search);

        if (currentParams.has("all")) {
            params.all = currentParams.get("all");
        }

        router.get(route("catalog"), params, {
            preserveState: true,
            replace: true,
        });
    },
    { flush: "post" }
);
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
                <Button
                    variant="ghost"
                    size="sm"
                    class="text-sm text-blue-500"
                    @click="hadleResetAllFilter"
                >
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
                        v-model="search"
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
                    <RadioGroup default-value="all-category" v-model="category">
                        <div class="flex items-center space-x-2">
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                id="all-category"
                                value="all-category"
                            />
                            <Label for="all-category">Semua Kategori</Label>
                        </div>
                        <div
                            class="flex items-center space-x-2"
                            v-for="(category, index) in categoryList"
                            :key="index"
                        >
                            <RadioGroupItem
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                                :id="category.slug"
                                :value="category.slug"
                            />
                            <Label :for="category.slug" class="capitalize">
                                {{ category.name }}
                            </Label>
                        </div>
                    </RadioGroup>
                    <div
                        class="h-px bg-gray-200 dark:bg-gray-800 text-muted-foreground text-sm my-3"
                    >
                        <Button
                            asChild
                            variant="link"
                            size="sm"
                            class="text-blue-500"
                        >
                            <Link
                                :href="
                                    route('catalog', {
                                        ...currentQuery,
                                        all: true,
                                    })
                                "
                                preserve-state
                                preserve-scroll
                            >
                                Tampilkan Semua Kategori
                            </Link>
                        </Button>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-semibold text-gray-700 mb-3 dark:text-white mt-3"
                >
                    Transmisi
                </label>
                <div class="space-y-2">
                    <RadioGroup
                        default-value="all-transmision"
                        v-model="transmission"
                    >
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
                                :id="transmission.value"
                                :value="transmission.value"
                                class="data-[state=checked]:bg-blue-500 data-[state=checked]:border-blue-500"
                            />
                            <Label :for="transmission.value" class="capitalize">
                                {{ transmission.label }}
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
                    <RadioGroup default-value="all-fuel" v-model="fuel">
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
                                :id="fuel.value"
                                :value="fuel.value"
                            />
                            <Label :for="fuel.value" class="capitalize">
                                {{ fuel.label }}
                            </Label>
                        </div>
                    </RadioGroup>
                </div>
            </div>
        </div>
    </aside>
</template>
