<script setup>
import { ref, watch } from 'vue';
import Sidebar from '../../components/Sidebar.vue';
import axios from 'axios';
import { onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const tipo = ref('PF');
const identificacaoLabel = ref('CPF');
const identificacaoPlaceholder = ref('000.000.000-00');
const router = useRouter();

const form = ref({
    nome: "",
    email: "",
    tipo: "PF",
    documento: ""
});

watch(form.value, (newValue) => {
    if (newValue.tipo === 'PJ') {
        identificacaoLabel.value = 'CNPJ';
        identificacaoPlaceholder.value = '00.000.000/0000-00';
    } else {
        identificacaoLabel.value = 'CPF';
        identificacaoPlaceholder.value = '000.000.000-00';
    }
});


async function handleSubmit(data) {
    console.log("data", data)
    try {
        if (route.params.id) {
            const response = await axios.put(`http://127.0.0.1:8000/api/participante/${route.params.id}`, data);
            if (response) {
                router.push({ name: 'Participantes' });
            }
        } else {
            const response = await axios.post('http://127.0.0.1:8000/api/participante', data);
            if (response) {
                router.push({ name: 'Participantes' });
            }
        }
    } catch (error) {
        console.error('Houve um erro ao adicionar a participante:', error);
    }
}

const fetchParticipate = async (id) => {
    const response = await axios.get(`http://127.0.0.1:8000/api/participante/${id}`);
    form.value = response.data.data;

};

onMounted(async () => {
    try {

        if (route.params.id) {
            await fetchParticipate(route.params.id);
        }

    } catch (error) {
        console.error('Error fetching data', error);
    }
});



</script>

<template>
    <Sidebar />

    <div class="p-10 sm:ml-64 relative overflow-x-auto">
        <div class="max-w-lg grid mx-auto grid-cols-12">
            <h1 class="col-span-12 text-3xl text-teal-900 dark:text-white mb-5">Cadastrar Participante</h1>

            <div class="mb-5 col-span-12">
                <label for="nome" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Nome</label>
                <input type="text" id="name" v-model="form.nome"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Fulano de Tal" required />
            </div>

            <div class="mb-5 col-span-12">
                <label for="email" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Email</label>
                <input type="email" id="email" v-model="form.email"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="nome@email.com" required />
            </div>

            <div class="mb-5 col-span-2">
                <label for="tipo" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Tipo</label>
                <select id="tipo" v-model="form.tipo"
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="PF">PF</option>
                    <option value="PJ">PJ</option>
                </select>
            </div>

            <div class="mb-5 col-start-4 col-span-9">
                <label :for="identificacaoLabel.toLowerCase()"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">{{ identificacaoLabel
                    }}</label>
                <input v-model="form.documento" type="documento" :id="identificacaoLabel.toLowerCase()"
                    :placeholder="identificacaoPlaceholder"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    required />
            </div>

            <button type="button" @click="handleSubmit(form)"
                class="mt-6 col-span-12 text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                Salvar
            </button>
        </div>
    </div>
</template>
