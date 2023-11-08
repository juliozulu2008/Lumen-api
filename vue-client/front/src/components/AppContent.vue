<template>
    <section class="content">
        <div class="main">
            <div class="form">
                <form class="form-content">
                  <label>Nome</label>
                  <input type="text" placeholder="Nome" v-model="usuarios.nome" >
                  <label>Email</label>
                  <input type="number" placeholder="email@email.com" v-model="usuarios.email" >
                  <label>Password</label>
                  <input type="password" placeholder="xpto@123" v-model="usuarios.password" >
                  <button class="btn-salvar">Salvar</button>
              </form>
            </div>
            <div class="table">
                <table class="table-main">
                  <thead>
                    <tr>
                      <th>NOME</th>
                      <th>EMAIL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="usuario of usuarios" :key="usuario.id">
                      <td>{{ usuario.nome }}</td>
                      <td>{{ usuario.email }}</td>
                      <td>
                        <button @click="editar(usuario)" class="btn-edit">Criar</button>
                        <button @click="remover(usuario)" class="btn-delete">Deletar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
    }
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
</style>