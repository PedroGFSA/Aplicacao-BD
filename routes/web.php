<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Pessoa;
use App\Models\Livro;
use App\Models\Reserva;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastrar-livro', function () {
  return view('cadastrar-livro');
});

Route::post('/cadastrar-livro', function(Request $dados) {
  Livro::create([
    'titulo' => $dados->titulo,
    'autor' => $dados->autor,
    'categoria' => $dados->categoria,
    'cod_secao' => $dados->cod_secao,
    'data_publicacao' => $dados->data_publicacao,
  ]);
  echo "Livro cadastrado com sucesso!";
});

Route::get('/mostrar-livro/{id}', function($id) {
  $livro = Livro::findOrFail($id);
  echo "ID do Livro: " . $livro->id;
  echo "<br/>";
  echo "Título: " . $livro->titulo;
  echo "<br/>";
  echo "Autor: " . $livro->autor;
  echo "<br/>";
  echo "Categoria: " . $livro->categoria;
  echo "<br/>";
  echo "Código da seção: " . $livro->cod_secao;
  echo "<br/>";
  echo "Data de publicação: " . $livro->data_publicacao;
});

Route::get('/atualizar-livro/{id}', function($id) {
  $livro = Livro::findOrFail($id);
  return view("atualizar-livro", ["livro" => $livro]);
});

Route::put("/atualizar-livro/{id}", function(Request $dados, $id) {
 $livro = Livro::findOrFail($id);
 $livro->titulo = $dados->titulo;
 $livro->autor = $dados->autor;
 $livro->categoria = $dados->categoria;
 $livro->cod_secao = $dados->cod_secao;
 $livro->data_publicacao = $dados->data_publicacao;
 $livro->save();
 echo "Livro atualizado com sucesso!";
});

Route::get("/deletar-livro/{id}", function($id) {
  $livro = Livro::findOrFail($id);
  $livro->delete();
  echo "Livro deletado com sucesso!";
});

///////////////////////////////////////////////////////////////////////////////////

Route::post('/cadastrar-pessoa', function(Request $dados) {
  Pessoa::create([
    'cpf' => $dados->cpf,
    'primeiro_nome' => $dados->primeiro_nome,
    'sobrenome' => $dados->sobrenome,
    'telefone' => $dados->telefone,
    'email' => $dados->email,
    'data_nascimento' => $dados->data_nascimento,
  ]);
  echo "Pessoa adicionada com sucesso!";
});

Route::get('/mostrar-pessoa/{cpf}', function($cpf) {
  $pessoa = Pessoa::findOrFail($cpf);
  echo "CPF: " . $pessoa->cpf;
  echo "<br/>";
  echo "Nome: " . $pessoa->primeiro_nome;
  echo "<br/>";
  echo "Sobrenome: " . $pessoa->sobrenome;
  echo "<br/>";
  echo "Telefone: " . $pessoa->telefone;
  echo "<br/>";
  echo "Email: " . $pessoa->email;
  echo "<br/>";
  echo "Data de nascimento: " . $pessoa->data_nascimento;
});

Route::get('/atualizar-pessoa/{cpf}', function($cpf) {
  $pessoa = Pessoa::findOrFail($cpf);
  return view("atualizar-pessoa", ["pessoa" => $pessoa]);
});

Route::put("/atualizar-pessoa/{cpf}", function(Request $dados, $cpf) {
 $pessoa = Pessoa::findOrFail($cpf);
 $pessoa->cpf = $dados->cpf;
 $pessoa->primeiro_nome = $dados->primeiro_nome;
 $pessoa->sobrenome = $dados->sobrenome;
 $pessoa->telefone = $dados->telefone;
 $pessoa->email = $dados->email;
 $pessoa->data_nascimento = $dados->data_nascimento;
 $pessoa->save();
 echo "Pessoa atualizada com sucesso!";
});

Route::get("/deletar-pessoa/{cpf}", function($cpf) {
  $pessoa = Pessoa::findOrFail($cpf);
  $pessoa->delete();
  echo "Pessoa deletada com sucesso!";
});

/////////////////////////////////////////////////////////////////////////

Route::get('/cadastrar-reserva', function () {
  return view('cadastrar-reserva');
});

Route::post('/cadastrar-reserva', function(Request $dados) {
  $reserva = Reserva::create([
    'livro_id' => $dados->livro_id,
    'mat_aluno' => $dados->mat_aluno,
    'mat_funcionario' => $dados->mat_funcionario,
  ]);
  
  // Entidade criada a partir do relacionamento (livro_reserva)
  $livro = Livro::findOrFail($dados->livro_id);
  $reserva->livros()->attach($livro->id);
  echo "Reserva feita com sucesso!";
});

Route::get('/mostrar-reserva/{id}', function($id) {
  $reserva = Reserva::findOrFail($id);
  echo "ID do Livro: " . $reserva->livro_id;
  echo "<br/>";
  echo "Matrícula do aluno: " . $reserva->mat_aluno;
  echo "<br/>";
  echo "Matrícula do funcionário: " . $reserva->mat_funcionario;
});

Route::get('/atualizar-reserva/{id}', function($id) {
  $reserva = Reserva::findOrFail($id);
  return view("atualizar-reserva", ["reserva" => $reserva]);
});

Route::put("/atualizar-reserva/{id}", function(Request $dados, $id) {
 $reserva = Reserva::findOrFail($id);
 $reserva->livros()->detach($reserva->livro_id);
 $reserva->livro_id = $dados->livro_id;
 $reserva->mat_aluno = $dados->mat_aluno;
 $reserva->mat_funcionario = $dados->mat_funcionario;
 $reserva->livros()->attach($dados->livro_id);
 $reserva->save();
 echo "Reserva atualizada com sucesso!";
});

Route::get("/deletar-reserva/{id}", function($id) {
  $reserva = Reserva::findOrFail($id);
  $reserva->livros()->detach($reserva->livro_id);
  $reserva->delete();
  echo "Reserva desfeita com sucesso!";
});

////////////////////////////////////////////////////////////////////////////
