<script setup lang="ts">
    import ListCardPPC from './components/ListCardPPC.vue';
    import CadastroPPC from './CadastroPPC.vue';

    const props = defineProps({
        title1 : String,
        title2 : String
    })
</script>

<template>
    <div class="div-container">
        <h1>{{title1}}</h1>
        <h3>{{ title2 }}</h3>

        <button>Criar novo PPC</button>
        <CadastroPPC></CadastroPPC>
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
</style>