<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Mobilin</h3>
                    <p class="text-gray-400">
                        Solusi rental mobil terpercaya untuk perjalanan Anda
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <Link href="#" class="hover:text-white transition">
                                Tentang Kami
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="hover:text-white transition">
                                Karir
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="hover:text-white transition">
                                Blog
                            </Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <Link href="#" class="hover:text-white transition">
                                Sewa Harian
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="hover:text-white transition">
                                Sewa Bulanan
                            </Link>
                        </li>
                        <li>
                            <Link href="#" class="hover:text-white transition">
                                Sewa + Supir
                            </Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: dewajayon3@gmail.com</li>
                        <li>Telepon: +62 812-3456-7890</li>
                        <li>WhatsApp: +62 812-3456-7890</li>
                    </ul>
                </div>
            </div>
            <div
                class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400"
            >
                <p>
                    &copy; {{ new Date().getFullYear() }} Mobilin. All rights
                    reserved.
                </p>
            </div>
        </div>
    </footer>
</template>
