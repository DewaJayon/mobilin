<script setup>
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from "@/Components/ui/accordion";
import { Separator } from "@/Components/ui/separator";

const faqs = [
    {
        question: "Bagaimana cara menyewa mobil?",
        answer: `Anda dapat menyewa mobil dengan mengunjungi halaman katalog, 
        memilih mobil yang diinginkan, dan mengisi formulir booking. 
        Tim kami akan segera menghubungi Anda untuk konfirmasi.`,
    },
    {
        question: "Apa saja persyaratan untuk menyewa mobil?",
        answer: `Persyaratan meliputi: KTP asli, SIM A yang masih berlaku, dan uang deposit 
        sesuai ketentuan. Untuk sewa jangka panjang mungkin diperlukan dokumen tambahan.`,
    },
    {
        question: "Apakah tersedia layanan antar jemput mobil?",
        answer: `Ya, kami menyediakan layanan antar jemput mobil ke lokasi Anda. 
        Biaya layanan ini bervariasi tergantung jarak dan lokasi.`,
    },
    {
        question: "Apakah mobil sudah termasuk asuransi?",
        answer: `Ya, semua mobil kami sudah dilengkapi dengan asuransi dasar. 
        Anda juga dapat menambahkan asuransi all-risk dengan biaya tambahan.`,
    },
    {
        question: "Bagaimana sistem pembayaran?",
        answer: `Kami menerima pembayaran melalui transfer bank, kartu kredit, dan e-wallet. 
        Pembayaran dapat dilakukan saat booking atau saat pengambilan mobil.`,
    },
];
</script>

<template>
    <div
        class="w-full relative border-b border-dashed border-zinc-400 dark:border-zinc-600"
    >
        <div
            class="max-w-7xl mx-auto border-x border-dashed border-zinc-400 dark:border-zinc-600 py-10"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative text-center mb-12">
                    <div
                        class="absolute left-1/2 -translate-x-1/2 w-screen h-24 border-y border-dashed border-zinc-400 dark:border-zinc-600"
                    />

                    <h2
                        class="relative text-4xl font-bold text-gray-900 mb-4 dark:text-white"
                    >
                        Pertanyaan yang Sering Diajukan
                    </h2>
                    <p
                        class="relative text-xl text-gray-600 dark:text-gray-300"
                    >
                        Temukan jawaban untuk pertanyaan umum
                    </p>
                </div>

                <div class="max-w-3xl mx-auto space-y-2">
                    <Accordion
                        v-for="(faq, index) in faqs"
                        :key="index"
                        type="single"
                        collapsible
                        class="text-lg text-gray-900 dark:text-white"
                    >
                        <AccordionItem :value="`item-${index}`">
                            <AccordionTrigger
                                class="text-lg text-gray-900 dark:text-white"
                            >
                                {{ faq.question }}
                            </AccordionTrigger>
                            <AccordionContent>
                                {{ faq.answer }}
                            </AccordionContent>
                        </AccordionItem>
                        <Separator class="bg-zinc-400 dark:bg-zinc-600" />
                    </Accordion>
                </div>
            </div>
        </div>
    </div>
</template>
