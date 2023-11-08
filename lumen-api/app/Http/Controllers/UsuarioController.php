<?php

namespace App\Http\Controllers;

use App\Models\Usuario; //Carregar a model de usuario
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //Metodo Get all
    public function index()
    {
        return response()->json(Usuario::all()); //Retorna Todos os usuarios do Banco
    }

    //Metodo Create
    public function create(Request $request)

    {
        //validação dos dados
        $this->validate($request, [
            'usuario' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);
        //dados a serem salvos
        $usuario = new Usuario();
        $usuario->usuario = $request->input('usuario');
        $usuario->password = $request->input('password');
        $usuario->email = $request->input('email');
        //medoto de salvar
        $usuario->save();
        return response()->json($usuario);
    }
    //Metodo Get By Id
    public function show(Request $request)
    {
        //Busca por Id
        $usuario = Usuario::find($request->id);
        if (!$usuario) {
            return response()->json("Erro Usuario nao encontrado.");
        }
        return response()->json($usuario);
    }
    //Metodo Update
    public function update(Request $request, $id)
    {
        //Busca por Id
        $usuario = Usuario::find($request->id);
        if (!$usuario) {
            return response()->json("Erro Usuario nao encontrado.");
        }
        //Update dos Dados
        $usuario->usuario = $request->input('usuario');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        //salvar as alteraçoes no Banco
        $usuario->save();
        // rotornar visualizçao dos dados salvos
        return response()->json(['message' => 'Usuário Atualizado com Sucesso!', 'usuario' => $usuario]);
    }
    public function destroy($id)
    {
        //Busca por Id
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json("Erro Usuario nao encontrado.");
        }
        $usuario->delete();
        return response()->json(['message' => 'Usuário Deletado com Sucesso!'], 200);
    }
}
