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
    participante_id: '',
    valor: 0.0,
    detalhes: '',
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
const novoNomeProduto = ref('');
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
    participantesLista.value = [response.data.data.participante];
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
        form.value.participante_id = novoParticipante.value.id;
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
        form.value.participante_id = 0;
        novoNome.value = '';
        novoTipo.value = '';
        novoDocumento.value = '';
        novoEmail.value = '';
    } else {
        alert('Por favor, preencha todos os campos.');
    }
};

const adicionarProduto = () => {
    if (
        novoNomeProduto .value
        && novoCodigo.value
        && novoAno.value
        && novoTipoProduto.value
        && novoInformacoes.value
        && novoLinkImagem.value
        && novoQuantidade.value
        && novoLocalArmazenamento.value
        && novoDimensao.value
    ) {
        produtosLista.value.push({
            nome: novoNomeProduto.value,
            codigo: novoCodigo.value,
            ano: novoAno.value,
            tipo: novoTipoProduto.value,
            informacoes: novoInformacoes.value,
            link: novoLinkImagem.value,
            quantidade: novoQuantidade.value,
            local_de_armazenamento: novoLocalArmazenamento.value,
            dimensoes: novoDimensao.value,
        });
        novoNomeProduto.value = '';
        novoCodigo.value = '';
        novoAno.value = '';
        novoTipoProduto.value = '';
        novoInformacoes.value = '';
        novoLinkImagem.value = '';
        novoQuantidade.value = '';
        novoLocalArmazenamento.value = '';
        novoDimensao.value = '';
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
    data.participante = participantesLista.value;
    data.tipo_doacao = data.tipo_doacao === 'produto' ? TIPO_PRODUTO : TIPO_DINHEIRO;
    data.valor = data.valor ? data.valor : 0.0;
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
            <h1 class="col-span-12 text-3xl text-green-900 dark:text-white mb-5">Cadastrar Doações</h1>

            <h2 class="col-span-12 text-2xl text-green-900 dark:text-white mb-5">Dados Gerais</h2>

            <h2 class="col-span-12 text-2xl text-green-900 dark:text-white my-5">Doador/Participante</h2>

            <div class="col-span-12 relative overflow-x-auto shadow-md sm:rounded-lg mb-5">

                <table class="w-full text-sm text-left rtl:text-right text-green-500 dark:text-green-400">
                    <thead class="text-xs text-green-500 uppercase bg-green-50 dark:bg-green-500 dark:text-green-400">
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
                            class="bg-white border-b dark:bg-green-800 dark:border-green-500 hover:bg-green-50 dark:hover:bg-green-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
                                {{ participante.nome }}
                            </th>
                            <td class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
                                {{ participante.tipo }}
                            </td>
                            <td class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
                                {{ participante.documento }}
                            </td>
                            <td class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
                                {{ participante.email }}
                            </td>
                            <td class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
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
            <div v-if="participantesLista.length === 0" class="col-span-12 grid grid-cols-12">
                <!-- Campos para adicionar novo participante -->
                <div class="col-span-12 my-5">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" v-model="participanteExistente" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-green-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-green-500 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-green-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-green-600 peer-checked:bg-green-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-green-900 dark:text-green-300">Participante
                            Existente?</span>
                    </label>
                </div>
                <!-- Participante existente -->
                <div v-if="participanteExistente" class="col-span-12 grid grid-cols-12">
                    <div class="col-span-10">
                        <select v-model="novoParticipante" id="produto"
                            class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option value="" selected disabled>Selecione um participante</option>
                            <option v-for="participante in participantes" :key="participante.id" :value="participante">
                                {{ participante.nome }}
                            </option>
                        </select>
                    </div>
                    <div class="ml-5 col-span-2">
                        <button type="button" @click="adicionarParticipanteExistente"
                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                            Adicionar
                        </button>
                    </div>
                </div>

                <!-- Participante novo -->
                <div v-else class="col-span-12 grid grid-cols-12">
                    <div class="mb-5 col-span-8">
                        <label for="novoNome"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Nome</label>
                        <input type="text" id="novoNome" v-model="novoNome"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Nome do Visitante" />
                    </div>
                    <div class="mb-5 ml-5 col-span-1">
                        <label for="novoTipo"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Tipo</label>
                        <select id="countries " v-model="novoTipo"
                            class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            >
                            <option value="PF">PF</option>
                            <option value="PJ">PJ</option>
                        </select>
                    </div>
                    <div class="mb-5 ml-5 col-span-3">
                        <label for="novoDocumento"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">CPF/CPNJ</label>
                        <input id="novoDocumento" v-model="novoDocumento"
                            class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block  w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="CPF/CNPJ" />
                    </div>
                    <div class="mb-5 col-span-10">
                        <label for="novoEmail"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">E-mail</label>
                        <input id="novoEmail" v-model="novoEmail"
                            class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block  w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="nome@email.com" />
                    </div>
                    <div class="mb-5 ml-5 mt-7 col-span-2">
                        <button type="button" @click="adicionarParticipante"
                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                            Adicionar
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="mb-5 col-span-12">
                <select id="tipo_doacao" v-model="form.tipo_doacao"
                    class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                    <option value="" selected disabled>Selecione o tipo de doação</option>
                    <option value="1">Dinheiro</option>
                    <option value="2">Produto</option>
                </select>
            </div>

            <div v-if="form.tipo_doacao === 2" class="col-span-12 grid">
                <h2 class="col-span-12 text-2xl text-green-900 dark:text-white mb-5">Acervo</h2>

                <!-- Tabela de produtos -->
                <div class="col-span-12 relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                    <table
                        class="table-auto w-full text-sm text-left rtl:text-right text-green-500 dark:text-green-400">
                        <thead
                            class="text-xs text-green-500 uppercase bg-green-50 dark:bg-green-500 dark:text-green-400">
                            <tr>
                                <th scope="col" class="px-6 py-3" style="width: 10%">Código</th>
                                <th scope=" col" class="px-6 py-3">Nome</th>
                                <th scope="col" class="px-6 py-3" style="width: 20%">Quantidade</th>
                                <th scope="col" class="px-6 py-3 " style="width:3%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for=" (produto, index) in produtosLista" :key="index"
                                class="bg-white border-b dark:bg-green-800 dark:border-green-500 hover:bg-green-50 dark:hover:bg-green-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
                                    {{ produto.codigo }}
                                </th>
                                <td class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
                                    {{ produto.nome }}
                                </td>
                                <td class="px- py-4">
                                    <QuantityInput :initialQuantity="produto.quantidade" />
                                </td>
                                <td class="px-6 py-4 font-medium text-green-900 whitespace-nowrap dark:text-white">
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
                        <div
                            class="relative w-11 h-6 bg-green-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-green-500 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-green-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-green-600 peer-checked:bg-green-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-green-900 dark:text-green-300">Produto
                            Existente?</span>
                    </label>
                </div>

                <!-- Produto Existente -->
                <div v-if="produtoExistente" class="col-span-12 grid grid-cols-12">
                    <div class="col-span-10">
                        <select v-model="novoProduto" id="produto"
                            class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option value="" selected disabled>Selecione um produto</option>
                            <option v-for="produto in produtos" :key="produto.id" :value="produto">
                                {{ produto.nome }}
                            </option>
                        </select>
                    </div>
                    <div class="ml-5 col-span-2">
                        <button type="button" @click="adicionarProdutoExistente"
                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                            Adicionar
                        </button>
                    </div>
                </div>

                <!-- Produto novo -->
                <div v-else class="col-span-12 grid grid-cols-12">
                    <div class="mb-5  col-span-8">
                        <label for="nome"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Nome</label>
                        <input type="text" id="nome" v-model="novoNomeProduto"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Descrição do Produto" required />
                    </div>

                    <div class="mb-5  ml-5 col-span-3">
                        <label for="codigo"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Código</label>
                        <input type="text" id="codigo" v-model="novoCodigo"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Código" required />
                    </div>

                    <div class="mb-5 ml-5 col-span-">
                        <label for="ano"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Ano</label>
                        <input type="number" id="ano" v-model="novoAno"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Ano" required />
                    </div>


                    <div class="mb-5 col-span-12">
                        <label for="tipo"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Tipo</label>
                        <input type="text" id="tipo" v-model="novoTipoProduto"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Tipo" required />
                    </div>

                    <div class="mb-5 col-span-12">
                        <label for="informacoes"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Informações</label>
                        <textarea id="informacoes" rows="4" v-model="novoInformacoes"
                            class="block p-2.5 w-full text-sm text-green-900 bg-green-50 rounded-lg border border-green-300 focus:ring-green-500 focus:border-green-500 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="Descreva o produto..."></textarea>

                    </div>
                    <div class="mb-5 col-span-12 ">
                        <label for="link" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Link da
                            Imagem</label>
                        <input type="text" id="link" v-model="novoLinkImagem"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Link da Imagem" />
                    </div>


                    <h2 class="col-span-12 text-2xl text-green-900 dark:text-white mb-5">Estoque e Dimensões</h2>

                    <div class="mb-5 col-span-2">
                        <label for="quantidade"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Quantidade</label>
                        <input type="number" id="quantidade" v-model="novoQuantidade"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Quantidade" required />
                    </div>

                    <div class="mb-5 ml-5 col-span-3">
                        <label for="lical" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Local
                            de
                            Armazenamento</label>
                        <input type="local" id="local" v-model="novoLocalArmazenamento"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Local de Armazenamento" required />
                    </div>

                    <div class="mb-5 ml-5 col-span-3 ">
                        <label for="dimensao"
                            class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Dimensão</label>
                        <input type="text" id="dimensao" v-model="novoDimensao"
                            class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                            placeholder="Dimensão" />
                    </div>
                    <div class="col-span-2"></div>

                    <div class="mb-5 ml-10 mt-7 col-span-2">
                        <button type="button" @click="adicionarProduto"
                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full p-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                            Adicionar
                        </button>
                    </div>

                </div>
            </div>

            <div v-else-if="form.tipo_doacao === 'dinheiro'" class="mb-5 col-span-12">
                <label for="valor" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Valor</label>
                <input type="text" id="valor" v-model="form.valor"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="R$1000,00" />
            </div>

            <h2 class="col-span-12 text-2xl text-green-900 dark:text-white my-5">Descriçao da Doação</h2>
            <div class="mb-5 col-span-12">
                <textarea v-model="form.detalhes" id="detalhes" rows="4"
                    class="block p-2.5 w-full text-sm text-green-900 bg-green-50 rounded-lg border border-green-300 focus:ring-green-500 focus:border-green-500 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                    placeholder="Descreva a visita...">
                </textarea>
            </div>

            <button type="button" @click="handleSubmit(form)"
                class="mt-6 col-span-12 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                Salvar
            </button>
        </div>
    </div>
</template>