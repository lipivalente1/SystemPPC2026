<script setup lang="ts">
import BalaoChat from './components/BalaoChat.vue';
import { useRouter, useRoute } from 'vue-router'

const router = useRouter();
const route = useRoute();

function updateCadastro() {
        router.push(
            {
                path:'/CadastroPPC',
                query:{
                    update: route.query.update,
                    ppc_id: route.query.ppc_id,
                    faculdade_id: route.query.faculdade_id
                }
            }
        )  
    }

</script>

<template>
    <div class="div-container">
        <div class="div-container-baloes">
            <BalaoChat></BalaoChat>
            <BalaoChat></BalaoChat>
            <BalaoChat></BalaoChat>
            <BalaoChat></BalaoChat>            
        </div>
        <div style="display: flex; gap: 20px">
            <button @click="router.push(`/home-faculdade/${route.query.faculdade_id}`)">Cancelar</button>
            <button @click="updateCadastro">Editar PPC</button>
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