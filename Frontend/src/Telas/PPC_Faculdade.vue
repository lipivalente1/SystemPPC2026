<script setup lang="ts">
import BalaoChat from './components/BalaoChat.vue';
import { useRouter, useRoute } from 'vue-router'
import {ref, onMounted } from 'vue'
import api from '@/services/api.ts';

const router = useRouter();
const route = useRoute();

const isFaculdade = Number(route.query.user_id) == 0
const isTecnico = Number(route.query.user_id) == 1
const isCamara = Number(route.query.user_id) == 2

const ppc_msgs = ref([])
const ppc_id = Number(route.query.ppc_id)
const faculdade_id = Number(route.query.faculdade_id)
const tecnico_id = Number(route.query.tecnico_id)


const respostaTecnico = ref('')
const respostaCamara = ref('')

const nomeFaculdade = ref([])
const nomeTecnico = ref([])

const getNomeFaculdade = async () => {
    try {
        const response = await api.get(`/faculdades/${faculdade_id}`)
        nomeFaculdade.value = response.data
        console.log(response.data)
    } catch (error) {
        console.error('Erro ao buscar o nome da faculdade:', error)
    }
}

const getNomeTecnico = async () => {
    try {
        const response = await api.get(`/tecnicos/${tecnico_id}`)
        nomeTecnico.value = response.data
        console.log(response.data)
    } catch (error) {
        console.error('Erro ao buscar o nome do técnico(a):', error)
    }
}

const getProcessoTecnicoFaculdade = async () => {
    try {
        const response = await api.get(`/analise-ppcs?ppc_id=${ppc_id}`)
        ppc_msgs.value = response.data
        console.log(response.data)
    } catch (error) {
        console.error('Erro ao buscar processo:', error)
    }
}

const getProcessoTecnicoCamara = async () => {
    try {
        const response = await api.get(`/camara-ppcs?ppc_id=${ppc_id}`)
        ppc_msgs.value = response.data
        console.log(response.data)
    } catch (error) {
        console.error('Erro ao buscar processo:', error)
    }
}

const enviarRespostaTecnico = async () => {
        try {
            await api.post('/analise-ppcs', {
                ppc_id: ppc_id,
                content: respostaTecnico.value
        })

        respostaTecnico.value = ''
        await getProcessoTecnicoFaculdade()

        }catch (error) {
            console.log(error)
        }
} 

const enviarRespostaCamara = async () => {
        try {
            await api.post('/camara-ppcs', {
                ppc_id: ppc_id,
                content: respostaCamara.value
        })

        respostaCamara.value = ''
        await getProcessoTecnicoCamara()

        }catch (error) {
            console.log(error)
        }
} 

onMounted(() => {
    if(isFaculdade || isTecnico){
        getProcessoTecnicoFaculdade()
    }else{
        getProcessoTecnicoCamara()
    }

    getNomeFaculdade()
    getNomeTecnico()
})

function setRespostaTecnico( resposta : string){
    respostaTecnico.value = resposta.toString()
    enviarRespostaTecnico()

    if(resposta === '24'){
        setRespostaCamara('24')
    }
}

function setRespostaCamara( resposta : string){
    respostaCamara.value = resposta.toString()
    enviarRespostaCamara()

    if(resposta === '25' || resposta === '26'){
        setRespostaTecnico(resposta)
    }
}

function updateCadastro() {
    router.push(
            {
                path:'/CadastroPPC',
                query:{
                    update: route.query.update,
                    ppc_id: route.query.ppc_id,
                    faculdade_id: route.query.faculdade_id,
                    user_id:route.query.user_id
                }
            }
        )  
    }

</script>

