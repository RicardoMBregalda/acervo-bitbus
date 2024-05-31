<script setup>
import Sidebar from '../../components/Sidebar.vue';

const visitantes = [
  {
    id: 1,
    nome: "Lorenzo",
    tipo: "PF",
    documento: "000.111.222-33",
    email: "lorenzo@email.com"
  },
  {
    id: 2,
    nome: "Ricardo",
    tipo: "PF",
    documento: "000.111.222-33",
    email: "ricardo@email.com"
  },
  {
    id: 3,
    nome: "Alan",
    tipo: "PF",
    documento: "000.111.222-33",
    email: "alan@email.com"
  },
  {
    id: 4,
    nome: "Fraca",
    tipo: "PJ",
    documento: "000.111.222-33",
    email: "fraca@email.com"
  },
]

</script>

<template>

  <Sidebar />

  <div class="flex flex-col top-3.5 sm:ml-64 relative overflow-x-auto pr-10">

    <div class="flex justify-end mx-4">
      <router-link to="/visitante/form">
        <button type="button"
          class="px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 rounded-lg text-center dark:bg-teal-600 dark:hover:bg-teal-800 dark:focus:ring-teal-800">
          Cadastrar
        </button>
      </router-link>
    </div>

    <div class="mx-4 flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between">
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-5 h-5 text-teal-500 dark:text-teal-400" aria-hidden="true" fill="currentColor"
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"></path>
          </svg>
        </div>
        <input type="text" id="table-search"
          class="block p-2 ps-10 text-sm text-teal-900 border border-teal-300 rounded-lg w-80 bg-teal-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
          placeholder="Search for items">
      </div>
    </div>
    <div class="m-4 rounded-lg overflow-hidden border border-teal-500">
      <table class="w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
        <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-50">
          <tr>
            <th scope="col" class="p-4">
              <div class="flex items-center">
                <input id="checkbox-all-search" type="checkbox"
                  class="w-4 h-4 text-teal-600 bg-teal-100 border-teal-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-teal-800 dark:focus:ring-offset-teal-800 focus:ring-2 dark:bg-teal-700 dark:border-teal-600">
                <label for="checkbox-all-search" class="sr-only">checkbox</label>
              </div>
            </th>
            <th scope="col" class="px-6 py-3">
              Nome
            </th>
            <th scope="col" class="px-6 py-3">
              Tipo
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
          <tr v-for="(visitante) in visitantes" :key="visitante.id"
            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
            <td class="w-4 p-4">
              <div class="flex items-center">
                <input id="checkbox-table-search-1" type="checkbox"
                  class="w-4 h-4 text-teal-600 bg-teal-100 border-teal-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-teal-800 dark:focus:ring-offset-teal-800 focus:ring-2 dark:bg-teal-700 dark:border-teal-600">
                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
              </div>
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visitante.nome }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visitante.tipo }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visitante.documento }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visitante.email }}
            </td>
          </tr>
        </tbody>
      </table>

    </div>
    <nav class="mx-4 flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
      aria-label="Table navigation">
      <span
        class=" text-sm font-normal text-teal-500 dark:text-teal-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
        <span class="font-semibold text-teal-900 dark:text-white">1-10</span> of <span
          class="font-semibold text-teal-900 dark:text-white">1000</span></span>
      <ul class=" inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
        <li>
          <a href="#"
            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-teal-500 bg-white border border-teal-300 rounded-s-lg hover:bg-teal-100 hover:text-teal-700 dark:bg-teal-800 dark:border-teal-700 dark:text-teal-400 dark:hover:bg-teal-700 dark:hover:text-white">Previous</a>
        </li>
        <li>
          <a href="#"
            class="flex items-center justify-center px-3 h-8 leading-tight text-teal-500 bg-white border border-teal-300 hover:bg-teal-100 hover:text-teal-700 dark:bg-teal-800 dark:border-teal-700 dark:text-teal-400 dark:hover:bg-teal-700 dark:hover:text-white">1</a>
        </li>
        <li>
          <a href="#"
            class="flex items-center justify-center px-3 h-8 leading-tight text-teal-500 bg-white border border-teal-300 hover:bg-teal-100 hover:text-teal-700 dark:bg-teal-800 dark:border-teal-700 dark:text-teal-400 dark:hover:bg-teal-700 dark:hover:text-white">2</a>
        </li>
        <li>
          <a href="#" aria-current="page"
            class="flex items-center justify-center px-3 h-8 text-teal-600 border border-teal-300 bg-teal-50 hover:bg-teal-100 hover:text-teal-700 dark:border-teal-700 dark:bg-teal-700 dark:text-white">3</a>
        </li>
        <li>
          <a href="#"
            class="flex items-center justify-center px-3 h-8 leading-tight text-teal-500 bg-white border border-teal-300 hover:bg-teal-100 hover:text-teal-700 dark:bg-teal-800 dark:border-teal-700 dark:text-teal-400 dark:hover:bg-teal-700 dark:hover:text-white">4</a>
        </li>
        <li>
          <a href="#"
            class="flex items-center justify-center px-3 h-8 leading-tight text-teal-500 bg-white border border-teal-300 hover:bg-teal-100 hover:text-teal-700 dark:bg-teal-800 dark:border-teal-700 dark:text-teal-400 dark:hover:bg-teal-700 dark:hover:text-white">5</a>
        </li>
        <li>
          <a href="#"
            class="flex items-center justify-center px-3 h-8 leading-tight text-teal-500 bg-white border border-teal-300 rounded-e-lg hover:bg-teal-100 hover:text-teal-700 dark:bg-teal-800 dark:border-teal-700 dark:text-teal-400 dark:hover:bg-teal-700 dark:hover:text-white">Next</a>
        </li>
      </ul>
    </nav>
  </div>

</template>
