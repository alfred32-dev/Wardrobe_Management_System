<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white">
                Wardrobe Management Platform
            </h1>
            <p class="text-sm text-center text-gray-500 dark:text-gray-400 mt-2">
                A platform designed to help you organize, manage, and categorize your wardrobe effortlessly.
            </p>

            <div class="mt-6 text-center">
                <p class="text-lg font-semibold text-gray-800 dark:text-white">
                    🔹 Project for Recruitment at Uzapoint Limited
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Developed by <span class="font-medium text-indigo-600 dark:text-indigo-400">Alfred Gaitho Kangethe</span>
                </p>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">For inquiries, reach me at:</p>
                <a
                    href="mailto:bytedev32@gmail.com"
                    class="text-indigo-600 hover:underline dark:text-indigo-400"
                >
                    bytedev32@gmail.com
                </a>
            </div>

            <div class="mt-6 flex flex-col space-y-3">
                <Link
                    v-if="canLogin"
                    :href="route('login')"
                    class="w-full p-2 text-center bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700"
                >
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="w-full p-2 text-center bg-gray-600 text-white rounded-md font-semibold hover:bg-gray-700"
                >
                    Register
                </Link>
            </div>

            <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                Made by Alfred Gaitho Kangethe
            </p>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>
