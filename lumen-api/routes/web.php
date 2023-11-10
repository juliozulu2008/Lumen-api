<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request; // clase responsavel pelas informaçoes passadas no corpo da requisição.

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Api de Julio Cesar Dias Dos Santos";
});

$router->get('/usuarios', 'UsuarioController@index');
$router->post('/usuarios/cadastrar', 'UsuarioController@create');
$router->get('/usuarios/{id}', 'UsuarioController@show');
$router->put('/usuarios/{id}/atualizar', 'UsuarioController@update');
$router->delete('/usuarios/{id}', 'UsuarioController@destroy');
