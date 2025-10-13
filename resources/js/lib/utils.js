import { clsx } from "clsx";
import { twMerge } from "tailwind-merge";

export function cn(...inputs) {
    return twMerge(clsx(inputs));
}

export function valueUpdater(updaterOrValue, ref) {
    ref.value =
        typeof updaterOrValue === "function"
            ? updaterOrValue(ref.value)
            : updaterOrValue;
}

export const formatPrice = (price) =>
    new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(price);

export function getCurrentUrlQuery(exclude = []) {
    const params = Object.fromEntries(
        new URLSearchParams(window.location.search)
    );
    exclude.forEach((key) => {
        delete params[key];
    });
    return params;
}

export function filterMenuByRole(menu, role) {
    return menu.filter((item) => item.roles.includes(role));
}
