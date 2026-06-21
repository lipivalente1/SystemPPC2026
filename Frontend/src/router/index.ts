  import { createRouter, createWebHistory } from 'vue-router'
  import HomeView from '../views/HomeView.vue'
  import HomeFaculdade from '@/Telas/HomeFaculdade.vue'
  import HomeCamara from '@/Telas/HomeCamara.vue'
  import HomeTecnico from '@/Telas/HomeTecnico.vue'
  import CadastroPPC from '@/Telas/CadastroPPC.vue'
  import PPC_Faculdade from '@/Telas/PPC_Faculdade.vue'

  const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
      /*{
        path: '/',
        name: 'home',
        component: HomeFaculdade,
        props: {
        title1: 'PLANO PEDAGÓGICO DE CURSO - PPC',
        title2: 'Faculdade de Engenharia da Computação'
        }
      }*/
     /*{
        path: '/',
        name: 'home',
        component: HomeTecnico,
        props: {
        title1: 'PLANO PEDAGÓGICO DE CURSO - PPC',
        title2: 'Avaliação de Propostas'
        }
      }*/
     {
        path: '/ppcfaculdade',
        name: 'ppc_faculdade',
        component: PPC_Faculdade
      },
      {
        path: '/',
        name: 'home',
        component: HomeFaculdade,
        props: {
        title1: 'PLANO PEDAGÓGICO DE CURSO - PPC',
        title2: 'Faculdade'
        }
      },
      {
        path: '/CadastroPPC',
        name: 'cadastro novo ppc',
        // route level code-splitting
        // this generates a separate chunk (About.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: CadastroPPC,
      },
    ],
  })

  export default router
