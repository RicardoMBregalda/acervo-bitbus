<script setup>
import { ref } from 'vue';
import QuantityInput from '../../components/QuantityInput.vue';
import Sidebar from '../../components/Sidebar.vue';
import axios from 'axios';
import { onMounted } from 'vue';

const produtosLista = ref([]);
const visitantesLista = ref([]);

const form = ref({
    organizador: '',
    endereco: '',
    cidade: '',
    estado: '',
    descricao: '',
    data_inicio: '',
    data_fim: '',
    produtos: [],
    participantes: [],
});

const novoProduto = ref('');
const novoVisitante = ref('');

const visitanteExistente = ref(false);

const produtos = ref({})
const visitantes = ref({})

const novoNome = ref('');
const novoTipo = ref('');
const novoDocumento = ref('');
const novoEmail = ref('');

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/produto');
    produtos.value = response.data.data;
    const secondResponse = await axios.get('http://localhost:8000/api/participante');
    visitantes.value = secondResponse.data.data;
  } catch (error) {
    console.error('Error fetching data', error);
  }
});

const adicionarProduto = () => {
    if (novoProduto) {
        produtosLista.value.push(novoProduto.value);
        novoProduto.value = {};
    }
};

const adicionarVisitanteExistente = () => {
    if (novoVisitante) {
        visitantesLista.value.push(novoVisitante.value);
        novoVisitante.value = {};
    }
};

const adicionarVisitante = () => {
    if (novoNome.value && novoTipo.value && novoDocumento.value) {
        visitantesLista.value.push({
            nome: novoNome.value,
            tipo: novoTipo.value,
            documento: novoDocumento.value,
            email: novoEmail.value,
        });
        novoNome.value = '';
        novoTipo.value = '';
        novoDocumento.value = '';
        novoEmail.value = '';
    } else {
        alert('Por favor, preencha todos os campos.');
    }
};

const removerProduto = (index) => {
    produtosLista.value.splice(index, 1);
};

const removerVisitante = (index) => {
    visitantesLista.value.splice(index, 1);
};

async function handleSubmit(data) {
    data.produtos = produtosLista.value;
    data.participantes = visitantesLista.value;
    console.log("data",data)
    try {
        const response = await axios.post('http://localhost:8000/api/visita', data);
        if (response) {
            router.push({ name: 'Visitas' });
        }
    } catch (error) {
        console.error('Houve um erro ao adicionar o participante:', error);
    }
}
</script>

