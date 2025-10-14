<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { Separator } from "@/Components/ui/separator";
import { DataTable } from "@/Components/ui/data-table";
import { userColumns } from "./Partials/userColumn";

import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/Components/ui/breadcrumb";
import UserCreateForm from "./Form/UserCreateForm.vue";

const props = defineProps({
    users: {
        type: Object,
        required: true,
    },
});

console.log(props.users);
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
                    <UserCreateForm />
                </div>
                <Separator class="my-4" />

                <div class="mt-4">
                    <DataTable
                        :data="users.data"
                        :columns="userColumns"
                        :route-name="'dashboard.user.index'"
                        :pagination="users"
                    />
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
