<template>
  <div>
    <h1 class="text-3xl font-bold">Dashboard</h1>
    <p>Welcome to your account!</p>

    <button @click="logout" class="mt-4 bg-red-600 text-white px-4 py-2 rounded">Logout</button>
  </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

const logout = () => {
  router.post('/logout'); // ✅ Send request to Laravel logout route
};
</script>
