<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
</head>

<body>
  <form action="/atualizar-reserva/{{$reserva->id}}" method="POST" style="display: flex; flex-direction:column; gap:8px; max-width:300px; margin-left:1rem;">
    @csrf
    @method("PUT")
    <h1>Atualizar reserva</h1>
     

    <label for="livro_isbn">ID do Livro</label>
    <input type="text" name="livro_id" value="{{$reserva->livro_id}}">

    <label for="mat_aluno">Matrícula do Aluno</label>
    <input type="text" name="mat_aluno" value="{{$reserva->mat_aluno}}">

    <label for="mat_funcionario">Matrícula do Funcionário</label>
    <input type="text" name="mat_funcionario" value="{{$reserva->mat_funcionario}}">

    <button>Atualizar</button>
  </form>
</body>

</html>