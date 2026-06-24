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

const disabledButton = ref(false)

const respostaTecnico = ref('')
const respostaCamara = ref('')

const nomeFaculdade = ref([])
const nomeTecnico = ref([])

const nome = ref('')
const ch = ref(0)
const n_semestres = ref(0)
const justificativa = ref('')
const impacto = ref('')
const disciplinas = ref('fisica')
const status = ref(1)
const ppc = ref()

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

        if(isTecnico || isFaculdade){
            await getProcessoTecnicoFaculdade()
        }

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

        if(isCamara){
            await getProcessoTecnicoCamara()
        }

        }catch (error) {
            console.log(error)
        }
}

const getPpc = async () => {
        try{
            const response = await api.get(`/ppcs/${ppc_id}`)
            ppc.value = response.data
            console.log(response.data)

            nome.value = ppc.value.nome
            ch.value = ppc.value.ch
            n_semestres.value = ppc.value.n_semestres
            justificativa.value = ppc.value.justificativa
            impacto.value = ppc.value.impacto
            disciplinas.value = ppc.value.disciplinas
            status.value = ppc.value.status

            if(status.value == 1 || status.value == 2){
                disabledButton.value = true;
            }else{
                disabledButton.value = false;
            }

        }catch(error) {
                console.error('Erro ao buscar PPC:', error)
            }
}

