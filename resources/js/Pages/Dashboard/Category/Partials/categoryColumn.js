import { h } from "vue";
import CategoryActionRow from "./CategoryActionRow.vue";

export const categoryColumn = [
    {
        accessorKey: "name",
        header: h("div", { class: "flex " }, "Nama"),
    },

    {
        accessorKey: "description",
        header: h("div", { class: "flex" }, "Deskripsi"),
    },
    {
        accessorKey: "action",
        header: h("div", { class: "flex" }, "Aksi"),
        cell: ({ row }) => h(CategoryActionRow, { row: row.original }),
    },
];
