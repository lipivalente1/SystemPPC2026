<script setup lang="ts">
    import DisciplinasSemestreComp from './components/DisciplinasSemestreComp.vue';
    import { ref } from 'vue'
    import api from '@/services/api.ts'
    import { useRouter } from 'vue-router'
    import { useRoute } from 'vue-router'

    const route = useRoute()
    const router = useRouter()
    const update = route.query.update === 'true';

    const nome = ref('')
    const ch = ref(0)
    const n_semestres = ref(0)
    const justificativa = ref('')
    const impacto = ref('')
    const disciplinas = ref('fisica')
    const status = ref(1)
    const ppc_id = Number(route.query.ppc_id);
    const ppc = ref()

const getPpc = async () => {
        try{
            const response = await api.get(`/ppcs/${ppc_id}`)
            ppc.value = response.data
            console.log(response.data)

            nome.value = ppc.value.nome
            ch.value = ppc.value.ch
            n_semestres.value = ppc.value.n_semestres
            justificativa.value = ppc.value.justificativa
            impacto.value = ppc.value.impacto
            disciplinas.value = ppc.value.disciplinas
            status.value = ppc.value.status
        }catch(error) {
                console.error('Erro ao buscar PPC:', error)
            }
        }
            
    if(update){
        getPpc()       
    }

const salvarPpc = async () => {
        try {
           const response = await api.post('/ppcs', {
                nome: nome.value,
                ch: ch.value,
                n_semestres: n_semestres.value,
                justificativa: justificativa.value,
                impacto: impacto.value,
                disciplinas: disciplinas.value,
                status: status.value,
                faculdade_id: Number(route.query.faculdade_id),
                tecnico_id: Number(route.query.tecnico_id)
        })

        alert('PPC criado com sucesso!')
        enviarRespostaFaculdade(response.data.id)

        // limpar campos
        nome.value = ''
        ch.value = 0
        n_semestres.value = 0
        justificativa.value = ''
        impacto.value = ''
        disciplinas.value = ''
        status.value = 1

        }catch (error) {
            console.log(error)
            alert('Erro ao salvar PPC')
        }
    } 
    


const atualizarPpc = async () => {
            try {
                await api.put(`/ppcs/${ppc_id}`, 
                {
                    nome: nome.value,
                    ch: ch.value,
                    n_semestres: n_semestres.value,
                    justificativa: justificativa.value,
                    impacto: impacto.value,
                    disciplinas: disciplinas.value,
                    status: status.value,
                    faculdade_id: Number(route.query.faculdade_id),
                    tecnico_id: 1
                })

                alert('PPC atualizado com sucesso!')

                enviarRespostaFaculdade(ppc_id)

                // limpar campos
                nome.value = ''
                ch.value = 0
                n_semestres.value = 0
                justificativa.value = ''
                impacto.value = ''
                disciplinas.value = ''
                status.value = 1
            }catch (error) {
                console.log(error.response?.data)
                console.log(error.response?.status)
                alert('Erro ao atualizar o PPC')
        }
}

const enviarRespostaFaculdade = async ( ppc_id : number) => {
        try {
            await api.post('/analise-ppcs', {
                ppc_id: ppc_id,
                content: '23'
        })
                alert('Resposta enviada')

        }catch (error) {
            console.error('Erro ao buscar PPC:', error)
        }
} 


function retornaTelaInicial() {
    if(update){
         router.push({
        path: '/processo-ppc-faculdade',
        query:{ 
            update: 'true',
            ppc_id: route.query.ppc_id,
            faculdade_id: route.query.faculdade_id,
            user_id: route.query.user_id
            }
        })
    }else{
            router.push(`/home-faculdade/${route.query.faculdade_id}`)
    }
}
</script>

<template>
    <div class="container">
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
                <input class="input-number"  v-model.number="ch" type="text">
            </div>
            <div>
                <label>Quantidade de Semestres </label>
                <input class="input-number" v-model.number="n_semestres" type="text">
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
        <div style="display: flex; gap:30px;">
            <button @click="retornaTelaInicial">Cancelar</button>
            <button v-if="update" @click="atualizarPpc">Atualizar</button>
            <button v-else="update" @click="salvarPpc">Enviar</button>
        </div>
    </div>
</template> 

<style scoped>
.container{
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    height: auto;
    background-color: #FFB32F;

}
.container-forms{
    display: flex;
    flex-direction: column;
    justify-content: center;
    background-color: #FF8C00;
    width: 70vw;
    height: auto;
    gap: 10px;
    border-radius: 30px;
    padding-left: 30px;
    padding-top: 20px;
    padding-right: 30px;
    padding-bottom: 20px;
}

h1{
    font-size: 20px;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    margin-top: 25px;
    margin-bottom: 10px;
}

input{
    width: 60%;
    height: 25px;
    font-size: 15px;
}

.input-number{
    max-width: 50px;

}

label{
    font-size: 20px;
}

textarea{
    width: 95%;
    min-height: 150px;
    border-radius: 20px;
    padding: 15px;
    margin-top: 5px;
    font-size: 15px;
}

button{
    border-radius: 10px;
    width: 100px;
    height: 30px;
    margin-top: 20px;
    font-size: 15px;
}
</style>