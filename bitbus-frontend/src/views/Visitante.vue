<script setup>
import Sidebar from '../components/Sidebar.vue'

</script>

<template>

  <Sidebar />


  <div class="top-3.5 sm:ml-64 relative overflow-x-auto">

    <div class="pl-4">
      <router-link to="/cadastrarvisitante">
        <button type="button" @click="$router.push('/cadastrarvisitante')"
          class="px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 rounded-lg text-center dark:bg-teal-600 dark:hover:bg-teal-800 dark:focus:ring-teal-800">
          Cadastrar
        </button>
      </router-link>

    </div>
    <div class="m-4 rounded-lg overflow-hidden border border-teal-500">
      <table class="w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
        <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-50">
          <tr>
            <th scope="col" class="px-6 py-3">
              Nome
            </th>
            <th scope="col" class="px-6 py-3">
              CPF/CNPJ
            </th>
            <th scope="col" class="px-6 py-3">
              Email
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              João Silva
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              123.456.789-00
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              joao.silva@example.com
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              Maria Oliveira
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              987.654.321-11
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              maria.oliveira@fakeemail.com
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              Pedro Souza
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              159.753.486-22
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              pedro.souza@mydomain.net
            </td>
          </tr>
        </tbody>
      </table>
    </div>


  </div>

</template>

<style scoped></style>