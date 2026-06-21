<script setup lang="ts">
</script>

<template>
    <div class="container-comp">
        <div class="centraliza">
            <div>Nome da disciplina</div>
            <input type="text">
        </div> 
        <div class="centraliza">
            <div>Carga horária</div>
            <input type="text">
        </div>
        <div class="centraliza">
            <button>
                Excluir
            </button>
        </div>
    </div>
</template>

<style>

.centraliza{
    display: flex;
    flex-direction: column;
}

.container-comp{
    display: flex;
    border-radius: 10px;
    width: 500px;
    height: auto;
    background-color: bisque;
}

</style>
