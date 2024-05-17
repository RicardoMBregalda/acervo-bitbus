import { createRouter, createWebHistory } from 'vue-router';
import Visitante from '../views/Visitante.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),
  },
  {
    path:'/visitante',
    name:'Visitante',
    component:() => import('../views/Visitante.vue'),
  },
  {
    path:'/cadastrarvisitante',
    name:'CadastrarVisitante',
    component:() => import('../views/VisitanteCadastrar.vue'),
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
