<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function logout() {
  localStorage.removeItem('token');
  router.push({ name: 'Login' });
}
</script>

<template>
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4  overflow-y-auto bg-green-500 dark:bg-green-600">
            <ul class="space-y-2 font-medium">
                <router-link to="/" class="flex ms-2 md:me-24">
                    <img src="../assets/logo-bitbus_3.png" class="h-8 me-3" alt="Bit Bus Logo" />
                    <span
                        class="self-center text-xl text-white font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Bit
                        Bus</span>
                </router-link>

                <li>
                    <router-link to="/acervo/index"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-green-600 dark:hover:bg-green-800 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-green-400 group-hover:text-white dark:group-hover:text-green-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Acervo</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/participante/index"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-green-600 dark:hover:bg-green-800 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-green-400 group-hover:text-white dark:group-hover:text-green-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Participantes</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/visita/index"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-green-600 dark:hover:bg-green-800 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-green-400 group-hover:text-white dark:group-hover:text-green-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Visitas</span>

                    </router-link>
                </li>
                <li>
                    <router-link to="/oficina/index"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-green-600 dark:hover:bg-green-800 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-green-400 group-hover:text-white dark:group-hover:text-green-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Oficinas</span>

                    </router-link>
                </li>
                <li>
                    <router-link to="/doacao/index"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-green-600 dark:hover:bg-green-800 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-green-400 group-hover:text-white dark:group-hover:text-green-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Doações</span>

                    </router-link>
                </li>
                <li>
                    <router-link to="/feedback/index"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-green-600 dark:hover:bg-green-800 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-green-400 group-hover:text-white dark:group-hover:text-green-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                                clip-rule="evenodd" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap">Feedback</span>
                    </router-link>
                </li>
                <li @click="logout">
                    <router-link to=""
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-green-600 dark:hover:bg-green-800 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-green-400 group-hover:text-white dark:group-hover:text-green-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6.616l-2.88 2.592C8.537 20.461 7 19.776 7 18.477V17H5a2 2 0 0 1-2-2V6Zm4 2a1 1 0 0 0 0 2h5a1 1 0 1 0 0-2H7Zm8 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2Zm-8 3a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Zm5 0a1 1 0 1 0 0 2h5a1 1 0 1 0 0-2h-5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </aside>
</template>

<style scoped></style>
