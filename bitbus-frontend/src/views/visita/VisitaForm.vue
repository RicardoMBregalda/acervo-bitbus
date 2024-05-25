<script setup>
import { ref } from 'vue';
import QuantityInput from '../../components/QuantityInput.vue';
import Sidebar from '../../components/Sidebar.vue';

// Estado reativo para armazenar a lista de produtos
const produtos = ref([
    { codigo: 243, descricao: 'produto para testar a listagem', quantidade: 2 }
]);
const visitantes = ref([
    { nome: "Ricardo Bregalda", tipo: "PF", documento: "21312313123" }
]);
// Estados reativos pa;ra os campos de entrada
const novoCodigo = ref('');
const novaDescricao = ref('');
const novaQuantidade = ref('');

const novoNome = ref('');
const novoTipo = ref('');
const novoDocumento = ref('');

// Função para adicionar um novo produto à lista
const adicionarProduto = () => {
    if (novoCodigo.value && novaDescricao.value && novaQuantidade.value) {
        produtos.value.push({
            codigo: novoCodigo.value,
            descricao: novaDescricao.value,
            quantidade: parseInt(novaQuantidade.value, 10)
        });
        // Limpar os campos de entrada após adicionar o produto
        novoCodigo.value = '';
        novaDescricao.value = '';
        novaQuantidade.value = '';
    } else {
        alert('Por favor, preencha todos os campos.');
    }
};

// Função para adicionar um novo visitante à lista
const adicionarVisitante = () => {
    if (novoNome.value && novoTipo.value && novoDocumento.value) {
        visitantes.value.push({
            nome: novoNome.value,
            tipo: novoTipo.value,
            documento: novoDocumento.value,
        });
        // Limpar os campos de entrada após adicionar o visitante
        novoNome.value = '';
        novoTipo.value = '';
        novoDocumento.value = '';
    } else {
        alert('Por favor, preencha todos os campos.');
    }
};

// Função para remover um produto da lista com base no índice
const removerProduto = (index) => {
    produtos.value.splice(index, 1);
};
// Função para remover um visitante da lista com base no índice

const removerVisitante = (index) => {
    visitantes.value.splice(index, 1);
};

</script>

<template>
    <Sidebar />
    <div class="p-10 sm:ml-64 relative overflow-x-auto ">
        <h1 class=" text-3xl text-teal-900 dark:text-white mb-5"> Cadastrar Visita</h1>
        <div class="max-w-mg grid mx-auto grid-cols-12">
            <div class="mb-5 col-span-12">
                <label for="organizador"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Organizador</label>
                <input type="text" id="organizador"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Fulano de Tal" required />
            </div>
            <div class="mb-5 col-span-1">
                <label for="estado" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Estado</label>
                <select id="estado"
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="">Selecione...</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
            <div class="mb-5 ml-5 col-span-11">
                <label for="cidade" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Cidade</label>
                <input type="cidade" id="cidade"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    required />
            </div>

            <div class="mb-5 col-span-12">
                <label for="endereco"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Endereço</label>
                <input type="endereco" id="endereco"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    required />
            </div>

            <div class="mb-5 col-span-12">
                <label for="descricao"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Descrição</label>
                <textarea id="descricao" rows="4"
                    class="block p-2.5 w-full text-sm text-teal-900 bg-teal-50 rounded-lg border border-teal-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    placeholder="Descreva a visita..."></textarea>

            </div>

            <!-- Tabela de produtos -->
            <div class="col-span-12 relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                <label for="produtos"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Produtos</label>
                <table class="table-auto w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
                    <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" style="width: 10%">Código</th>
                            <th scope=" col" class="px-6 py-3">Descrição</th>
                            <th scope="col" class="px-6 py-3" style="width: 20%">Quantidade</th>
                            <th scope="col" class="px-6 py-3 " style="width:3%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for=" (produto, index) in produtos" :key="index"
                            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ produto.codigo }}
                            </th>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ produto.descricao }}
                            </td>
                            <td class="px- py-4">
                                <QuantityInput :initialQuantity="produto.quantidade" />
                            </td>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                <button @click="removerProduto(index)" class="focus:outline-none">
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
            <!-- Campos para adicionar novo produto -->
            <div class="mb-5 col-span-1">
                <label for="novoCodigo"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Código</label>
                <input type="text" id="novoCodigo" v-model="novoCodigo"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Código do Produto" />
            </div>
            <div class="mb-5 ml-5 col-span-9">
                <label for="novaDescricao"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Descrição</label>
                <input type="text" id="novaDescricao" v-model="novaDescricao"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Descrição do Produto" />
            </div>
            <div class="mb-5 ml-5 col-span-1">
                <label for="novaQuantidade"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Quantidade</label>
                <input type="number" id="novaQuantidade" v-model="novaQuantidade"
                    class="all:unset appearance-none shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Qtd" />
            </div>
            <div class="mb-5 ml-5 mt-7 col-span-1">
                <button type="button" @click="adicionarProduto"
                    class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                    Adicionar
                </button>
            </div>

            <div class="col-span-12 relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                <label for="produtos"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Visitantes</label>
                <table class="table-auto w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
                    <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nome</th>
                            <th scope="col" class="px-6 py-3" style="width: 10%">Tipo</th>
                            <th scope="col" class="px-6 py-3" style="width: 20%">CPF/CNPJ</th>
                            <th scope="col" class="px-6 py-3 " style="width:3%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for=" (visitante, index) in visitantes" :key="index"
                            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ visitante.nome }}
                            </th>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ visitante.tipo }}
                            </td>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ visitante.documento }}
                            </td>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                <button @click="removerVisitante(index)" class="focus:outline-none">
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
            <!-- Campos para adicionar novo produto -->
            <div class="mb-5 col-span-7">
                <label for="novoNome" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Nome</label>
                <input type="text" id="novoNome" v-model="novoNome"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Nome do Visitante" />
            </div>
            <div class="mb-5 ml-5 col-span-1">
                <label for="novoTipo" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Tipo</label>
                <select id="countries " v-model="novoTipo"
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    >
                    <option value="PF">PF</option>
                    <option value="PJ">PJ</option>
                </select>
            </div>
            <div class="mb-5 ml-5 col-span-3">
                <label for="novoDocumento"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">CPF/CPNJ</label>
                <input id="novoDocumento" v-model="novoDocumento"
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block  w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    placeholder="CPF/CNPJ" />
            </div>
            <div class="mb-5 ml-5 mt-7 col-span-1">
                <button type="button" @click="adicionarVisitante"
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
