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

<template>
    <div class="div-container">
        <div>Faculdades</div>
        <button @click="telaFaculdade">Eng Comp</button>
         <button @click="telaFaculdade2">Telecom</button>
        <div>Técnicos</div>
        <button @click="telaTecnico">Armandinha</button>
        <div>Câmara de Ensino</div>
        <button @click="telaCamara">Câmara</button>
    </div>
</template>

<style>
    .div-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 300px;
    }
</style>