<template>
    <section class="content">
        <div class="main">
            
            <div class="table-content">
                <table class="table table-hover table-striped-columns demo">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Verificado</th>
                            <th scope="col">Data de Criação</th>
                            <th scope="col">Data de Atualização</th>
                        </tr>
                        </thead>

                    <tbody>
                        <tr v-for="item in usuarios" :key="item.id">
                        <td scope="row">{{ item.id }}</td>
                        <td scope="row">{{ item.usuario }}</td>
                        <td scope="row">{{ item.email }}</td>
                        <td scope="row">{{ item.verificado }}</td>
                        <td scope="row">{{ item.created_at }}</td>
                        <td scope="row">{{ item.updated_at }}</td>
                            <td>
                                <button @click="editarUsuario(item.id)" class="btn btn-info">Editar</button>
                                <button @click="excluirUsuario(item.id)" class="btn btn-danger">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--Criar Usuario-->
            <!-- Botão para criar novo usuário -->
            <button @click="toggleForm" class="btn btn-success">Criar Usuário</button>

            <!-- Formulário para adicionar novo usuário (inicialmente oculto) -->
            <div v-if="mostrarForm">
            <h2>Novo Usuário</h2>
            <form @submit.prevent="criarUsuario">
                <!-- Campos do formulário para adicionar usuário -->
                <label for="novoNome">Nome:</label>
                <input v-model="novoUsuario.usuario" type="text" id="novoNome" required>

                <label for="novoEmail">Email:</label>
                <input v-model="novoUsuario.email" type="email" id="novoEmail" required>

                <!-- Adicione mais campos conforme necessário -->

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            </div>
            <!--Editar Usuario -->
            <!-- Formulário de edição -->
            <div v-if="usuarioSelecionado" class="form">
            <h2>Editar Usuário</h2>
            <form @submit.prevent="salvarEdicao">
                <!-- Campos do formulário para edição -->
                <label for="editNome">Nome:</label>
                <input v-model="usuarioSelecionado.usuario" type="text" id="editNome" required>

                <label for="editEmail">Email:</label>
                <input v-model="usuarioSelecionado.email" type="email" id="editEmail" required>

                <!-- Adicione mais campos conforme necessário -->

                <button type="submit" class="btn btn-primary">Salvar Edição</button>
                <button @click="cancelarEdicao" class="btn btn-secondary">Cancelar</button>
            </form>
            </div>

    </div>
        
    </section>
</template>
<script>
import Usuario from '../services/usuarios';
export default {

data() {
    return {
        usuarios: [],
    };
},

    mounted() {
        Usuario.listar().then(res => {
            console.log(res.data)
            this.usuarios = res.data;
        })
    },
    
}
</script>
<style>
.content {
    width: 100%;
    height: 10vh;
}
.main {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.form{
    width: 100%;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 50px;
    padding: 50px;
}
.form-content{
    display: flex;
    flex-wrap: wrap;
    margin: 10px;
    padding: 10px;
    flex-direction: column;
    justify-content: center;
    align-content: center;
}
.table-main{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}
.demo {
    border: 1px double #000;
    margin-top: 20px;
}
</style>