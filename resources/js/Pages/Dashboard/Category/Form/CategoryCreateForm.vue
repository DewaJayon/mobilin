<script setup>
import { Button } from "@/Components/ui/button";
import { Plus } from "lucide-vue-next";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { toast } from "vue-sonner";
import { useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import { Spinner } from "@/Components/ui/spinner";

import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/Components/ui/dialog";
import { Textarea } from "@/Components/ui/textarea";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    name: "",
    description: "",
});

const page = usePage();
const user = page.props.auth.user.name;

const isDialogOpen = ref(false);

const submit = () => {
    form.post(route("dashboard.category.store"), {
        showProgress: false,
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            toast.success(page.props.flash.success, {
                description: `Kategori ${form.name} berhasil ditambahkan oleh ${user}`,
            });
            isDialogOpen.value = false;
        },
        onError: () => {
            toast.error("Kategori gagal ditambahkan");
        },
    });
};
</script>

<template>
    <Dialog v-model:open="isDialogOpen">
        <DialogTrigger as-child>
            <Button variant="outline" class="dark:border-white border-zinc-600">
                <Plus />
                Tambah Kategori
            </Button>
        </DialogTrigger>
        <DialogContent class="sm:max-w-md">
            <DialogHeader>
                <DialogTitle>Form tambah kategori</DialogTitle>
                <DialogDescription>
                    Silahkan isi form dibawah ini untuk menambahkan kategori
                </DialogDescription>
            </DialogHeader>
            <form id="form" @submit.prevent="submit">
                <div class="flex items-center space-x-2">
                    <div class="grid flex-1 gap-2">
                        <Label for="name"> Nama Kategori </Label>
                        <Input
                            id="name"
                            v-model="form.name"
                            placeholder="Masukkan nama kategori"
                            type="text"
                            required
                            autocomplete="off"
                        />
                        <InputError :message="form.errors.name" />
                    </div>
                </div>

                <div class="flex items-center py-3">
                    <div class="grid flex-1 gap-2">
                        <Label for="description">Deskripsi</Label>
                        <Textarea
                            v-model="form.description"
                            id="description"
                            placeholder="Masukkan deskripsi kategori"
                        />
                        <InputError :message="form.errors.description" />
                    </div>
                </div>
            </form>
            <DialogFooter class="flex justify-between">
                <DialogClose as-child>
                    <Button type="button" variant="secondary"> Batal </Button>
                </DialogClose>

                <Button
                    type="submit"
                    form="form"
                    :class="{ 'opacity-25 ': form.processing }"
                    :disabled="form.processing"
                    class="disabled:cursor-not-allowed"
                >
                    <Spinner v-if="form.processing" class="w-5 h-5" />
                    {{ form.processing ? "Loading..." : "Simpan" }}
                </Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>
