<script setup lang="ts">
    import DisciplinasSemestreComp from './components/DisciplinasSemestreComp.vue';
    import { ref } from 'vue'
    import api from '@/services/api.ts'
    import { useRouter } from 'vue-router'

    const router = useRouter()

    const nome = ref('')
    const ch = ref(0)
    const n_semestres = ref(0)
    const justificativa = ref('')
    const impacto = ref('')
    const disciplinas = ref('fisica')
    const status = ref(1)

const salvarPpc = async () => {
  try {
    await api.post('/ppcs', {
      nome: nome.value,
      ch: ch.value,
      n_semestres: n_semestres.value,
      justificativa: justificativa.value,
      impacto: impacto.value,
      disciplinas: disciplinas.value,
      status: status.value
    })

    alert('PPC criado com sucesso!')

    // limpar campos
    nome.value = ''
    ch.value = 0
    n_semestres.value = 0
    justificativa.value = ''
    impacto.value = ''
    disciplinas.value = ''
    status.value = 1

  } catch (error) {
    console.log(error)
    alert('Erro ao salvar PPC')
  }
}

  function retornaTelaInicial() {
    router.push('/')
}
</script>

<template>
    <div>
        <div style="display: flex; justify-content: center;">
            <h1>Criar Novo PPC</h1>
        </div>
        <div class="container-forms">
            <div>
                <label>Nome do Curso </label>
                <input v-model="nome" type="text">
            </div>
            <div>
                <label>Carga horária </label>
                <input  v-model.number="ch" type="text">
            </div>
            <div>
                <label>Quantidade de Semestres </label>
                <input v-model.number="n_semestres" type="text">
            </div>     
            <div>
                <label>Justificativa de criação de curso </label>
                <textarea v-model="justificativa"></textarea>
            </div>
            <div>
                <label>Impacto social </label>
                <textarea v-model="impacto"></textarea>
            </div>
            <div>
                <DisciplinasSemestreComp></DisciplinasSemestreComp>
            </div>
        </div>
        <div>
            <button @click="retornaTelaInicial">Cancelar</button>
            <button @click="salvarPpc">Enviar</button>
        </div>
    </div>
</template> 

<style>
.container-forms{
    background-color: aqua;
    width: 70vw;
    height: auto;
    border-radius: 30px;
    padding-left: 30px;
}
</style>