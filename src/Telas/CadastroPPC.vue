<script>
    import DisciplinasSemestreComp from './components/DisciplinasSemestreComp.vue';
</script>

<template>
    <div>
        <h1>Criar Novo PPC</h1>
        <div class="container-forms">
            <div>
                <label>Nome do Curso </label>
                <input type="text">
            </div>
            <div>
                <label>Carga horária </label>
                <input type="text">
            </div>
            <div>
                <label>Quantidade de Semestres </label>
                <input type="text">
            </div>     
            <div>
                <label>Justificativa de criação de curso </label>
                <textarea></textarea>
            </div>
            <div>
                <label>Impacto social </label>
                <textarea></textarea>
            </div>
            <div>
                <DisciplinasSemestreComp></DisciplinasSemestreComp>
            </div>
        </div>
    </div>
</template> 

<style>
.container-forms{
    background-color: aqua;
    width: 70vw;
    height: 100vh;
    border-radius: 30px;
}
</style>