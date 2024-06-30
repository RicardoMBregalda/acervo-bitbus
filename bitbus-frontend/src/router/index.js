import { createRouter, createWebHistory } from 'vue-router';
import Participante from '../views/participante/Participante.vue';
import ParticipanteForm from '../views/participante/ParticipanteForm.vue';
import Acervo from '../views/acervo/Acervo.vue';
import AcervoForm from '../views/acervo/AcervoForm.vue';
import Visita from '../views/visita/Visita.vue';
import VisitaForm from '../views/visita/VisitaForm.vue';
import Oficina from '../views/oficina/Oficina.vue';
import OficinaForm from '../views/oficina/OficinaForm.vue';
import Doacao from '../views/doacao/Doacao.vue';
import DoacaoForm from '../views/doacao/DoacaoForm.vue';
import Feedback from '../views/feedback/Feedback.vue';
import FeedbackForm from '../views/feedback/FeedbackForm.vue';

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
    name:'Doacao',
    component: Doacao,
  },
  {
    path:'/doacao/form',
    name:'DoacaoForm',
    component: DoacaoForm,
  },
  {
    path:'/doacao/form/:id',
    name:'DoacaoFormEdit',
    component: DoacaoForm,
    props: true,
  },
  {
    path:'/feedback/index',
    name:'Feedback',
    component: Feedback,
  },
  {
    path:'/feedback/form',
    name:'FeedbackForm',
    component: FeedbackForm,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
