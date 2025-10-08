<script setup>
import { Button } from "@/Components/ui/button";
import { Link } from "@inertiajs/vue3";
import { MoveRight, Phone } from "lucide-vue-next";
</script>

<template>
    <section
        class="relative text-white py-32 overflow-hidden bg-cover bg-center bg-no-repeat"
        style="background-image: url('/img/hero.jpg')"
    >
        <div class="absolute inset-0 bg-black/80" />

        <div
            class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center"
        >
            <div class="mb-6 flex flex-col items-center">
                <h1
                    class="text-5xl md:text-7xl font-extrabold mb-6 bg-white bg-clip-text text-transparent"
                >
                    Rental Mobil
                    <br />
                    <span class="text-4xl md:text-6xl"> Terpercaya </span>
                </h1>
                <p
                    class="text-xl md:text-2xl mb-12 text-white max-w-3xl mx-auto leading-relaxed"
                >
                    Nikmati perjalanan yang nyaman dengan armada mobil terbaik
                    kami. Proses cepat, harga terjangkau, dan layanan 24/7.
                </p>
            </div>

            <div
                class="flex flex-col sm:flex-row gap-6 justify-center items-center"
            >
                <Link :href="route('catalog')">
                    <Button
                        size="lg"
                        class="group bg-white text-blue-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-3xl"
                    >
                        Lihat Katalog
                        <MoveRight class="h-4 w-4" />
                    </Button>
                </Link>
                <Button
                    variant="outline"
                    size="lg"
                    class="border border-white text-white group hover:text-blue-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-3xl"
                >
                    Hubungi Kami
                    <Phone class="h-4 w-4" />
                </Button>
            </div>

            <div
                class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto"
            >
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">
                        500++
                    </div>
                    <div class="text-white/70">Mobil Tersedia</div>
                </div>

                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">
                        10K+
                    </div>
                    <div class="text-white/70">Pelanggan Puas</div>
                </div>

                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">
                        24/7
                    </div>
                    <div class="text-white/70">Layanan Support</div>
                </div>
            </div>
        </div>
    </section>
</template>
