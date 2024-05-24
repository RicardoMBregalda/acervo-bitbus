<script setup>
import Sidebar from '../../components/Sidebar.vue';

const acervos = [
  {
    id: 1,
    codigo: "131131",
    nome: "RTX",
    tipo: "Placa de video",
    ano: "Primeira acervo",
    quantidade: "70",
    imagem: ""
  },
  {
    id: 1,
    codigo: "7456",
    nome: "SSD de 500 Gigas",
    tipo: "HDs",
    ano: "2003",
    quantidade: "70",
    imagem: ""
  },
  {
    id: 1,
    codigo: "2342",
    nome: "RTX",
    tipo: "Placa de video",
    ano: "Primeira acervo",
    quantidade: "70",
    imagem: ""
  },
 
  
]

</script>

<template> 

<Sidebar />

<div class="flex flex-col top-3.5 sm:ml-64 relative overflow-x-auto pr-10">
    
  <div class="flex justify-end mx-4">
    <router-link to="/acervo/form">
      <button type="button" class="px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 rounded-lg text-center dark:bg-teal-600 dark:hover:bg-teal-800 dark:focus:ring-teal-800">
        Cadastrar
      </button>
    </router-link>
  </div>

  <div class="m-4 rounded-lg overflow-hidden border border-teal-500">
    <table class="w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
      <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-50">
        <tr>
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
          
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(acervo, index) in acervos"
          :key="acervo.id"
          class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600"
        >
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
        </tr>
      </tbody>
    </table>
  </div>
   
</div>

</template>
