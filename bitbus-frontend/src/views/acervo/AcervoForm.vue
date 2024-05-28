<script setup>
import { ref } from 'vue';
import Sidebar from '../../components/Sidebar.vue';

const links = ref([]);
const novoLink = ref('');

const adicionarLink = () => {
    if (novoLink.value) {
        links.value.push({
            link: novoLink.value,
        });
        novoLink.value = '';
    } else {
        alert('Por favor, preencha o Link');
    }
};

const removerLink = (index) => {
    links.value.splice(index, 1);
};

</script>

<template>

    <Sidebar />

    <div class="p-10 sm:ml-64 relative overflow-x-auto ">

        <div class="max-w-5xl grid mx-auto grid-cols-12">
            <h1 class="col-span-12 text-3xl text-teal-900 dark:text-white mb-5">Cadastrar Produto</h1>

            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white mb-5">Dados Gerais</h2>

            <div class="mb-5  col-span-8">
                <label for="organizador"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Descrição</label>
                <input type="text" id="organizador"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Descrição do Produto" required />
            </div>

            <div class="mb-5  ml-5 col-span-3">
                <label for="codigo" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Código</label>
                <input type="text" id="codigo"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Código" required />
            </div>

            <div class="mb-5 ml-5 col-span-">
                <label for="Quantidade" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Ano</label>
                <input type="text" id="ano"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Ano" required />
            </div>


            <div class="mb-5 col-span-12">
                <label for="tipo" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Tipo</label>
                <select id="tipo"
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="">Selecione...</option>


                </select>
            </div>

            <div class="mb-5 col-span-12">
                <label for="informacoes"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Informações</label>
                <textarea id="informacoes" rows="4"
                    class="block p-2.5 w-full text-sm text-teal-900 bg-teal-50 rounded-lg border border-teal-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    placeholder="Descreva o produto..."></textarea>

            </div>

            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white mb-5">Estoque e Dimensões</h2>

            <div class="mb-5 col-span-2">
                <label for="quantidade"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Quantidade</label>
                <input type="number" id="quantidade"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Quantidade" required />
            </div>

            <div class="mb-5 ml-5 col-span-3">
                <label for="lical" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Local de
                    Armazenamento</label>
                <input type="local" id="local"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Local de Armazenamento" required />
            </div>

            <div class="mb-5 ml-5 col-span-2 ">
                <label for="comprimento"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Comprimento</label>
                <input type="text" id="comprimento"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Comprimento" />
            </div>
            <div class="mb-5 ml-5 col-span-2">
                <label for="organizador"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Largura</label>
                <input type="text" id="organizador"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Largura" />
            </div>
            <div class="mb-5 ml-5 col-span-2">
                <label for="organizador"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Altura</label>
                <input type="text" id="organizador"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Altura" />
            </div>






            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white mb-5">Imagens</h2>

            <!-- Imagens internas (anexos brutos) ???? -->

            <div class="col-span-12 relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                <label for="links" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Imagens
                    Externas</label>
                <table class="table-auto w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
                    <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Link</th>
                            <th scope="col" class="px-6 py-3 " style="width:3%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for=" (link, index) in links" :key="index"
                            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ link.link }}
                            </th>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                <button @click="removerLink(index)" class="focus:outline-none">
                                    <svg class="mx-auto w-[16px] h-[16px] text-red-600 hover:text-red-900"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
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
            <div class="mb-5 col-span-10">
                <label for="novoLink" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Link</label>
                <input type="text" id="novoCodigo" v-model="novoLink"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Link das imagens externas" />
            </div>
            <div class="mb-5 ml-5 mt-7 col-span-2">
                <button type="button" @click="adicionarLink"
                    class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                    Adicionar
                </button>
            </div>
            <button type="submit"
                class="mt-6 col-span-12 text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                Salvar
            </button>
        </div>
    </div>

</template>
