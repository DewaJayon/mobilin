<script setup>
import {
    CircleCheck,
    Clock,
    LockKeyhole,
    Smile,
    Users,
    Zap,
} from "lucide-vue-next";

const values = [
    {
        icon: LockKeyhole,
        title: "Kepercayaan",
        description:
            "Kami membangun kepercayaan dengan transparansi, kejujuran, dan konsistensi dalam setiap layanan.",
    },
    {
        icon: CircleCheck,
        title: "Kualitas",
        description:
            "Armada mobil terawat dengan baik dan selalu dalam kondisi prima untuk kenyamanan Anda.",
    },
    {
        icon: Smile,
        title: "Kepuasan",
        description:
            "Kepuasan pelanggan adalah prioritas utama kami dalam setiap interaksi dan layanan.",
    },
    {
        icon: Zap,
        title: "Inovasi",
        description:
            "Terus berinovasi dengan teknologi terbaru untuk memberikan pengalaman terbaik.",
    },
    {
        icon: Clock,
        title: "Responsif",
        description:
            "Layanan 24/7 siap membantu Anda kapanpun dan dimanapun Anda membutuhkan.",
    },
    {
        icon: Users,
        title: "Profesional",
        description:
            "Tim profesional yang terlatih untuk memberikan pelayanan terbaik kepada Anda.",
    },
];
</script>

<template>
    <div class="w-full relative">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-x border-dashed border-zinc-400 dark:border-zinc-600"
        >
            <div class="text-center mb-16">
                <div
                    class="absolute top-0 left-1/2 -translate-x-1/2 w-screen h-20 border-b border-dashed border-zinc-400 dark:border-zinc-600"
                />
                <h2
                    class="text-4xl font-bold text-gray-900 mb-4 dark:text-white"
                >
                    Nilai-Nilai Kami
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Prinsip yang kami pegang dalam setiap layanan
                </p>
                <div
                    class="absolute left-1/2 -translate-x-1/2 w-full h-px border-b border-dashed border-zinc-400 dark:border-zinc-600"
                />
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="absolute left-1/2 -translate-x-1/2 w-full border-t border-dashed border-zinc-400 dark:border-zinc-600"
                />
                <div
                    class="text-center z-10 border border-zinc-400/60 dark:border-zinc-600 dark:bg-zinc-800 shadow-md p-8 rounded-2xl"
                    v-for="(item, index) in values"
                    :key="index"
                >
                    <div
                        class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6"
                    >
                        <component
                            :is="item.icon"
                            class="w-12 h-12 text-blue-600"
                        />
                    </div>
                    <h3
                        class="text-xl font-bold text-gray-900 mb-3 dark:text-white"
                    >
                        {{ item.title }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ item.description }}
                    </p>
                </div>

                <div
                    class="absolute w-screen left-1/2 -translate-x-1/2 bottom-0 h-20 border-t border-dashed border-zinc-400 dark:border-zinc-600"
                />
            </div>
        </div>
    </div>
</template>
