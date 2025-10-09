<script setup>
import { Link } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import HeaderTheme from "./HeaderTheme.vue";
import { Menu, X } from "lucide-vue-next";
import { useToggle } from "@vueuse/core";
import HeaderAccount from "./HeaderAccount.vue";

const [isOpen, toggleOpen] = useToggle(false);
</script>

<template>
    <header
        class="bg-white/80 dark:bg-zinc-900 backdrop-blur-md shadow-lg border-b border-white/20 sticky top-0 z-50 dark:border-zinc-800"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <Link :href="route('home')" class="flex items-center">
                        <img
                            src="img/Mobilin-Logo.png"
                            alt="Mobilin"
                            class="h-12 w-12 mr-2 rounded-full"
                        />
                        <h1
                            class="text-3xl font-bold text-gray-800 dark:text-white"
                        >
                            Mobilin
                        </h1>
                    </Link>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center space-x-8">
                    <Link
                        :href="route('home')"
                        :class="[
                            'font-medium transition-all duration-300 hover:scale-105',
                            route().current('home')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                    >
                        Beranda
                    </Link>
                    <Link
                        :href="route('catalog')"
                        :class="[
                            'font-medium transition-all duration-300 hover:scale-105',
                            route().current('catalog')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                    >
                        Katalog
                    </Link>
                    <Link
                        :href="route('about')"
                        :class="[
                            'font-medium transition-all duration-300 hover:scale-105',
                            route().current('about')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                    >
                        Tentang
                    </Link>
                    <Link
                        :href="route('contact')"
                        :class="[
                            'font-medium transition-all duration-300 hover:scale-105',
                            route().current('contact')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                    >
                        Kontak
                    </Link>
                </nav>

                <!-- Desktop Right -->
                <div class="items-center space-x-2 hidden sm:flex">
                    <Button
                        class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-full hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl dark:shadow-none dark:hover:shadow-lg"
                    >
                        Hubungi Kami
                    </Button>
                    <HeaderTheme />
                    <HeaderAccount />
                </div>

                <!-- Mobile Toggle -->
                <div class="sm:hidden">
                    <button
                        @click="toggleOpen()"
                        class="p-2 text-gray-700 dark:text-white"
                    >
                        <component :is="isOpen ? X : Menu" class="w-6 h-6" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0 -translate-y-4"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-4"
        >
            <div
                v-if="isOpen"
                class="sm:hidden bg-white dark:bg-zinc-900 border-t border-gray-200 dark:border-zinc-800 shadow-lg"
            >
                <div class="px-4 py-4 space-y-3 flex flex-col">
                    <Link
                        :href="route('home')"
                        :class="[
                            'block font-medium transition-colors',
                            route().current('home')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                        @click="toggleOpen(false)"
                    >
                        Beranda
                    </Link>
                    <Link
                        :href="route('catalog')"
                        :class="[
                            'block font-medium transition-colors',
                            route().current('catalog')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                        @click="toggleOpen(false)"
                    >
                        Katalog
                    </Link>
                    <Link
                        :href="route('about')"
                        :class="[
                            'block font-medium transition-colors',
                            route().current('about')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                        @click="toggleOpen(false)"
                    >
                        Tentang
                    </Link>
                    <Link
                        :href="route('contact')"
                        :class="[
                            'block font-medium transition-colors',
                            route().current('contact')
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400',
                        ]"
                        @click="toggleOpen(false)"
                    >
                        Kontak
                    </Link>

                    <div
                        class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-zinc-800"
                    >
                        <Button
                            class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-md"
                            @click="toggleOpen(false)"
                        >
                            Hubungi Kami
                        </Button>
                        <div class="flex items-center space-x-2">
                            <HeaderTheme />
                            <HeaderAccount />
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </header>
</template>
