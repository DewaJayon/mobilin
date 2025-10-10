<script setup>
import {
    Pagination,
    PaginationContent,
    PaginationEllipsis,
    PaginationItem,
    PaginationNext,
    PaginationPrevious,
} from "@/Components/ui/pagination";
import { computed } from "vue";

const props = defineProps({
    carsPagination: {
        type: Object,
    },
});

const pagination = computed(() => props.carsPagination);
</script>

<template>
    <Pagination
        v-slot="{ page }"
        :items-per-page="pagination?.per_page"
        :total="pagination?.total"
        :default-page="pagination?.current_page"
    >
        <PaginationContent v-slot="{ items }">
            <PaginationPrevious
                class="border dark:border-zinc-600"
                :disabled="!pagination?.prev_page_url"
                @click="$inertia.visit(pagination?.prev_page_url)"
            />
            <template v-for="(item, index) in items" :key="index">
                <PaginationItem
                    class="w-full p-4"
                    v-if="item.type === 'page'"
                    :value="item.value"
                    :is-active="item.value === page"
                    :disabled="item.value === page"
                    @click="
                        $inertia.get(route('catalog'), { page: item.value })
                    "
                >
                    {{ item.value }}
                </PaginationItem>
            </template>
            <PaginationEllipsis :index="4" />
            <PaginationNext
                class="border dark:border-zinc-600"
                :disabled="!pagination?.next_page_url"
                @click="$inertia.visit(pagination?.next_page_url)"
            />
        </PaginationContent>
    </Pagination>
</template>
