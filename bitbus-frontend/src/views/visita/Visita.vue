<script setup>
import Sidebar from '../../components/Sidebar.vue';

const visitas = [
  {
    id: 1,
    organizador: "Ricardo",
    cidade: "Bento Gonçalves",
    descricao: "Primeira visita",
    numParticipantes: "70"
  },
  {
    id: 2,
    organizador: "Lorenzo",
    cidade: "PF",
    descricao: "Segunda visita",
    numParticipantes: "30"
  },
  {
    id: 3,
    organizador: "Alan",
    cidade: "PF",
    descricao: "Terceira visita",
    numParticipantes: "50"
  },
]

</script>

<template>

  <Sidebar />

  <div class="flex flex-col top-3.5 sm:ml-64 relative overflow-x-auto pr-10">

    <div class="flex justify-end mx-4">
      <router-link to="/visita/form">
        <button type="button"
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
              Descricao
            </th>
            <th scope="col" class="px-6 py-3">
              Organizador
            </th>
            <th scope="col" class="px-6 py-3">
              Cidade
            </th>
            <th scope="col" class="px-6 py-3">
              N Participantes
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(visita) in visitas" :key="visita.id"
            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visita.descricao }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visita.organizador }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visita.cidade }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ visita.numParticipantes }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</template>