const atualizarPpc = async ( novoStatus : number) => {
            try {
                await api.put(`/ppcs/${ppc_id}`, 
                {
                    nome: nome.value,
                    ch: ch.value,
                    n_semestres: n_semestres.value,
                    justificativa: justificativa.value,
                    impacto: impacto.value,
                    disciplinas: disciplinas.value,
                    status: novoStatus,
                    faculdade_id: Number(route.query.faculdade_id),
                    tecnico_id: 1
                })
                
            if(novoStatus == 1 || novoStatus == 2){
                disabledButton.value = true;
            }else{
                disabledButton.value = false;
            }

                alert('PPC atualizado com sucesso!')

            }catch (error) {
                console.log(error.response?.data)
                console.log(error.response?.status)
                alert('Erro ao atualizar o PPC')
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
    getPpc()
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
    disabledButton.value = true
    if(resposta === '25'){
        atualizarPpc(Number(1))
        setRespostaTecnico(resposta)
    }

     if(resposta === '26'){
        atualizarPpc(Number(2))
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
            <div style="width: 80%;" v-for="ppc in ppc_msgs" :key="ppc.id">
                <div v-if="ppc.content === '23' && (isFaculdade)">
                    <div class="balao">
                        <div class="div-title">{{ nomeFaculdade.nome }} enviou:</div>
                        <div class="div-content">Proposta para análise</div>
                        <button class="button-exibir-proposta">Exibir proposta</button>
                    </div>
                </div>
                <div v-if="ppc.content === '23' && (isTecnico)">
                    <div class="balao">
                        <div class="div-title">{{ nomeFaculdade.nome }} enviou:</div>
                        <div class="div-content">Proposta para análise</div>
                        <button class="button-exibir-proposta">Exibir proposta</button>
                    </div>
                </div>
                <div v-if="ppc.content === '24' && (isFaculdade)">
                    <div class="balao">
                        <div class="div-title">{{ nomeTecnico.nome }} enviou:</div>
                        <div class="div-content">Proposta enviada para a aprovação pela Câmara de Ensino</div>
                    </div>
                </div>
                <div v-if="isNaN(ppc.content) && (isTecnico)">
                    <div class="balao">
                        <div class="div-title">{{ nomeTecnico.nome }} enviou:</div>
                        <div class="div-content">{{ppc.content}}</div>
                    </div>
                </div>
                <div v-if="isNaN(ppc.content) && (isFaculdade)">
                    <div class="balao">
                        <div class="div-title">{{ nomeTecnico.nome }} enviou:</div>
                        <div class="div-content">{{ppc.content}}</div>
                    </div>
                </div>
                <div v-if="ppc.content === '24' && (isTecnico)">
                    <div class="balao">
                        <div  class="div-title">{{ nomeTecnico.nome }} enviou:</div>
                        <div class="div-content">Proposta enviada para a aprovação pela Câmara de Ensino</div>
                    </div>
                </div>
                <div v-if="ppc.content === '24' && (isCamara)">
                    <div  class="balao">
                        <div class="div-title">{{ nomeTecnico.nome }} enviou:</div>
                        <div class="div-content">Proposta enviada para aprovação pela Câmara de Ensino</div>
                        <button class="button-exibir-proposta">Exibir proposta</button>
                    </div>
                </div>
                <div v-if="ppc.content === '25' && (isTecnico)">
                    <div  class="balao">
                        <div class="div-title">Camara de Ensino enviou:</div>
                        <div class="div-content">Proposta aprovada.</div>
                    </div>
                </div>
                <div v-if="ppc.content === '25' && (isFaculdade)">
                    <div  class="balao">
                        <div class="div-title">{{ nomeTecnico.nome }} enviou:</div>
                        <div class="div-content" >Proposta aprovada pela Câmara de Ensino</div>
                    </div>
                </div>
                <div v-if="ppc.content === '25' && (isCamara)">
                    <div  class="balao">
                        <div class="div-title">Camara de Ensino enviou:</div>
                        <div class="div-content">Proposta aprovada.</div>
                    </div>
                </div>
                <div v-if="ppc.content === '26' && (isTecnico)">
                    <div  class="balao">
                        <div class="div-title">Camara de Ensino enviou:</div>
                        <div class="div-content">Proposta reprovada.</div>
                    </div>
                </div>
                <div v-if="ppc.content === '26' && (isFaculdade)">
                    <div  class="balao">
                        <div class="div-title">{{ nomeTecnico.nome }} enviou:</div>
                        <div class="div-content">Proposta reprovada pela Câmara de Ensino</div>
                    </div>
                </div>
                <div v-if="ppc.content === '26' && (isCamara)">
                    <div  class="balao">
                        <div class="div-title">Camara de Ensino enviou:</div>
                        <div class="div-content">Proposta reprovada.</div>
                    </div>
                </div>
            </div>
            <div style="width: 80%" v-if="isCamara && ppc_msgs.length <= 0"">
                    <div  class="balao">
                        <div class="div-title">Câmara de Ensino enviou:</div>
                        <div class="div-content">Aguardando envio da proposta pelo servidor..</div>
                    </div>
            </div> 
            <div v-if="isTecnico">
                <form style="display: flex; gap:20px; justify-content: center; align-items: center;" @submit.prevent="enviarRespostaTecnico">  
                    <textarea style="width: 700px; height: 100px; padding: 20px; border-radius: 20px;" v-model="respostaTecnico"></textarea>
                    <button :disabled="disabledButton" style="width: 120px; font-size: 20px; height: 40px;" type="submit">Enviar</button>
                </form>
            </div>
                       
        </div>
        <div style="display: flex; gap: 20px">
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" v-if="isFaculdade" @click="router.push(`/home-faculdade/${route.query.faculdade_id}`)">Cancelar</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" v-if="isTecnico" @click="router.push(`/home-tecnico/${route.query.tecnico_id}`)">Cancelar</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" :disabled="disabledButton" v-if="isFaculdade" @click="updateCadastro">Editar PPC</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" :disabled="disabledButton" v-if="isTecnico" @click="setRespostaTecnico('24')">Enviar PPC para a Câmara de Ensino</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" v-if="isCamara" @click="router.push('/home-camara')">Cancelar</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" :disabled="disabledButton" v-if="isCamara && ppc_msgs.length > 0" @click="setRespostaCamara('26')">Reprovar</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" v-else-if="isCamara" disabled @click="setRespostaCamara('26')">Reprovar</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" :disabled="disabledButton" v-if="isCamara && ppc_msgs.length" @click="setRespostaCamara('25')">Aprovar</button>
            <button style="width: 220px; font-size: 20px; height: 60px; border-radius: 20px;" v-else-if="isCamara" disabled @click="setRespostaCamara('26')">Aprovar</button>
        </div>
    </div>
    
</template>

<style scoped>

    .div-container-baloes{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        background-color: #FF8C00;
        width: 60%;
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
        background-color: #FFB32F;
    }
    
    .balao{
        display: flex;
        flex-direction: column;
        gap: 5px;
        width: 100%;
        background-color: rgb(255, 234, 212);
        border-radius: 20px;
        padding: 10px;
    }

    .div-title{
        font-size: 15px;
        font-weight: 600;
    }

    .div-content{
        font-size: 15px;
    }

    .button-exibir-proposta{
        width: 140px;
        border-radius: 20px;
    }

    button{
        width: 100px;
    }
</style>