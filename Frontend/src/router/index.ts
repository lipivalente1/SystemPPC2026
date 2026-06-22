  import { createRouter, createWebHistory } from 'vue-router'
  import HomeView from '../views/HomeView.vue'
  import HomeFaculdade from '@/Telas/HomeFaculdade.vue'
  import HomeCamara from '@/Telas/HomeCamara.vue'
  import HomeTecnico from '@/Telas/HomeTecnico.vue'
  import CadastroPPC from '@/Telas/CadastroPPC.vue'
  import PPC_Faculdade from '@/Telas/PPC_Faculdade.vue'
  import Home from '@/Telas/Home.vue'

  const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
      {
        path: '/home-faculdade/:id',
        name: 'home-faculdade',
        component: HomeFaculdade,
        props: {
        title1: 'PLANO PEDAGÓGICO DE CURSO - PPC',
        title2: 'Faculdade de Engenharia da Computação'
        }
      },
      {
        path: '/',
        name: 'home',
        component: Home,
      },
     {
        path: '/home-tecnico/:id',
        name: 'home-tecnico',
        component: HomeTecnico,
        props: {
        title1: 'PLANO PEDAGÓGICO DE CURSO - PPC',
        title2: 'Avaliação de Propostas'
        }
      },
     {
        path: '/processo-ppc-faculdade',
        name: 'processo-ppc-faculdade',
        component: PPC_Faculdade
      },
      {
        path: '/home-camara',
        name: 'home-camara',
        component: HomeCamara,
        props: {
        title1: 'PLANO PEDAGÓGICO DE CURSO - PPC',
        title2: 'Câmara de Ensino'
        }
      },
      {
        path: '/CadastroPPC',
        name: 'cadastro novo ppc',
        component: CadastroPPC,
      },
    ],
  })

  export default router
