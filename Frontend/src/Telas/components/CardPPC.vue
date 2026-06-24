<script setup lang="ts">
import { useRouter } from 'vue-router'
    

const router = useRouter()

const props = defineProps({
    ppc : Object,
    user_id: Number
})

const isFaculdade = props.user_id == 0
const isTecnico = props.user_id == 1
const isCamara = props.user_id == 2

const formatDate = (dateString) => {
  const date = new Date(dateString)

  const day = String(date.getDate()).padStart(2, '0')
  const month = String(date.getMonth() + 1).padStart(2, '0')
  const year = date.getFullYear()

  return `${day}/${month}/${year}`
}

function openPpc() {
    router.push({
        path: '/processo-ppc-faculdade',
        query:{ 
            update: 'true',
            ppc_id: props.ppc?.id,
            faculdade_id: props.ppc?.faculdade_id,
            tecnico_id: props.ppc?.tecnico_id,
            user_id: props.user_id,
        }
    })
}

</script>

<template>
    <div @click="openPpc" class="div-card-container">
        <div class="div-info">
            <div class="div-data">
                <div style="font-weight: 600;">Curso:</div>
                <div>{{ ppc?.nome }}</div>
            </div>
            <div class="div-data">
                <div style="font-weight: 600;" >Criado em:</div>
                <div>{{formatDate(ppc?.created_at)}}</div>
            </div>
        </div>
        <div>
            <div class="div-status">
                <div class="emAnalise" v-if="ppc.status == 0">Em análise</div>
                <div class="aprovado" v-if="ppc.status == 1">Aprovado</div>
                <div class="reprovado" v-if="ppc.status == 2">Reprovado</div>
            </div>
        </div>
    </div>  
</template>

<style>
    .div-card-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 20px;
        background-color: #F5F5F5;
        max-height: 100px;
        min-height: 100px;
        max-width: 100%;
        min-width: 600px;
        margin-left: 250px;
        margin-right: 250px;
        border-radius: 20px;
        padding-left: 50px;
        padding-right: 50px;
        box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.5);
        cursor:pointer;
    }
    .div-info{
        display: flex;
        flex-direction: column;
    }

    .emAnalise{
        background-color: rgb(210, 255, 47);
        width: 130px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;   
        border-radius: 20px; 
    }

    .aprovado{
        background-color: rgb(47, 255, 130);
        width: 130px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;   
        border-radius: 20px; 
    }

    .reprovado{
        background-color: rgb(222, 17, 3);
        width: 130px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;   
        border-radius: 20px;
    }

    .div-data{
        display: flex;
        margin-top: 10px;
        gap:8px;
    }
</style>