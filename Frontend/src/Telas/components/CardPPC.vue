<script setup lang="ts">
import { useRouter } from 'vue-router'
    

const router = useRouter()

const props = defineProps({
    nome : String,
    data : String
})

const formatDate = (dateString) => {
  const date = new Date(dateString)

  const day = String(date.getDate()).padStart(2, '0')
  const month = String(date.getMonth() + 1).padStart(2, '0')
  const year = date.getFullYear()

  return `${day}/${month}/${year}`
}

function openPpc() {
    router.push('/ppcfaculdade')
}

</script>

<template>
    <div @click="openPpc" class="div-card-container">
        <div class="div-info">
            <div class="div-data">
                <div style="font-weight: 600;">Curso:</div>
                <div>{{ nome }}</div>
            </div>
            <div class="div-data">
                <div style="font-weight: 600;" >Criado em:</div>
                <div>{{formatDate(data)}}</div>
            </div>
        </div>
        <div>
            <div class="div-status">
                <div>Aprovado</div>
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

    .div-status{
        background-color: greenyellow;
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