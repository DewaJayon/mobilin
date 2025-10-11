<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import { Button } from "@/Components/ui/button";
import { Card, CardContent } from "@/Components/ui/card";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Eye } from "lucide-vue-next";
import { Spinner } from "@/Components/ui/spinner";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
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
        <Head>
            <title>Register</title>
        </Head>

        <div class="flex flex-col gap-6">
            <Card class="overflow-hidden">
                <CardContent class="grid p-0 md:grid-cols-2">
                    <form class="p-6 md:p-8" @submit.prevent="submit">
                        <div class="flex flex-col gap-6">
                            <div class="flex flex-col items-center text-center">
                                <h1 class="text-2xl font-bold">
                                    Selamat Datang
                                </h1>
                                <p class="text-balance text-muted-foreground">
                                    Silahkan register untuk melanjutkan
                                </p>
                            </div>

                            <div class="grid gap-2">
                                <Label for="name">Nama</Label>
                                <Input
                                    id="name"
                                    type="name"
                                    placeholder="John Doe"
                                    required
                                    v-model="form.name"
                                    autocomplete="name"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div class="grid gap-2">
                                <Label for="email">Email</Label>
                                <Input
                                    id="email"
                                    type="email"
                                    placeholder="m@example.com"
                                    required
                                    v-model="form.email"
                                    autocomplete="email"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>

                            <div class="grid gap-2">
                                <div class="flex items-center">
                                    <Label for="password">Password</Label>
                                </div>
                                <div class="relative">
                                    <Input
                                        id="password"
                                        type="password"
                                        placeholder="••••••••"
                                        v-model="form.password"
                                        required
                                        class="pr-10"
                                        autocomplete="off"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.password"
                                    />

                                    <span
                                        class="absolute right-0 inset-y-0 flex items-center px-3"
                                    >
                                        <Eye
                                            class="cursor-pointer"
                                            @click="showPassword('password')"
                                        />
                                    </span>
                                </div>
                            </div>

                            <div class="grid gap-2">
                                <div class="flex items-center">
                                    <Label for="password_confirmation"
                                        >Konfirmasi Password</Label
                                    >
                                </div>
                                <div class="relative">
                                    <Input
                                        id="password_confirmation"
                                        type="password"
                                        placeholder="••••••••"
                                        v-model="form.password_confirmation"
                                        required
                                        class="pr-10"
                                        autocomplete="off"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="
                                            form.errors.password_confirmation
                                        "
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
                                </div>
                            </div>

                            <Button
                                type="submit"
                                class="w-full"
                                :disabled="form.processing"
                                :class="{ 'opacity-50': form.processing }"
                            >
                                <Spinner
                                    v-if="form.processing"
                                    class="w-5 h-5"
                                />
                                Register
                            </Button>

                            <div class="text-center text-sm">
                                Sudah punya akun?
                                <Link
                                    :href="route('login')"
                                    class="underline underline-offset-4"
                                >
                                    Login
                                </Link>
                            </div>
                        </div>
                    </form>
                    <div class="relative hidden bg-muted md:block">
                        <img
                            src="/img/Mobilin-Logo.png"
                            alt="Mobilin Logo"
                            class="absolute inset-0 h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
                        />
                    </div>
                </CardContent>
            </Card>
        </div>
    </GuestLayout>
</template>
