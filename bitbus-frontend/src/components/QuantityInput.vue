<template>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <button @click="decreaseQuantity"
                class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-teal-500 bg-white border border-teal-300 rounded-full focus:outline-none hover:bg-teal-100 focus:ring-4 focus:ring-teal-200 dark:bg-teal-800 dark:text-teal-400 dark:border-teal-600 dark:hover:bg-teal-700 dark:hover:border-teal-600 dark:focus:ring-teal-700"
                type="button">
                <span class="sr-only">Decrease quantity</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h16" />
                </svg>
            </button>
            <div>
                <input v-model="quantity"
                    class="bg-teal-50 w-14 border border-teal-300 text-teal-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block px-2.5 py-1 dark:bg-teal-700 dark:border-teal-600 dark:placeholder-teal-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                    placeholder="1" disabled />
            </div>
            <button @click="increaseQuantity"
                class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-teal-500 bg-white border border-teal-300 rounded-full focus:outline-none hover:bg-teal-100 focus:ring-4 focus:ring-teal-200 dark:bg-teal-800 dark:text-teal-400 dark:border-teal-600 dark:hover:bg-teal-700 dark:hover:border-teal-600 dark:focus:ring-teal-700"
                type="button">
                <span class="sr-only">Increase quantity</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </button>
        </div>
    </td>
</template>

<script>
export default {
    props: {
        initialQuantity: {
            type: Number,
            default: 1
        }
    },
    data() {
        return {
            quantity: this.initialQuantity
        };
    },
    methods: {
        increaseQuantity() {
            this.quantity++;
        },
        decreaseQuantity() {
            if (this.quantity > 1) {
                this.quantity--;
            }
        }
    }
};
</script>

<style scoped>
/* Adicione qualquer estilo necessário aqui */
</style>