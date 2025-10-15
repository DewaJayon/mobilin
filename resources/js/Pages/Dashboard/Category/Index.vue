<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { Separator } from "@/Components/ui/separator";
import { DataTable } from "@/Components/ui/data-table";
import CategoryCreateForm from "./Form/CategoryCreateForm.vue";

import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/Components/ui/breadcrumb";
import { categoryColumn } from "./Partials/categoryColumn";

const props = defineProps({
    carCategories: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head>
        <title>Dashboard</title>
    </Head>

    <DashboardLayout>
        <template #breadcrumb>
            <Breadcrumb>
                <BreadcrumbList>
                    <BreadcrumbItem>
                        <Link :href="route('dashboard.user.index')">
                            <BreadcrumbLink> Dashboard </BreadcrumbLink>
                        </Link>
                    </BreadcrumbItem>
                    <BreadcrumbSeparator />
                    <BreadcrumbItem>
                        <BreadcrumbPage> User </BreadcrumbPage>
                    </BreadcrumbItem>
                </BreadcrumbList>
            </Breadcrumb>
        </template>

        <div class="flex flex-1 flex-col gap-4 p-4">
            <div class="rounded-xl bg-muted/50 h-full p-4">
                <div class="flex justify-between items-center">
                    <h4 class="font-semibold">User</h4>
                    <CategoryCreateForm />
                </div>
                <Separator class="my-4" />

                <div class="mt-4">
                    <DataTable
                        :data="carCategories.data"
                        :columns="categoryColumn"
                        :route-name="'dashboard.category.index'"
                        :pagination="carCategories"
                    />
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
