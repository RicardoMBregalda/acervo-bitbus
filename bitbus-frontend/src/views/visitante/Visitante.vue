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
          class="px-6 py-3.5 text-base font-medium text-teal-700 inline-flex items-center bg-teal-200 hover:bg-teal-400 focus:ring-4 focus:outline-none focus:ring-teal-100 rounded-lg text-center dark:bg-teal-600 dark:hover:bg-teal-800 dark:focus:ring-teal-800">
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

  </div>

</template>
