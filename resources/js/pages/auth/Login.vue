<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <Head title="Wardrobe Management - Login" />

        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white">
                Wardrobe Management Platform
            </h1>
            <p class="text-sm text-center text-gray-500 dark:text-gray-400 mt-2">
                Manage your wardrobe effortlessly.
            </p>

            <div v-if="status" class="mt-4 text-sm font-medium text-green-600 dark:text-green-400">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="mt-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input
                        id="email"
                        type="email"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    />
                    <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
                </div>

                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    />
                    <p v-if="form.errors.password" class="mt-1 text-sm text-red-600">{{ form.errors.password }}</p>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" v-model="form.remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>

                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-sm text-indigo-600 hover:underline dark:text-indigo-400"
                    >
                        Forgot password?
                    </Link>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full mt-6 p-2 bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700 disabled:opacity-50"
                >
                    Log in
                </button>

                <p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account?
                    <Link :href="route('register')" class="text-indigo-600 hover:underline dark:text-indigo-400">
                        Register here
                    </Link>
                </p>
            </form>

            <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                Made by Alfred
            </p>
        </div>
    </div>
</template>
