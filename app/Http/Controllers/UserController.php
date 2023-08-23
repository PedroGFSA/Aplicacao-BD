<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
{
  public function create(Request $request)
{
    $dados = json_decode($request->getContent(), true); 

    if (isset($dados[0]['cpf'])) {
        $cpf = $dados[0]['cpf'];
        $nome = $dados[0]['nome'];
        $data_nascimento = $dados[0]['data_nascimento'];

        $usuario = new Usuario();

        $usuario->cpf = $cpf;
        $usuario->nome = $nome;
        $usuario->data_nascimento = $data_nascimento;

        try {
          $usuario->save();
        } catch (\Illuminate\Database\QueryException) {
          return response()->json(['message' => 'Esse cpf ja foi registrado.'], 400);
        }
        
        return response()->json(['message' => 'Registro criado com sucesso']);
    } else {
        return response()->json(['error' => 'Falha no registro'], 400);
    }
}

  public function get($cpf)
  {
    $usuario = Usuario::where('cpf', $cpf)->first();

    if ($usuario) {
      return response()->json($usuario);
    } else {
      return response()->json(['error' => 'Usuário não encontrado'], 404);
    }
  }
}
