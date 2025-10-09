<script setup>
import {
    Clock,
    Facebook,
    Instagram,
    Mail,
    MapPin,
    Phone,
    Twitter,
} from "lucide-vue-next";
</script>

<template>
    <div class="lg:col-span-1">
        <div
            class="bg-white rounded-2xl shadow-lg p-8 sticky top-24 dark:bg-zinc-900"
        >
            <h2 class="text-2xl font-bold text-gray-900 mb-6 dark:text-white">
                Informasi Kontak
            </h2>

            <div class="space-y-6">
                <div class="flex gap-4">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                        <MapPin class="w-6 h-6 text-blue-600" />
                    </div>
                    <div>
                        <h3
                            class="font-semibold text-gray-900 mb-1 dark:text-white"
                        >
                            Alamat
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Jl. Raya Tusan
                            <br />
                            Klungkung
                            <br />
                            Indonesia
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                        <Phone class="w-6 h-6 text-blue-600" />
                    </div>
                    <div>
                        <h3
                            class="font-semibold text-gray-900 mb-1 dark:text-white"
                        >
                            Telepon
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            +62 123 456 789
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                        <Mail class="w-6 h-6 text-blue-600" />
                    </div>
                    <div>
                        <h3
                            class="font-semibold text-gray-900 mb-1 dark:text-white"
                        >
                            Email
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            dewajayon3@gmail.com
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                        <Clock class="w-6 h-6 text-blue-600" />
                    </div>
                    <div>
                        <h3
                            class="font-semibold text-gray-900 mb-1 dark:text-white"
                        >
                            Jam Operasional
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Senin - Jumat: 08:00 - 20:00
                            <br />
                            Sabtu - Minggu: 09:00 - 18:00
                            <br />
                            <span
                                class="text-blue-600 font-medium dark:text-blue-400"
                            >
                                Customer Service: 24/7
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-4 border-t">
                <h3 class="font-semibold text-gray-900 mb-4 dark:text-white">
                    Ikuti Kami
                </h3>
                <div class="flex gap-3">
                    <a
                        href="#"
                        class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition text-black"
                    >
                        <Facebook class="w-5 h-5" />
                    </a>
                    <a
                        href="#"
                        class="text-black w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:bg-blue-400 hover:text-white transition"
                    >
                        <Twitter class="w-5 h-5" />
                    </a>
                    <a
                        href="#"
                        class="text-black w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:bg-pink-600 hover:text-white transition"
                    >
                        <Instagram class="w-5 h-5" />
                    </a>
                    <a
                        href="#"
                        class="text-black w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:bg-green-500 hover:text-white transition"
                    >
                        <Phone class="w-5 h-5" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