<template>
    <div class="div-container">
        <div class="div-container-baloes">
            <div v-for="ppc in ppc_msgs" :key="ppc.id">
                <div v-if="ppc.content === '23' && (isFaculdade)">
                    <div>
                        <div>{{ nomeFaculdade.nome }} enviou:</div>
                        <div>Proposta para análise.</div>
                        <button>Exibir proposta</button>
                    </div>
                </div>
                <div v-if="ppc.content === '23' && (isTecnico)">
                    <div>
                        <div>{{ nomeFaculdade.nome }} enviou:</div>
                        <div>Proposta para análise</div>
                    </div>
                </div>
                <div v-if="ppc.content === '24' && (isFaculdade)">
                    <div>
                        <div>{{ nomeTecnico.nome }} enviou:</div>
                        <div>Proposta enviada para a aprovação da Camara de Ensino</div>
                    </div>
                </div>
                <div v-if="ppc.content === '24' && (isTecnico)">
                    <div>
                        <div>{{ nomeTecnico.nome }} enviou:</div>
                        <div>Proposta enviada para a aprovação da Camara de Ensino</div>
                    </div>
                </div>
                <div v-if="ppc.content === '24' && (isCamara)">
                    <div>
                        <div>{{ nomeTecnico.nome }} enviou:</div>
                        <div>Proposta enviada para a aprovação da Camara de Ensino</div>
                        <button>Exibir proposta</button>
                    </div>
                </div>
                <div v-if="ppc.content === '25' && (isTecnico)">
                    <div>
                        <div>Camara de Ensino enviou:</div>
                        <div>Proposta aprovada.</div>
                    </div>
                </div>
                <div v-if="ppc.content === '25' && (isFaculdade)">
                    <div>
                        <div>{{ nomeTecnico.nome }} enviou:</div>
                        <div>Proposta aprovada pela Câmara de Ensino</div>
                    </div>
                </div>
                <div v-if="ppc.content === '25' && (isCamara)">
                    <div>
                        <div>Camara de Ensino enviou:</div>
                        <div>Proposta aprovada.</div>
                    </div>
                </div>
                <div v-if="ppc.content === '26' && (isTecnico)">
                    <div>
                        <div>Camara de Ensino enviou:</div>
                        <div>Proposta reprovada.</div>
                    </div>
                </div>
                <div v-if="ppc.content === '26' && (isFaculdade)">
                    <div>
                        <div>{{ nomeTecnico.nome }} enviou:</div>
                        <div>Proposta reprovada pela Câmara de Ensino</div>
                    </div>
                </div>
                <div v-if="ppc.content === '26' && (isCamara)">
                    <div>
                        <div>Camara de Ensino enviou:</div>
                        <div>Proposta reprovada.</div>
                    </div>
                </div>
            </div>
            <div v-if="isTecnico">
                <form @submit.prevent="enviarRespostaTecnico">  
                    <input v-model="respostaTecnico">
                    <button type="submit">Enviar</button>
                </form>
            </div>            
        </div>
        <div style="display: flex; gap: 20px">
            <button v-if="isFaculdade" @click="router.push(`/home-faculdade/${route.query.faculdade_id}`)">Cancelar</button>
            <button v-if="isTecnico" @click="router.push(`/home-tecnico/${route.query.tecnico_id}`)">Cancelar</button>
            <button v-if="isFaculdade" @click="updateCadastro">Editar PPC</button>
            <button v-if="isTecnico" @click="setRespostaTecnico('24')">Enviar PPC para a Câmara de Ensino</button>
            <button v-if="isCamara" @click="router.push('/home-camara')">Cancelar</button>
            <button v-if="isCamara" @click="setRespostaCamara('26')">Reprovar</button>
            <button v-if="isCamara" @click="setRespostaCamara('25')">Aprovar</button>
        </div>
    </div>
    
</template>

<style scoped>
    .div-container-baloes{
        display: flex;
        flex-direction: column;
        gap: 10px;
        background-color: #108bea55;
        width: 50%;
        height: auto;
        margin-top: 30px;
        margin-bottom: 30px;
        padding-bottom: 30px;
        padding-top: 30px;
        border-radius: 30px;
    }

    .div-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: auto;
        min-height: 100vh;
        height: auto;
        background-color: aqua;
    }
</style>