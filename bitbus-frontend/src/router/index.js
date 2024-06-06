import { createRouter, createWebHistory } from 'vue-router';
import Participante from '../views/participante/Participante.vue';
import ParticipanteForm from '../views/participante/ParticipanteForm.vue';
import Acervo from '../views/acervo/Acervo.vue';
import AcervoForm from '../views/acervo/AcervoForm.vue';
import Visita from '../views/visita/Visita.vue';
import VisitaForm from '../views/visita/VisitaForm.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),
  },
  {
    path:'/participante/index',
    name:'Participantes',
    component: Participante,
  },
  {
    path:'/participante/form',
    name:'ParticipanteForm',
    component: ParticipanteForm,
  },
  {
    path:'/acervo/index',
    name:'Acervo',
    component: Acervo,
  },
  {
    path:'/acervo/form',
    name:'AcervoForm',
    component: AcervoForm,
  },
  {
    path:'/visita/index',
    name:'Visita',
    component: Visita,
  },
  {
    path:'/visita/form',
    name:'VisitaForm',
    component: VisitaForm,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
