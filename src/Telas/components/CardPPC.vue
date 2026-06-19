<script setup lang="ts">
</script>

<template>
    <div class="div-card-container">
        <div class="div-info">
            <div>
                <label>Curso: </label>
                <label>Engenharia da Computação</label>
            </div>
            <div>
                <label>N° do processo: </label>
                <label>A47544DF47855AF</label>
            </div>
            <div>
                <label>Criado em: :</label>
                <label>19/06/2026</label>
            </div>
        </div>
        <div>
            <div class="div-status">
                <label>Aprovado</label>
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
        min-width: 400px;
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
</style>