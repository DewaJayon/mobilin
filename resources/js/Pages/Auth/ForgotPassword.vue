<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Button } from "@/Components/ui/button";

import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";
import Spinner from "@/Components/ui/spinner/Spinner.vue";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <GuestLayout>
        <Head>
            <title>Lupa Password</title>
        </Head>

        <div class="flex items-center justify-center min-h-screen">
            <Card class="rounded-xl w-full max-w-md relative z-10">
                <CardHeader class="text-center mb-3">
                    <CardTitle class="text-3xl font-bold">
                        Lupa Password
                    </CardTitle>
                    <CardDescription>
                        Lupa kata sandi? Tidak masalah. Cukup beri tahu kami
                        alamat email Anda dan kami akan mengirimkan tautan untuk
                        menyetel ulang kata sandi melalui email yang akan
                        memungkinkan Anda memilih kata sandi baru.
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <div
                        v-if="status"
                        class="mb-4 text-sm font-medium text-green-600"
                    >
                        {{ status }}
                    </div>

                    <form @submit.prevent="submit">
                        <div>
                            <Label for="email" value="Email" />

                            <Input
                                id="email"
                                type="email"
                                class="w-full h-11 py-3"
                                v-model="form.email"
                                required
                                autofocus
                                placeholder="Email"
                                autocomplete="off"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <Button
                                class="w-full"
                                :class="{ 'opacity-50': form.processing }"
                                :disabled="form.processing"
                            >
                                <Spinner
                                    v-if="form.processing"
                                    class="w-5 h-5"
                                />
                                Email Password Reset Link
                            </Button>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    </GuestLayout>
</template>
