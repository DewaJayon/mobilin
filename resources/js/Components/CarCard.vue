<script setup>
import { Button } from "@/Components/ui/button";
import { Badge } from "@/Components/ui/badge";
import { formatPrice } from "@/lib/utils";

import { Cog, Fuel, MoveRight, UsersRound, Zap } from "lucide-vue-next";

import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
} from "@/Components/ui/card";

import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTrigger,
} from "@/Components/ui/dialog";

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
            <Dialog>
                <DialogTrigger as-child>
                    <Button
                        class="w-full py-6 absolute bottom-0 left-0 right-0"
                    >
                        <span>Lihat Detail</span>
                        <MoveRight class="h-4 w-4" />
                    </Button>
                </DialogTrigger>
                <DialogContent
                    class="md:max-w-2xl sm:max-w-xl lg:max-w-4xl max-w-sm rounded-md p-0 max-h-[90dvh] overflow-hidden flex flex-col"
                >
                    <DialogHeader class="p-0 m-0">
                        <img
                            :src="car.image ?? '/img/Mobilin-Logo.png'"
                            :alt="car.model"
                            class="object-cover w-full h-64"
                        />
                    </DialogHeader>

                    <div class="flex-1 overflow-y-auto px-8">
                        <div class="mb-6">
                            <h2
                                class="text-4xl font-bold text-gray-900 mb-2 dark:text-white"
                            >
                                {{ car.brand }} {{ car.model }}
                            </h2>
                            <p class="text-gray-500 text-lg dark:text-gray-300">
                                Tahun {{ car.year }}
                            </p>
                        </div>

                        <div
                            class="bg-blue-50 rounded-xl p-6 mb-6 dark:bg-zinc-800"
                        >
                            <div class="flex items-center justify-between">
                                <div>
                                    <p
                                        class="text-gray-600 mb-1 dark:text-gray-200"
                                    >
                                        Harga Sewa per Hari
                                    </p>
                                    <p class="text-4xl font-bold text-blue-600">
                                        {{ formatPrice(car.price_per_day) }}
                                    </p>
                                </div>

                                <Button
                                    :disabled="car.status !== 'available'"
                                    class="bg-blue-600 text-white px-8 py-6 rounded-lg hover:bg-blue-700 transition font-semibold text-lg"
                                >
                                    Sewa Sekarang
                                </Button>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3
                                class="text-xl font-semibold text-gray-900 mb-3 dark:text-white"
                            >
                                Deskripsi
                            </h3>
                            <p
                                class="text-gray-600 leading-relaxed dark:text-gray-300"
                            >
                                {{ car.description }}
                            </p>
                        </div>

                        <div class="mb-6">
                            <h3
                                class="text-xl font-semibold text-gray-900 mb-4 dark:text-white"
                            >
                                Spesifikasi
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div
                                    class="bg-gray-50 rounded-lg p-4 dark:bg-zinc-800"
                                >
                                    <div class="flex items-center gap-2 mb-2">
                                        <UsersRound
                                            class="w-5 h-5 text-blue-600"
                                        />
                                        <span
                                            class="text-sm text-gray-500 dark:text-gray-300"
                                        >
                                            Kursi
                                        </span>
                                    </div>
                                    <p
                                        class="text-xl font-bold text-gray-900 dark:text-white"
                                    >
                                        {{ car.seats }} Orang
                                    </p>
                                </div>

                                <div
                                    class="bg-gray-50 rounded-lg p-4 dark:bg-zinc-800"
                                >
                                    <div class="flex items-center gap-2 mb-2">
                                        <Cog class="w-5 h-5 text-blue-600" />
                                        <span
                                            class="text-sm text-gray-500 dark:text-gray-300"
                                        >
                                            Transmisi
                                        </span>
                                    </div>
                                    <p
                                        class="text-xl font-bold text-gray-900 dark:text-white capitalize"
                                    >
                                        {{ car.transmission }}
                                    </p>
                                </div>

                                <div
                                    class="bg-gray-50 rounded-lg p-4 dark:bg-zinc-800"
                                >
                                    <div class="flex items-center gap-2 mb-2">
                                        <Zap class="w-5 h-5 text-blue-600" />
                                        <span
                                            class="text-sm text-gray-500 dark:text-gray-300"
                                        >
                                            Bahan Bakar
                                        </span>
                                    </div>
                                    <p
                                        class="text-xl font-bold text-gray-900 dark:text-white capitalize"
                                    >
                                        {{ car.fuel_type }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4 dark:bg-zinc-800">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-3 h-3 rounded-full"
                                    :class="
                                        car.status === 'available'
                                            ? 'bg-green-500'
                                            : 'bg-red-500'
                                    "
                                />
                                <span class="font-semibold">
                                    {{
                                        car.status === "available"
                                            ? "Tersedia"
                                            : "Tidak Tersedia"
                                    }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t">
                            <p class="text-sm">
                                * Harga sudah termasuk asuransi dasar. Untuk
                                sewa dengan supir atau tambahan fitur lainnya,
                                silakan hubungi customer service kami.
                            </p>
                        </div>
                    </div>
                </DialogContent>
            </Dialog>
        </CardFooter>
    </Card>
</template>
