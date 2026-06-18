<script setup lang="ts">
    import {ref, watch} from 'vue'
    const usuario = ref('')
    const senha = ref('')

    watch(senha, (novoValor) => {
    console.log('Senha mudou:', novoValor)
    })
</script>


<template>
    <div class="div-principal">
            <h1>LOGIN</h1>
        <form class="div-form">
            <label for="usuario">
                Usuário
            </label>
            <input v-model="usuario" type="text">            
            
            <label for="senha">
                Senha
            </label>
            <input v-model="senha" type="password">
            <button type="submit" style="width: 100px; margin-top: 10px; background-color: #FF8C00">ENTRAR</button>
        </form>        
        <img src="/src/assets/logo.png">
    </div>
</template>

<style scoped>

.center{
    display: flex;
    justify-content: center;
}

h1{
    font-size:40px;
}

.div-form{
    margin-top: 5%;
    display: flex;
    flex-direction: column;
}

.div-principal{
    padding-top: 10%;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
}

img{
    width: 150px;
    margin-top: 150px;
}

input{
    margin-top: 5px;
    width: 300px;
    margin-bottom: 10px;
}

</style>