<script setup>
import Sidebar from '../../components/Sidebar.vue';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
const router = useRouter();

const participantes = ref({})

const buscar = ref('')

onMounted(async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/participante');
    participantes.value = response.data.data;
    console.log(response);
  } catch (error) {
    console.error('Error fetching data', error);
  }
});


async function removerParticipante(id) {
  try {
    const response = await axios.delete('http://127.0.0.1:8000/api/participante/' + id);
    if (response) {
      console.error('Participante removido com sucesso');
      window.location.reload();

    }
  } catch (error) {
    console.error('Houve um erro ao remover o participante:', error);
  }

};

const editarParticipante = (id) => {
  router.push({ name: 'ParticipanteFormEdit', params: { id } });
}

const buscarParticipante = () => {
  axios.get('http://127.0.0.1:8000/api/participante?nome=' + buscar.value)
    .then(response => {
      participantes.value = response.data.data;
    })
    .catch(error => {
      console.error('Error fetching data', error);
    });

}

</script>
<template>

  <Sidebar />

  <div class="flex flex-col top-3.5 sm:ml-64 relative overflow-x-auto pr-10">
    <h1
      class="mx-4 col-span-12 text-3xl text-green-900 dark:text-white pb-1 mb-4 space-y-2 font-medium border-b border-green-300 dark:border-green-700">
      Participante</h1>

    <div class="flex justify-between">



      <div class="mx-4 flex space-y-4 sm:space-y-0 justify-start">
        <label for="table-search" class="mb-2 text-sm font-medium text-green-900 sr-only dark:text-white">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-5 h-5 text-green-500 dark:text-green-400" aria-hidden="true" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text" id="table-search" v-model="buscar" @keyup.enter="buscarParticipante"
            class="mr-20 block w-full p-4 ps-10 text-sm text-green-900 border border-green-300 rounded-lg bg-green-50 focus:ring-green-500 focus:border-green-500 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
            placeholder="Busque pelo nome">
          <button
            class="text-white absolute end-2.5 bottom-2.5 bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800"
            @click="buscarParticipante">Buscar</button>
        </div>
      </div>
      <div class="mx-4">
        <router-link to="/participante/form">
          <button type="button"
            class="px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-800">
            Cadastrar
          </button>
        </router-link>
      </div>
    </div>
    <div class="m-4 rounded-lg overflow-hidden border border-green-500">
      <table class="w-full text-sm text-left rtl:text-right text-green-500 dark:text-green-400">
        <thead class="text-xs text-green-700 uppercase bg-green-50 dark:bg-green-500 dark:text-green-50">
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
            <th scope="col" class="px-6 py-3" style="width:3%">

            </th>
            <th scope="col" class="px-6 py-3" style="width:3%">

            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(participante) in participantes" :key="participante.id"
            class="bg-white border-b dark:bg-green-800 dark:border-green-500 hover:bg-green-50 dark:hover:bg-green-600">
            <td class="px-6 py-4 font-semibold text-green-900 dark:text-white">
              {{ participante.nome }}
            </td>
            <td class="px-6 py-4 font-semibold text-green-900 dark:text-white">
              {{ participante.tipo }}
            </td>
            <td class="px-6 py-4 font-semibold text-green-900 dark:text-white">
              {{ participante.documento }}
            </td>
            <td class="px-6 py-4 font-semibold text-green-900 dark:text-white">
              {{ participante.email }}
            </td>
            <td class="px-6 py-4 font-semibold text-green-900 dark:text-white">
              <button type="button" @click="editarParticipante(participante.id)">Editar</button>
            </td>
            <td class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
              <button @click="removerParticipante(participante.id)" class="focus:outline-none">
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
