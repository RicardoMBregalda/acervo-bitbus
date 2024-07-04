<script setup>
  import { ref, watch } from "vue";
  import axios from "axios";
  import { onMounted } from "vue";
  import { useRoute, useRouter } from "vue-router";

  const route = useRoute();
  const router = useRouter();

  const form = ref({
    nome: "",
    email: "",
    avaliacao: "",
    descricao: "",
  });

  async function handleSubmit(data) {
    console.log("data", data);
    try {
      const response = await axios.post(
        "http://127.0.0.1:8000/api/feedback",
        data
      );
      console.log(response);
      router.push({ name: "FeedbackObrigado" });
    } catch (error) {
      console.error("Houve um erro ao adicionar a feedback:", error);
    }
  }
</script>

<template>
  <div class="p-10 relative overflow-x-auto">
    <div class="max-w-lg grid mx-auto grid-cols-12">
      <h1 class="col-span-12 text-3xl text-green-900 dark:text-white mb-5">
        Informar Feedback
      </h1>

      <div class="mb-5 col-span-12">
        <label
          for="nome"
          class="block mb-2 text-sm font-medium text-green-900 dark:text-white"
          >Nome</label
        >
        <input
          type="text"
          id="name"
          v-model="form.nome"
          class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
          placeholder="Fulano de Tal"
          required />
      </div>

      <div class="mb-5 col-span-12">
        <label
          for="email"
          class="block mb-2 text-sm font-medium text-green-900 dark:text-white"
          >Email</label
        >
        <input
          type="email"
          id="email"
          v-model="form.email"
          class="shadow-sm bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"
          placeholder="nome@email.com"
          required />
      </div>
      <div class="mb-5 col-span-12">
        <label
          for="avaliacao"
          class="block mb-2 text-sm font-medium text-green-900 dark:text-white"
          >Avaliação</label
        >
        <select
          id="avaliacao"
          v-model="form.avaliacao"
          class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>

      <div class="mb-5 col-span-12">
        <label
          for="descricao"
          class="block mb-2 text-sm font-medium text-green-900 dark:text-white"
          >Conte mais detalhes de como foi sua experiencia no Bit Bus</label
        >
        <textarea
          v-model="form.descricao"
          id="descricao"
          rows="4"
          class="block p-2.5 w-full text-sm text-green-900 bg-green-50 rounded-lg border border-green-300 focus:ring-green-500 focus:border-green-500 dark:bg-green-500 dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
          placeholder="Descreva sua Avaliação...">
        </textarea>
      </div>

      <button
        type="button"
        @click="handleSubmit(form)"
        class="mt-6 col-span-12 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
        Salvar
      </button>
    </div>
  </div>
</template>
