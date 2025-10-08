<script setup>
import { Separator } from "@/Components/ui/separator";
import { CircleDollarSign, Clock, ShieldCheck } from "lucide-vue-next";
</script>

<template>
    <section
        id="features"
        class="bg-white py-16 dark:bg-zinc-800 border-t border-dashed border-zinc-400/40 dark:border-zinc-600"
    >
        <div class="max-w-7xl mx-auto">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2
                        class="text-4xl font-bold text-gray-900 mb-4 dark:text-white"
                    >
                        Mengapa Memilih Kami?
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Kemudahan dan kenyamanan adalah prioritas kami
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full">
            <Separator
                class="border-t border-dashed border-zinc-400/40 dark:border-zinc-600"
            />
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="text-center p-6 border border-dashed border-zinc-400/40 dark:border-zinc-600 border-t-0 border-b-0"
                >
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4"
                    >
                        <CircleDollarSign class="w-8 h-8 text-blue-600" />
                    </div>
                    <h3
                        class="text-xl font-semibold text-gray-900 mb-2 dark:text-white"
                    >
                        Harga Terjangkau
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Harga kompetitif dengan berbagai pilihan paket sesuai
                        kebutuhan Anda
                    </p>
                </div>

                <div
                    class="text-center p-6 border border-dashed border-zinc-400/40 dark:border-zinc-600 border-t-0 border-b-0"
                >
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4"
                    >
                        <ShieldCheck class="w-8 h-8 text-blue-600" />
                    </div>
                    <h3
                        class="text-xl font-semibold text-gray-900 mb-2 dark:text-white"
                    >
                        Aman & Terpercaya
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Semua mobil dalam kondisi prima dan diasuransikan dengan
                        lengkap
                    </p>
                </div>

                <div
                    class="text-center p-6 border border-dashed border-zinc-400/40 dark:border-zinc-600 border-t-0 border-b-0"
                >
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4"
                    >
                        <Clock class="w-8 h-8 text-blue-600" />
                    </div>
                    <h3
                        class="text-xl font-semibold text-gray-900 mb-2 dark:text-white"
                    >
                        Layanan 24/7
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Customer service siap membantu Anda kapanpun Anda
                        membutuhkan
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full">
            <Separator
                class="border-t border-dashed border-zinc-400/40 dark:border-zinc-600"
            />
        </div>
    </section>
</template>
