<script setup lang="ts">
    import ListCardPPC from './components/ListCardPPC.vue';
    import { useRouter } from 'vue-router'
    import api from '@/services/api.ts';
    import { useRoute } from 'vue-router'
    import {ref, onMounted} from 'vue'

    const router = useRouter()
    const route = useRoute()
    const ppcs = ref([])
    const user_id = 2 //camara
    
    const getPpcsRecebidos = async () => {
    try {
        const response = await api.get(`/ppcs`)
        ppcs.value = response.data
        console.log(response.data)
    } catch (error) {
            console.error('Erro ao buscar PPC:', error)
        }
    }

    const props = defineProps({
        title1 : String,
        title2 : String
    })

    onMounted(() => {
        getPpcsRecebidos()
    })

    function retornarAoPortalDeAcesso() {
        router.push(
            {
                path:'/'
            }
        )  
    }

</script>

<template>
    <div class="div-container">
        <button class="button-retornar" @click="retornarAoPortalDeAcesso" >Portal de acesso</button>
        <h1>{{title1}}</h1>
        <h3>{{ title2 }}</h3>

        <ListCardPPC title="PPC's criados" :ppcs="ppcs" :user_id="user_id"></ListCardPPC>
        
    </div>
</template>


<style scoped>
    .div-container{
        background-color: #FFB32F;
        display:flex;
        min-height: 100vh;
        min-width: 100vw;
        flex-direction: column;
        align-items: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    h1{
        margin-top: 15px;
        font-size: 30px;
        font-weight: 900;
    }

    h3{
        font-size: 20px;
        margin-top: 15px;
    }

    button{
        width: 200px;
        height: 40px;
        font-size: 16px;
        margin-top: 30px;
    }

    .button-retornar{
        position: absolute;
        top : 50px;
        left: 60px;
        border-radius: 20px;
    }

</style>