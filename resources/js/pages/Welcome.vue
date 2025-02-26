<template>
    <div>
      <h1 class="text-3xl font-bold">Welcome to My App</h1>
      <p v-if="canLogin"><a href="http://localhost:8000/login">Login</a></p>
      <p v-if="canRegister"><a href="/register">Register</a></p>
    </div>
  </template>
  
  <script setup>
  defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
  });
  </script>
  