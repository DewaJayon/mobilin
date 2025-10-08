<script setup>
import { Button } from "@/Components/ui/button";
import { Badge } from "@/Components/ui/badge";
import { Card, CardContent, CardHeader } from "@/Components/ui/card";
import { Cog, Fuel, MoveRight, UsersRound } from "lucide-vue-next";
</script>

<template>
    <Card
        class="rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1"
    >
        <CardHeader class="p-0">
            <div class="relative h-56 overflow-hidden bg-gray-200">
                <img
                    src="https://dummyimage.com/600x400/9c9c9c/000"
                    alt="Car Image"
                    class="w-full h-full object-cover"
                />

                <!-- <div
                                class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center"
                            >
                                <span
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg font-semibold"
                                >
                                    Tidak Tersedia
                                </span>
                            </div> -->

                <Badge
                    class="absolute top-4 left-4 px-3 py-1 text-sm font-semibold rounded-full"
                >
                    Sedan
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
                            Toyota Yaris
                        </h3>
                        <p class="text-gray-500 text-sm dark:text-gray-300">
                            2022
                        </p>
                    </div>
                </div>

                <div class="space-y-2 mb-4">
                    <div class="flex items-center gap-4 text-gray-600 text-sm">
                        <div class="flex items-center gap-1">
                            <UsersRound class="w-4 h-4 dark:text-white" />
                            <span class="dark:text-white"> 2 Kursi </span>
                        </div>
                        <div class="flex items-center gap-1">
                            <Cog class="w-4 h-4 dark:text-white" />
                            <span class="dark:text-white"> Manual </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 text-gray-600 text-sm">
                        <Fuel class="w-4 h-4 dark:text-white" />
                        <span class="capitalize dark:text-white"> Bensin </span>
                    </div>
                </div>

                <div class="border-t pt-4 mt-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-500 text-sm dark:text-gray-300">
                                Mulai dari
                            </p>
                            <p class="text-3xl font-bold text-blue-600">
                                Rp 2.000.000
                                <span
                                    class="text-base font-normal text-gray-500 dark:text-gray-300"
                                >
                                    /hari
                                </span>
                            </p>
                        </div>
                    </div>

                    <Button class="w-full py-3">
                        <span>Lihat Detail</span>

                        <MoveRight class="h-4 w-4" />
                    </Button>
                </div>
            </div>
        </CardContent>
    </Card>
</template>
