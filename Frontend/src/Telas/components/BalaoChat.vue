<script setup lang="ts">
import {ref} from 'vue';
import { useRouter } from 'vue-router'

const router = useRouter()
const title = ref('faculdade de engenharia da computação');
const content = ref('Nova proposta de PPC');

</script>

<template>
    <div class="div-container-balao">
        <div>{{ title }} enviou</div>
        <div>{{ content }}</div>
        <div>
            <button>Abrir PPC</button>
        </div>
    </div>
</template>

<style>
    .div-container-balao{
        width: auto;
        height: auto;
        min-height: 80px;
        margin-left: 50px;
        margin-right: 50px;
        border-radius: 20px;
        padding-left: 20px;
        padding-top: 20px;
        background-color: chartreuse;
    }
</style>