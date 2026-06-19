<script setup lang="ts">
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
        <div class="div-container-list">

        </div>
    </div>
</template>


<style>
    .div-container{
        min-height: 100vh;
        background-color: aqua;
        display:flex;
        flex-direction: column;
        align-items: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    .div-container-list{
        background-color: bisque;
        margin-left: 10%;
        margin-right: 10%;
    }

    h1{
        margin-top: 15px;
        font-size: 30px;
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