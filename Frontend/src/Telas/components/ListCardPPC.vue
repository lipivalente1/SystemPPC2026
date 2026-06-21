<script setup lang="ts">
    import CardPPC from './CardPPC.vue';

   const props = defineProps({
    title:String
   })
</script>

<template>
    <div class="div-container-card">
                <div class="div-title-list">
                    {{ title }}
                </div>
                <div class="div-container-list">
                    <CardPPC></CardPPC>                 
                </div>   
    </div>
    <img src="../../assets/logo.png">
</template>

<style scoped>
    .div-container-card{
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 60vw;
        gap: 20px;
        height: auto;
        align-items: center;
        border-radius: 20px;
        border: 1px solid black;
        margin-top: 30px;
        position: relative;
    }

    .div-title-list{
        display: flex;
        justify-content: center;
        position: absolute;
        top:-15px;
        background-color: #FFB32F;
        width: 200px;
        font-size: 30px;
    }

    .div-container-list{
        display: flex;
        flex-direction: column;
        gap: 20px;
        justify-content: center;
        width: auto;
        overflow-y: auto; 
        padding-top: 30px;
        padding-bottom: 30px;
        height: auto;
    }

    img{
        width: 200px;
        margin-top: 30px;
    }
</style>