<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center text-dark mt-2">Usuarios</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-header">
                    Adicionar registro
                </div>
                <div class="card-body">
                    <form @submit.prevent="save">

                        <div class="form-group">
                            <label>Usuario nome</label>
                            <input type="text" v-model="usuarios.nome" class="form-control" placeholder="nome">

                        </div>
                        <div class="form-group">
                            <label>Usuario e-mail</label>
                            <input type="text" v-model="usuarios.email" class="form-control" placeholder="e-mail">

                        </div>

                        <div class="form-group">
                            <label>Senha</label>
                            <input type="text" v-model="usuarios.senha" class="form-control" placeholder="Password">

                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Lista de Usuarios</h2>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Senha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="usuario in usuarios" v-bind:key="usuario.id">

                            <td>{{ usuario.id }}</td>
                            <td>{{ usuario.nome }}</td>
                            <td>{{ usuario.email }}</td>
                            <td>{{ usuario.senha }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" @click="edit(usuario)">Edit</button>
                                <button type="button" class="btn btn-danger" @click="remove(usuario)">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import Usuario from '../services/usuarios';
export default {

data() {
    return {
        usuarios: [],
        usuario: {
            id: '',
            nome: '',
            email: '',
            senha: ''
        }
    };
},

    mounted() {
        Usuario.listar().then(res => {
            console.log(res.data)
            this.usuarios = res.data;
        })
    },
    save() {
        if (this.usuarios.id == '')
        {
            this.saveData();
        }
        else
        {
            this.updateData();
        }
    },
    saveData() {
        Usuario.post().then(
            ({ data }) => {
                alert("Salvo!");
                this.usuario
            }
        )
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
.demo {
    border: 1px double #000;
    margin-top: 20px;
}
</style>