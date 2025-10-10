<script setup>
import { Alert, AlertDescription, AlertTitle } from "@/Components/ui/alert";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { ArrowRightIcon, CheckCircle2 } from "lucide-vue-next";

import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";
import { Button } from "@/Components/ui/button";
import { Spinner } from "@/Components/ui/spinner";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const subjects = [
    {
        value: "rent",
        label: "Informasi Rental",
    },
    {
        value: "booking",
        label: "Booking Mobil",
    },
    {
        value: "complaint",
        label: "Keluhan",
    },
    {
        value: "partnership",
        label: "Kerjasama",
    },
    {
        value: "other",
        label: "Lainnya",
    },
];

const form = useForm({
    name: "",
    email: "",
    telephone: "",
    subject: "",
    message: "",
});

const showAlertSuccess = ref(false);

const sendEmail = () => {
    form.post(route("contact.send"), {
        onSuccess: () => {
            form.reset();
            showAlertSuccess.value = true;

            setTimeout(() => {
                showAlertSuccess.value = false;
            }, 5000);
        },

        preserveScroll: true,
        preserveState: true,
        showProgress: false,
    });
};
</script>

<template>
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg p-8 dark:bg-zinc-900">
            <h2 class="text-3xl font-bold text-gray-900 mb-2 dark:text-white">
                Kirim Pesan
            </h2>
            <p class="text-gray-600 mb-8 dark:text-gray-300">
                Isi formulir di bawah ini dan kami akan segera menghubungi Anda
            </p>

            <Alert
                class="mb-6 border-green-600 bg-green-50 dark:bg-zinc-800"
                v-if="showAlertSuccess"
            >
                <div class="flex gap-3 items-center">
                    <CheckCircle2
                        class="w-6 h-6 text-green-700 flex-shrink-0"
                    />
                    <div>
                        <AlertTitle> Pesan Terkirim!</AlertTitle>
                        <AlertDescription>
                            Terima kasih telah menghubungi kami. Tim kami akan
                            segera merespons pesan Anda.
                        </AlertDescription>
                    </div>
                </div>
            </Alert>

            <form class="space-y-6" @submit.prevent="sendEmail">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <Label
                            for="name"
                            class="block text-sm font-semibold mb-2"
                        >
                            Nama Lengkap *
                        </Label>
                        <Input
                            type="text"
                            id="name"
                            required
                            class="p-6"
                            placeholder="John Doe"
                            v-model="form.name"
                        />
                    </div>

                    <div>
                        <Label
                            for="email"
                            class="block text-sm font-semibold mb-2"
                        >
                            Email *
                        </Label>
                        <Input
                            type="email"
                            id="email"
                            required
                            class="p-6"
                            placeholder="john@example.com"
                            v-model="form.email"
                        />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <Label
                            for="phone"
                            class="block text-sm font-semibold mb-2"
                        >
                            Nomor Telepon *
                        </Label>
                        <Input
                            type="number"
                            id="email"
                            required
                            class="p-6 [&::-webkit-inner-spin-button]:appearance-none"
                            placeholder="+62 812-3456-7890"
                            v-model="form.telephone"
                        />
                    </div>

                    <div>
                        <Label
                            for="subject"
                            class="block text-sm font-semibold mb-2"
                        >
                            Subjek *
                        </Label>
                        <Select v-model="form.subject">
                            <SelectTrigger class="w-full p-6">
                                <SelectValue placeholder="Pilih Subjek" />
                            </SelectTrigger>
                            <SelectContent class="w-full">
                                <SelectGroup>
                                    <SelectLabel>Subject</SelectLabel>
                                    <SelectItem
                                        v-for="(item, index) in subjects"
                                        :key="index"
                                        :value="item.label"
                                        class="capitalize cursor-pointer"
                                    >
                                        {{ item.label }}
                                    </SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                    </div>
                </div>

                <div>
                    <Label
                        for="message"
                        class="block text-sm font-semibold mb-2"
                    >
                        Pesan *
                    </Label>
                    <textarea
                        v-model="form.message"
                        id="message"
                        required
                        rows="6"
                        class="dark:bg-zinc-800 placeholder-zinc-400 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"
                        placeholder="Tuliskan pesan Anda di sini..."
                    />
                </div>

                <Button
                    class="w-full bg-blue-600 text-white py-6 rounded-lg hover:bg-blue-700 transition font-semibold text-lg disabled:bg-blue-400 disabled:cursor-not-allowed flex items-center justify-center gap-2"
                >
                    <template v-if="!form.processing">
                        Kirim Pesan
                        <ArrowRightIcon class="w-5 h-5" />
                    </template>

                    <template v-else>
                        Mengirim... <Spinner class="w-5 h-5" />
                    </template>
                </Button>
            </form>
        </div>
    </div>
</template>
