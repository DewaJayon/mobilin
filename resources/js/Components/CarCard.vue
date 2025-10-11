<script setup>
import { Button } from "@/Components/ui/button";
import { Badge } from "@/Components/ui/badge";
import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
} from "@/Components/ui/card";
import { Cog, Fuel, MoveRight, UsersRound } from "lucide-vue-next";
import { formatPrice } from "@/lib/utils";

const props = defineProps({
    car: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Card
        class="rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1"
    >
        <CardHeader class="p-0">
            <div class="relative h-56 overflow-hidden bg-gray-200">
                <img
                    v-if="car.image"
                    :src="car.image"
                    :alt="car.model"
                    class="w-full h-full object-cover"
                />

                <img
                    src="/img/Mobilin-Logo.png"
                    :alt="car.model"
                    class="w-full h-full object-cover"
                />

                <div
                    v-if="car.status == 'rented' || car.status == 'maintenance'"
                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center"
                >
                    <span
                        class="bg-red-500 text-white px-4 py-2 rounded-lg font-semibold"
                    >
                        Tidak Tersedia
                    </span>
                </div>

                <Badge
                    class="absolute top-4 left-4 px-3 py-1 text-sm font-semibold rounded-full"
                >
                    {{ car.category.name }}
                </Badge>
            </div>
        </CardHeader>

        <CardContent>
            <div class="pt-3">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3
                            class="text-2xl font-bold text-gray-900 dark:text-white"
                        >
                            {{ car.brand }} {{ car.model }}
                        </h3>
                        <p class="text-gray-500 text-sm dark:text-gray-300">
                            {{ car.year }}
                        </p>
                    </div>
                </div>

                <div class="space-y-2 mb-4">
                    <div class="flex items-center gap-4 text-gray-600 text-sm">
                        <div class="flex items-center gap-1">
                            <UsersRound class="w-4 h-4 dark:text-white" />
                            <span class="dark:text-white">
                                {{ car.seats }} Kursi
                            </span>
                        </div>
                        <div class="flex items-center gap-1">
                            <Cog class="w-4 h-4 dark:text-white" />
                            <span class="dark:text-white capitalize">
                                {{ car.transmission }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 text-gray-600 text-sm">
                        <Fuel class="w-4 h-4 dark:text-white" />
                        <span class="capitalize dark:text-white">
                            {{ car.fuel_type }}
                        </span>
                    </div>

                    <div class="border-t pt-4 mt-4">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p
                                    class="text-gray-500 text-sm dark:text-gray-300"
                                >
                                    Mulai dari
                                </p>
                                <p class="text-3xl font-bold text-blue-600">
                                    {{ formatPrice(car.price_per_day) }}
                                    <span
                                        class="text-base font-normal text-gray-500 dark:text-gray-300"
                                    >
                                        /hari
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </CardContent>

        <CardFooter>
            <Button class="w-full py-6 absolute bottom-0 left-0 right-0">
                <span>Lihat Detail</span>
                <MoveRight class="h-4 w-4" />
            </Button>
        </CardFooter>
    </Card>
</template>
