<script setup>
import { BadgeCheck, Eye } from "lucide-vue-next";
</script>

<template>
    <div class="w-full relative">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-x border-dashed border-zinc-400 dark:border-zinc-600"
        >
            <div class="grid md:grid-cols-2 gap-8 relative">
                <div
                    class="absolute top-0 left-1/2 -translate-x-1/2 w-screen border-t border-dashed border-zinc-400 dark:border-zinc-600"
                />

                <div
                    class="p-8 rounded-2xl border border-zinc-400/60 dark:border-zinc-600 dark:bg-zinc-800 shadow-md"
                >
                    <div
                        class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6"
                    >
                        <Eye class="w-8 h-8 text-white" />
                    </div>
                    <h3
                        class="text-2xl font-bold text-gray-900 mb-4 dark:text-white"
                    >
                        Visi Kami
                    </h3>
                    <p class="text-gray-600 leading-relaxed dark:text-gray-300">
                        Menjadi penyedia layanan rental mobil terdepan di
                        Indonesia yang dikenal dengan kualitas layanan terbaik,
                        armada terlengkap, dan harga yang kompetitif.
                    </p>
                </div>

                <div
                    class="p-8 rounded-2xl border border-zinc-400/60 dark:border-zinc-600 dark:bg-zinc-800 shadow-md"
                >
                    <div
                        class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6"
                    >
                        <BadgeCheck class="w-8 h-8 text-white" />
                    </div>
                    <h3
                        class="text-2xl font-bold text-gray-900 mb-4 dark:text-white"
                    >
                        Misi Kami
                    </h3>
                    <p class="text-gray-600 leading-relaxed dark:text-gray-300">
                        Memberikan pengalaman rental mobil yang mudah, aman, dan
                        menyenangkan dengan mengutamakan kepuasan pelanggan,
                        inovasi teknologi, dan layanan prima 24/7.
                    </p>
                </div>

                <div
                    class="absolute bottom-0 left-1/2 -translate-x-1/2 w-screen border-zinc-400 dark:border-zinc-600 border-b border-dashed"
                />
            </div>
        </div>
    </div>

    <div
        class="w-full border-b border-dashed border-zinc-400 dark:border-zinc-600"
    />
</template>