<template>
    <Sidebar />
    <div class="p-10 sm:ml-64 relative overflow-x-auto ">

        <div class="max-w-5xl grid mx-auto grid-cols-12">
            <h1 class="col-span-12 text-3xl text-teal-900 dark:text-white mb-5">Cadastrar Visita</h1>

            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white mb-5">Dados Gerais</h2>

            <div class="mb-5 col-span-12">
                <label for="organizador"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Organizador</label>
                <input type="text" id="organizador" v-model="form.organizador"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Fulano de Tal" required />
            </div>
            <div class="mb-5 col-span-1">
                <label for="estado" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Estado</label>
                <select id="estado" v-model="form.estado"
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
                <input type="text" id="cidade" v-model="form.cidade"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    required />
            </div>

            <div class="mb-5 col-span-12">
                <label for="endereco"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Endereço</label>
                <input type="text" id="endereco" v-model="form.endereco"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    required />
            </div>


            <div class="mb-5 col-span-12">
                <label for="descricao"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Descrição</label>
                <textarea 
                    v-model="form.descricao"
                    id="descricao" 
                    rows="4" 
                    class="block p-2.5 w-full text-sm text-teal-900 bg-teal-50 rounded-lg border border-teal-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    placeholder="Descreva a visita..."
                >
                </textarea>
            </div>
            
            <div class="mb-5 col-span-6">
                <label 
                    for="data_inicio"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white"
                >
                    Data de Início
                </label>
                <input 
                    v-model="form.data_inicio"
                    type="date"
                    id="data_inicio" 
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    required
                />
            </div>

            <div class="mb-5 ml-5 col-span-6">
                <label 
                    for="data_fim"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white"
                >
                    Data de Fim
                </label>
                <input 
                    v-model="form.data_fim"
                    type="date"
                    id="data_inicio" 
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                />
            </div>

            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white mb-5">Acervo</h2>

            <!-- Tabela de produtos -->
            <div class="col-span-12 relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                <table class="table-auto w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
                    <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" style="width: 10%">Código</th>
                            <th scope=" col" class="px-6 py-3">Nome</th>
                            <th scope="col" class="px-6 py-3" style="width: 20%">Quantidade</th>
                            <th scope="col" class="px-6 py-3 " style="width:3%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for=" (produto, index) in produtosLista" :key="index"
                            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ produto.codigo }}
                            </th>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ produto.nome }}
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
            <div class="col-span-10">
                <select 
                    v-model="novoProduto"
                    id="produto" 
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                >
                    <option value="" selected disabled>Selecione um produto</option>
                    <option v-for="produto in produtos" :key="produto.id" :value="produto">
                        {{ produto.nome }}
                    </option>
                </select>
            </div>
            <div class="ml-5 col-span-2">
                <button type="button" @click="adicionarProduto"
                    class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                    Adicionar
                </button>
            </div>


            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white my-5">Visitantes</h2>

            <div class="col-span-12 relative overflow-x-auto shadow-md sm:rounded-lg mb-5">

                <table class="w-full text-sm text-left rtl:text-right text-teal-500 dark:text-teal-400">
                    <thead class="text-xs text-teal-700 uppercase bg-teal-50 dark:bg-teal-700 dark:text-teal-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nome</th>
                            <th scope="col" class="px-6 py-3" style="width: 5%">Tipo</th>
                            <th scope="col" class="px-6 py-3" style="width: 20%">CPF/CNPJ</th>
                            <th scope="col" class="px-6 py-3">email</th>
                            <th scope="col" class="px-6 py-3 " style="width:3%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for=" (visitante, index) in visitantesLista" :key="index"
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
                                {{ visitante.email }}
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
            <!-- Campos para adicionar novo visitante -->
            <div class="col-span-12">
                <span class="text-white">
                    Visitante Existente?
                </span>
                <label
                    for="visitanteExistente"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white"
                >
                    <input type="radio" v-model="visitanteExistente" :value="true" />
                    Sim
                    <input type="radio" v-model="visitanteExistente" :value="false" />
                    Não
                </label>
            </div>
            <!-- Visitante existente -->
            <div v-if="visitanteExistente" class="col-span-12 grid grid-cols-12">
                <div class="col-span-10">
                    <select 
                        v-model="novoVisitante"
                        id="produto" 
                        class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    >
                        <option value="" selected disabled>Selecione um visitante</option>
                        <option v-for="visitante in visitantes" :key="visitante.id" :value="visitante">
                            {{ visitante.nome }}
                        </option>
                    </select>
                </div>
                <div class="ml-5 col-span-2">
                    <button 
                        type="button" 
                        @click="adicionarVisitanteExistente"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                    >
                        Adicionar
                    </button>
                </div>
            </div>

            <!-- Visitante novo -->
            <div v-else class="col-span-12 grid grid-cols-12">
                <div class="mb-5 col-span-8">
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
                <div class="mb-5 col-span-10">
                    <label for="novoEmail"
                        class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">E-mail</label>
                    <input id="novoEmail" v-model="novoEmail"
                        class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block  w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        placeholder="nome@email.com" />
                </div>
                <div class="mb-5 ml-5 mt-7 col-span-2">
                    <button type="button" @click="adicionarVisitante"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                        Adicionar
                    </button>
                </div>
            </div>

            <button type="button" @click="handleSubmit(form)"
                class="mt-6 col-span-12 text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                Salvar
            </button>
        </div>
    </div>
</template>