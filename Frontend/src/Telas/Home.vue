<script setup lang="ts">
    import { useRouter } from 'vue-router'
    import api from '@/services/api.ts'
    import {ref, onMounted} from 'vue'

    const router = useRouter()
    
    function telaFaculdade() {
        router.push('/home-faculdade/1')  
    }

    function telaFaculdade2() {
        router.push('/home-faculdade/2')  
    }

    function telaTecnico() {
        router.push('/home-tecnico/1')  
    }

    function telaCamara() {
        router.push('/home-camara')  
    }

    const salvarFaculdadeNome = async (nome : String) => {
        try {
            await api.post('/faculdades', {
                nome: nome
        })

        }catch (error) {
            console.log(error)
        }
    }

    const salvarTecNome = async (nome : String) => {
        try {
            await api.post('/tecnicos', {
                nome: nome
        })

        }catch (error) {
            console.log(error)
        }
    }

    onMounted(() => {
        salvarFaculdadeNome("Engenharia da Computação")
        salvarFaculdadeNome("Engenharia de Telecomunicações")
        salvarTecNome("Filipe Valente da Silva")
    })
</script>

<template scoped>
    <div class="div-container">
        <h1>Portal de Acesso ao Sistema de PPC</h1>
        <div class="container-buttons">
            <h2>Faculdades</h2>
            <button @click="telaFaculdade">Engenharia da Computação</button>
            <button @click="telaFaculdade2">Engenharia de Telecomunicações</button>
            <h2>Técnicos</h2>
            <button @click="telaTecnico">Filipe Valente da Silva</button>
            <h2>Câmara de Ensino</h2>
            <button @click="telaCamara">Câmara de Ensino</button>
        </div>
            <img style="width: 200px; margin-top: 40px;" src="../../src/assets/logo.png">
    </div>
</template>

<style>
    .div-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #FFB32F;
    }

    .container-buttons{
        width: 50%;
        height: auto;
        background-color: rgb(255, 199, 96);
        display: flex;
        gap:10px;
        flex-direction: column;
        align-items: center;
        border-radius: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-top: 10px;
    }

    h1{
        font-size: 30px;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    h2{
        font-size: 20px;
    }

    button{
        width: 300px;
        height: 30px;
    }
</style>