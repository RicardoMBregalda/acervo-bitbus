<script setup>
import Sidebar from '../../components/Sidebar.vue';

</script>

<template>

    <Sidebar />

    <div class=" p-10 sm:ml-64 relative overflow-x-auto">

        <div class="max-w-lg grid mx-auto grid-cols-12">
            <div class="mb-5 col-span-12">
                <label for="name" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Nome</label>
                <input type="text" id="name"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="Fulano de Tal" required />
            </div>
            <div class="mb-5 col-span-12">
                <label for="email" class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">Email</label>
                <input type="email" id="email"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    placeholder="nome@email.com" required />
            </div>

            <div class="mb-5 col-span-2">
                <label for="repeat-password"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">tipo</label>
                <select id="countries"
                    class="bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    >
                    <option value="PF">PF</option>
                    <option value="PJ">PJ</option>
                </select>
            </div>
            <div class="mb-5 col-start-4 col-span-9">
                <label for="repeat-password"
                    class="block mb-2 text-sm font-medium text-teal-900 dark:text-white">CPF</label>
                <input type="password" id="repeat-password"
                    class="shadow-sm bg-teal-50 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                    required />
            </div>


            <button type="submit"
                class="mt-6 col-span-12 text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Salvar</button>

        </div>

    </div>

</template>
