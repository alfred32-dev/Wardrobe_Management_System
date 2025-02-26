<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <Head title="Register - Wardrobe Management" />

        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white">
                Wardrobe Management Platform
            </h1>
            <p class="text-sm text-center text-gray-500 dark:text-gray-400 mt-2">
                Organize your wardrobe with ease.
            </p>

            <form @submit.prevent="submit" class="mt-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input
                        id="name"
                        type="text"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    />
                    <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
                </div>

                <div class="mt-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input
                        id="email"
                        type="email"
                        v-model="form.email"
                        required
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
                        autocomplete="new-password"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    />
                    <p v-if="form.errors.password" class="mt-1 text-sm text-red-600">{{ form.errors.password }}</p>
                </div>

                <div class="mt-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    />
                    <p v-if="form.errors.password_confirmation" class="mt-1 text-sm text-red-600">{{ form.errors.password_confirmation }}</p>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full mt-6 p-2 bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700 disabled:opacity-50"
                >
                    Register
                </button>

                <p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
                    Already registered?
                    <Link :href="route('login')" class="text-indigo-600 hover:underline dark:text-indigo-400">
                        Log in here
                    </Link>
                </p>
            </form>

            <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                Made by Alfred
            </p>
        </div>
    </div>
</template>
