<script setup>
import { ref } from 'vue';
import QuantityInput from '../../components/QuantityInput.vue';
import Sidebar from '../../components/Sidebar.vue';
import axios from 'axios';
import { onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const TIPO_DINHEIRO = 1
const TIPO_PRODUTO = 2

const route = useRoute();
const router = useRouter();

const produtosLista = ref([]);
const participantesLista = ref([]);

const form = ref({
    tipo_doacao: '',
    produtos: [],
    participantes: [],
});

const novoProduto = ref('');
const novoParticipante = ref('');

const participanteExistente = ref(false);
const produtoExistente = ref(false);

const produtos = ref({})
const participantes = ref({})

// Produto
const novoDescricao = ref('');
const novoCodigo = ref('');
const novoAno = ref('');
const novoTipoProduto = ref('');
const novoInformacoes = ref('');
const novoLinkImagem = ref('');
const novoQuantidade = ref('');
const novoLocalArmazenamento = ref('');
const novoDimensao = ref('');

// Participante
const novoNome = ref('');
const novoDocumento = ref('');
const novoEmail = ref('');
const novoTipo = ref('');


const fetchDoacao = async (id) => {
    const response = await axios.get(`http://127.0.0.1:8000/api/doacao/${id}`);
    form.value = response.data.data;
    produtosLista.value = response.data.data.produtos;
    participantesLista.value = response.data.data.participantes;
};

onMounted(async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/produto');
    produtos.value = response.data.data;

    const secondResponse = await axios.get('http://127.0.0.1:8000/api/participante');
    participantes.value = secondResponse.data.data;

    if (route.params.id) {
        await fetchDoacao(route.params.id);
    }

  } catch (error) {
    console.error('Error fetching data', error);
  }
});

const adicionarProdutoExistente = () => {
    if (novoProduto) {
        produtosLista.value.push(novoProduto.value);
        novoProduto.value = {};
    }
};

const adicionarParticipanteExistente = () => {
    if (novoParticipante) {
        participantesLista.value.push(novoParticipante.value);
        novoParticipante.value = {};
    }
};

const adicionarParticipante = () => {
    if (novoNome.value && novoTipo.value && novoDocumento.value) {
        participantesLista.value.push({
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

const adicionarProduto = () => {
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

const removerParticipante = (index) => {
    participantesLista.value.splice(index, 1);
};

async function handleSubmit(data) {
    data.produtos = produtosLista.value;
    data.participantes = participantesLista.value;
    console.log("data",data)
    try {
        if (route.params.id) {
            const response = await axios.put(`http://127.0.0.1:8000/api/doacao/${route.params.id}`, data);
            if (response) {
                router.push({ name: 'Doacoes' });
            }
        } else {
            const response = await axios.post('http://127.0.0.1:8000/api/doacao', data);
            if (response) {
                router.push({ name: 'Doacoes' });
            }
        }
    } catch (error) {
        console.error('Houve um erro ao adicionar a doação:', error);
    }
}
</script>

<template>
    <Sidebar />
    <div class="p-10 sm:ml-64 relative overflow-x-auto ">

        <div class="max-w-5xl grid mx-auto grid-cols-12">
            <h1 class="col-span-12 text-3xl text-teal-900 dark:text-white mb-5">Cadastrar Doações</h1>

            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white mb-5">Dados Gerais</h2>

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

            <div class="mb-5 col-span-12">
                <select 
                    id="tipo_doacao" 
                    v-model="form.tipo_doacao" 
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="" selected disabled>Selecione o tipo de doação</option>
                    <option value="dinheiro">Dinheiro</option>
                    <option value="produto">Produto</option>
                </select>
            </div>

            <div v-if="form.tipo_doacao === 'produto'" class="col-span-12 grid">
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
                
                <div class="col-span-12 my-5">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" v-model="produtoExistente" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-teal-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 rounded-full peer dark:bg-teal-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-teal-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-teal-600 peer-checked:bg-teal-600"></div>
                        <span class="ms-3 text-sm font-medium text-teal-900 dark:text-teal-300">Produto Existente?</span>
                    </label>
                </div>

                <!-- Produto Existente -->
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

                <!-- Produto novo -->
                <div  class="col-span-12 grid grid-cols-12">
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
            </div>

            <div v-else-if="form.tipo_doacao === 'dinheiro'" class="mb-5 col-span-12">
                <label for="valor"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Valor</label>
                <input type="text" id="valor" v-model="form.valor"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="R$1000,00" />
            </div>



            <h2 class="col-span-12 text-2xl text-teal-900 dark:text-white my-5">Doador/Participante</h2>

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
                        <tr v-for=" (participante, index) in participantesLista" :key="index"
                            class="bg-white border-b dark:bg-teal-800 dark:border-teal-700 hover:bg-teal-50 dark:hover:bg-teal-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ participante.nome }}
                            </th>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ participante.tipo }}
                            </td>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ participante.documento }}
                            </td>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                {{ participante.email }}
                            </td>
                            <td class="px-6 py-4 font-medium text-teal-900 whitespace-nowrap dark:text-white">
                                <button @click="removerParticipante(index)" class="focus:outline-none">
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
            <!-- Campos para adicionar novo participante -->
            <div class="col-span-12 my-5">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" v-model="participanteExistente" class="sr-only peer">
                    <div class="relative w-11 h-6 bg-teal-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 rounded-full peer dark:bg-teal-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-teal-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-teal-600 peer-checked:bg-teal-600"></div>
                    <span class="ms-3 text-sm font-medium text-teal-900 dark:text-teal-300">Participante Existente?</span>
                </label>
            </div>
            <!-- Participante existente -->
            <div v-if="participanteExistente" class="col-span-12 grid grid-cols-12">
                <div class="col-span-10">
                    <select 
                        v-model="novoParticipante"
                        id="produto" 
                        class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    >
                        <option value="" selected disabled>Selecione um participante</option>
                        <option v-for="participante in participantes" :key="participante.id" :value="participante">
                            {{ participante.nome }}
                        </option>
                    </select>
                </div>
                <div class="ml-5 col-span-2">
                    <button 
                        type="button" 
                        @click="adicionarParticipanteExistente"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800"
                    >
                        Adicionar
                    </button>
                </div>
            </div>

            <!-- Participante novo -->
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
                    <button type="button" @click="adicionarParticipante"
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