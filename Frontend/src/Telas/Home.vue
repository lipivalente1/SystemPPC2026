<script setup lang="ts">
    import { useRouter } from 'vue-router'

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
</script>

<template scoped>
    <div class="div-container">
        <h1>Portal de Acesso ao Sistema de PPC</h1>
        <div class="container-buttons">
            <h2>Faculdades</h2>
            <button @click="telaFaculdade">Eng Comp</button>
            <button @click="telaFaculdade2">Telecom</button>
            <h2>Técnicos</h2>
            <button @click="telaTecnico">Armandinha</button>
            <h2>Câmara de Ensino</h2>
            <button @click="telaCamara">Câmara</button>
        </div>
        
    </div>
</template>

<style>
    .div-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: orange;
    }

    .container-buttons{
        width: 50%;
        height: auto;
        background-color: rgb(255, 183, 49);
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
    }

    h2{
        font-size: 20px;
    }

    button{
        width: 300px;
        height: 30px;
    }
</style>