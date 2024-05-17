<script setup>
import Sidebar from '../components/Sidebar.vue'

</script>

<template>
<Sidebar />
<div class="fixed p-4 right-0 overflow-x-auto">
    <button type="button" class="px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800">
    Cadastrar
    </button>
</div>

<div class="top-3.5 sm:ml-64 relative overflow-x-auto shadow-md ">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-14 roud" >
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    CPF/CNPJ
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
               
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    João Silva
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white text">
                    123.456.789-00
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    joao.silva@example.com
                </td>
                
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    Maria Oliveira
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white text">
                    987.654.321-11
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    maria.oliveira@fakeemail.com
                </td>
              
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    Pedro Souza
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white text">
                    159.753.486-22
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    pedro.souza@mydomain.net
                </td>
                
            </tr>
            
            
        </tbody>
    </table>
    </div>
   
</div>

</template>

<style scoped>

</style>