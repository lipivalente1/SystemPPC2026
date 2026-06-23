<script setup lang="ts">
    import CardPPC from './CardPPC.vue';
    import {ref, onMounted} from 'vue';
    import api from '@/services/api.ts';

   const props = defineProps({
    title:String,
    ppcs:[],
    user_id:Number
   })
</script>

<template>
    <div class="div-container-card">
                <div class="div-title-list">
                    {{ title }}
                </div>
                <div >
                    <ul class="div-container-list">
                        <CardPPC
                            v-for="ppc in ppcs"
                            :key="ppc.id"
                            :ppc="ppc"
                            :user_id="user_id"
                        />
                        <CardPPC></CardPPC>
                        </ul>                 
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
        gap: 30px;
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
        width: 300px;
        font-size: 30px;
    }

    .div-container-list{
        display: flex;
        flex-direction: column;
        gap: 30px;
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