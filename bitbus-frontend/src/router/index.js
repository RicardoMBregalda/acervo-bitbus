import { createRouter, createWebHistory } from 'vue-router';
import Participante from '../views/participante/Participante.vue';
import ParticipanteForm from '../views/participante/ParticipanteForm.vue';
import Acervo from '../views/acervo/Acervo.vue';
import AcervoForm from '../views/acervo/AcervoForm.vue';
import Visita from '../views/visita/Visita.vue';
import VisitaForm from '../views/visita/VisitaForm.vue';
import Oficina from '../views/oficina/Oficina.vue';
import OficinaForm from '../views/oficina/OficinaForm.vue';

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
    path:'/participante/form/:id',
    name:'ParticipanteFormEdit',
    component: ParticipanteForm,
    props: true,
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
    path:'/acervo/form/:id',
    name:'AcervoFormEdit',
    component: AcervoForm,
    props: true,
  },
  {
    path:'/visita/index',
    name:'Visitas',
    component: Visita,
  },
  {
    path:'/visita/form',
    name:'VisitaForm',
    component: VisitaForm,
  },
  {
    path:'/visita/form/:id',
    name:'VisitaFormEdit',
    component: VisitaForm,
    props: true,
  },
  {
    path:'/oficina/index',
    name:'Oficinas',
    component: Oficina,
  },
  {
    path:'/oficina/form',
    name:'OficinaForm',
    component: OficinaForm,
  },
  {
    path:'/oficina/form/:id',
    name:'OficinaFormEdit',
    component: OficinaForm,
    props: true,
  },
  {
    path:'/doacao/index',
    name:'Oficinas',
    component: Oficina,
  },
  {
    path:'/doacao/form',
    name:'OficinaForm',
    component: DoacaoForm,
  },
  {
    path:'/doacao/form/:id',
    name:'DoacaoFormEdit',
    component: DoacaoForm,
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
