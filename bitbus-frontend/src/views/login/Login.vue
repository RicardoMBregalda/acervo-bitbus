<script setup>
import { ref } from 'vue';
import axios from 'axios';
import {  useRouter } from 'vue-router';

const router = useRouter();

const username = ref('');
const password = ref('');

const login = async () => {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/login', {
      username: username.value,
      password: password.value
    });
    localStorage.setItem('token', response.data.token);
    router.push({ name: 'Home' });
  } catch (error) {
    console.error('Login falhou:', error);
  }
};
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
      <div class="flex flex-col items-center mb-6">
        <img src="../../assets/logo-bitbus_3.png" class="h-8 mb-3" alt="Bit Bus Logo" />
        <h1 class="text-2xl font-bold text-center">Login</h1>
      </div>
      <form @submit.prevent="login">
        <div class="mb-4">
          <label class="block text-gray-700 mb-2">Usuário:</label>
          <input type="text" id="username" v-model="username"
            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
            placeholder="Usuário" required />
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 mb-2">Password:</label>
          <input type="password" id="password" v-model="password"
            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
            placeholder="Senha" required />
        </div>
        <div class="flex justify-center items-center">
          <button type="submit"
            class="w-1/2 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</template>