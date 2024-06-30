<script setup>
import { ref } from 'vue';
import Sidebar from '../../components/Sidebar.vue';
import axios from 'axios';
import { onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();
const form = ref({
    codigo: "",
    nome: "",
    tipo: "",
    ano: "",
    quantidade: "",
    dimensoes: "",
    informacoes: "",
    link: "",
    local_de_armazenamento: "",
});

async function handleSubmit(data) {
    console.log("data", data)
    try {
        if (route.params.id) {
            const response = await axios.put(`http://127.0.0.1:8000/api/produto/${route.params.id}`, data);
            if (response) {
                router.push({ name: 'Acervo' });
            }
        } else {
            const response = await axios.post('http://127.0.0.1:8000/api/produto', data);
            if (response) {
                router.push({ name: 'Acervo' });
            }
        }
    } catch (error) {
        console.error('Houve um erro ao adicionar a produto:', error);
    }
}

const fetchProduto = async (id) => {
    const response = await axios.get(`http://127.0.0.1:8000/api/produto/${id}`);
    form.value = response.data.data;

};

onMounted(async () => {
    try {

        if (route.params.id) {
            await fetchProduto(route.params.id);
        }

    } catch (error) {
        console.error('Error fetching data', error);
    }
});



</script>

<template>

    <Sidebar />

    <div class="p-10 sm:ml-64 relative overflow-x-auto ">

        <div class="max-w-5xl grid mx-auto grid-cols-12">
            <h1 class="col-span-12 text-3xl text-green-900 dark:text-white mb-5">Cadastrar Produto</h1>

            <h2 class="col-span-12 text-2xl text-green-900 dark:text-white mb-5">Dados Gerais</h2>

            <div class="mb-5  col-span-8">
                <label for="nome"
                    class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Descrição</label>
                <input type="text" id="nome" v-model="form.nome"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Descrição do Produto" required />
            </div>

            <div class="mb-5  ml-5 col-span-3">
                <label for="codigo" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Código</label>
                <input type="text" id="codigo" v-model="form.codigo"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Código" required />
            </div>

            <div class="mb-5 ml-5 col-span-">
                <label for="ano" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Ano</label>
                <input type="number" id="ano" v-model="form.ano"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Ano" required />
            </div>


            <div class="mb-5 col-span-12">
                <label for="tipo" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Tipo</label>
                <input type="text" id="tipo" v-model="form.tipo"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Tipo" required />
            </div>

            <div class="mb-5 col-span-12">
                <label for="informacoes"
                    class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Informações</label>
                <textarea id="informacoes" rows="4" v-model="form.informacoes"
                    class="block p-2.5 w-full text-sm text-green-900 bg-green-50 rounded-lg border border-green-300 focus:ring-green-500 focus:border-green-500 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                    placeholder="Descreva o produto..."></textarea>

            </div>
            <div class="mb-5 col-span-12 ">
                <label for="link" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Link da
                    Imagem</label>
                <input type="text" id="link" v-model="form.link"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Link da Imagem" />
            </div>


            <h2 class="col-span-12 text-2xl text-green-900 dark:text-white mb-5">Estoque e Dimensões</h2>

            <div class="mb-5 col-span-2">
                <label for="quantidade"
                    class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Quantidade</label>
                <input type="number" id="quantidade" v-model="form.quantidade"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Quantidade" required />
            </div>

            <div class="mb-5 ml-5 col-span-3">
                <label for="lical" class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Local de
                    Armazenamento</label>
                <input type="local" id="local" v-model="form.local_de_armazenamento"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Local de Armazenamento" required />
            </div>

            <div class="mb-5 ml-5 col-span-3 ">
                <label for="dimensao"
                    class="block mb-2 text-sm font-medium text-green-900 dark:text-white">Dimensão</label>
                <input type="text" id="dimensao" v-model="form.dimensoes"
                    class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
                    placeholder="Dimensão" />
            </div>


            <button type="button" @click="handleSubmit(form)"
                class="mt-6 col-span-12 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                Salvar
            </button>
        </div>
    </div>

</template>
