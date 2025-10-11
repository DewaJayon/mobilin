<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { Spinner } from "@/Components/ui/spinner";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Eye } from "lucide-vue-next";
import { Button } from "@/Components/ui/button";

import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

const showPassword = (element) => {
    const passwordInput = document.getElementById(element);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
};
</script>

<template>
    <GuestLayout>
        <Head title="Reset Password" />

        <div class="flex items-center justify-center min-h-screen">
            <Card class="rounded-xl w-full max-w-md relative z-10">
                <CardHeader class="text-center mb-3">
                    <CardTitle class="text-3xl font-bold">
                        Reset Password
                    </CardTitle>
                    <CardDescription>
                        Silahkan masukkan kata sandi baru
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <form class="space-y-6" @submit.prevent="submit">
                        <div>
                            <Label for="email"> Email </Label>
                            <Input
                                type="email"
                                id="email"
                                placeholder="Email"
                                v-model="form.email"
                                required
                                autocomplete="off"
                                class="w-full h-11 py-3"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="relative">
                            <Label for="password"> Password </Label>
                            <div class="relative">
                                <Input
                                    type="password"
                                    id="password"
                                    placeholder="••••••••"
                                    v-model="form.password"
                                    required
                                    autocomplete="off"
                                    class="w-full h-11 py-3"
                                />
                                <span
                                    class="absolute right-0 inset-y-0 flex items-center px-3"
                                >
                                    <Eye
                                        class="cursor-pointer"
                                        @click="showPassword('password')"
                                    />
                                </span>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password"
                                />
                            </div>
                        </div>

                        <div class="relative">
                            <Label for="password_confirmation">
                                Konfirmasi Password
                            </Label>
                            <div class="relative">
                                <Input
                                    type="password"
                                    id="password_confirmation"
                                    placeholder="••••••••"
                                    v-model="form.password_confirmation"
                                    required
                                    autocomplete="off"
                                    class="w-full h-11 py-3"
                                />
                                <span
                                    class="absolute right-0 inset-y-0 flex items-center px-3"
                                >
                                    <Eye
                                        class="cursor-pointer"
                                        @click="
                                            showPassword(
                                                'password_confirmation'
                                            )
                                        "
                                    />
                                </span>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password_confirmation"
                                />
                            </div>
                        </div>

                        <Button
                            type="submit"
                            class="w-full"
                            :disabled="form.processing"
                            :class="{ 'opacity-50': form.processing }"
                        >
                            <Spinner v-if="form.processing" class="w-5 h-5" />
                            Reset Password
                        </Button>
                    </form>
                </CardContent>
            </Card>
        </div>
    </GuestLayout>
</template>
