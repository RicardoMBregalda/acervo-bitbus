<script setup>
import Sidebar from '../../components/Sidebar.vue';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const feedbacks = ref({})
const buscar = ref('')

onMounted(async () => {
    try {
        const response = await axios.get('http://127.0.0.1:8000/api/feedback');
        feedbacks.value = response.data.data;
    } catch (error) {
        console.error('Error fetching data', error);
    }
});


const buscarFeedback = () => {
    axios.get('http://127.0.0.1:8000/api/feedback?avaliacao=' + buscar.value)
        .then(response => {
            feedbacks.value = response.data.data;
        })
        .catch(error => {
            console.error('Error fetching data', error);
        });
}

</script>

<template>

    <Sidebar />

    <div class="flex flex-col top-3.5 sm:ml-64 relative overflow-x-auto pr-10">


        <!-- Deixei para testes, versão final vamos tirar esse campo  -->
        <div class="flex justify-end mx-4">
            <router-link to="/feedback/form">
                <button type="button"
                    class="px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 rounded-lg text-center dark:bg-teal-600 dark:hover:bg-teal-800 dark:focus:ring-teal-800">
                    Cadastrar
                </button>
            </router-link>
        </div>

        <div class="mx-4 flex space-y-4 sm:space-y-0 justify-start">
            <label for="table-search"
                class="mb-2 text-sm font-medium text-teal-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-teal-500 dark:text-teal-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search" v-model="buscar" @keyup.enter="buscarFeedback"
                    class="mr-20 block w-full p-4 ps-10 text-sm text-teal-900 border border-teal-300 rounded-lg bg-teal-50 focus:ring-teal-500 focus:border-teal-500 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    placeholder="Busque pela avaliação">
                <button
                    class="text-white absolute end-2.5 bottom-2.5 bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                    @click="buscarFeedback">Buscar</button>
            </div>
        </div>

        <div class="m-4 rounded-lg overflow-hidden border border-teal-500">
            <table class="w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
                <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-50">

                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Avaliação
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descrição
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(feedback) in feedbacks" :key="feedback.id"
                        class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">

                        <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
                            {{ feedback.nome }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
                            {{ feedback.email }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
                            {{ feedback.avaliacao }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-teal-900 dark:text-white">
                            {{ feedback.descricao }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

</template>
