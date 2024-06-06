<script setup>
import Sidebar from '../../components/Sidebar.vue';
import axios from 'axios';
import { ref, onMounted } from 'vue';

const acervos = ref({})

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/produto');
    acervos.value = response.data.data;
    console.log(response);
  } catch (error) {
    console.error('Error fetching data', error);
  }
});

async function removerProduto(id) {
  try {
    const response = await axios.delete('http://localhost:8000/api/produto/' + id);
    if (response) {
      console.error('Produto removido com sucesso');
      window.location.reload();

    }
  } catch (error) {
    console.error('Houve um erro ao remover o produto:', error);
  }

};


</script>

<template>

  <Sidebar />

  <div class="flex flex-col top-3.5 sm:ml-64 relative overflow-x-auto pr-10">

    <div class="flex justify-end mx-4">
      <router-link to="/acervo/form">
        <button type="button"
          class="px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 rounded-lg text-center dark:bg-teal-600 dark:hover:bg-teal-800 dark:focus:ring-teal-800">
          Cadastrar
        </button>
      </router-link>
    </div>

    <div class="mx-4 flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between ">
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
              imagem
            </th>
            <th scope="col" class="px-6 py-3">
              Codigo
            </th>
            <th scope="col" class="px-6 py-3">
              Descrição
            </th>
            <th scope="col" class="px-6 py-3">
              Tipo
            </th>
            <th scope="col" class="px-6 py-3">
              Quantidade
            </th>
            <th scope="col" class="px-6 py-3">
              Ano
            </th>
            <th scope="col" class="px-6 py-3" style="width:3%">
            </th>

          </tr>
        </thead>
        <tbody>
          <tr v-for="(acervo) in acervos" :key="acervo.id"
            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
            <td class="w-4 p-4">
              <div class="flex items-center">
                <input id="checkbox-table-search-1" type="checkbox"
                  class="w-4 h-4 text-teal-600 bg-teal-100 border-teal-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-teal-800 dark:focus:ring-offset-teal-800 focus:ring-2 dark:bg-teal-700 dark:border-teal-600">
                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
              </div>
            </td>
            <td class="p-4">
              <img :src="acervo.imagem" class="w-16 md:w-32 max-w-full max-h-full" alt="">
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ acervo.codigo }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ acervo.mome }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ acervo.tipo }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ acervo.quantidade }}
            </td>
            <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
              {{ acervo.ano }}
            </td>
            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
              <button @click="removerProduto(acervo.id)" class="focus:outline-none">
                <svg class="mx-auto w-[16px] h-[16px] text-red-600 hover:text-red-900" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd"
                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                    clip-rule="evenodd" />
                </svg>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>


  </div>

</template>
