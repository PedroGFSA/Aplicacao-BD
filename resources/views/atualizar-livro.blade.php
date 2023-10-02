<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
</head>

<body>
  <form action="/atualizar-livro/{{$livro->id}}" method="POST" style="display: flex; flex-direction:column; gap:8px; max-width:300px;">
    @csrf
    @method("PUT")
    <h1>Atualizar livro</h1>
    <!-- <label for="isbn">ISBN</label>
    <input type="text" name="isbn" value="{{$livro->isbn}}"> -->

    <label for="titulo">Título</label>
    <input type="text" name="titulo" value="{{$livro->titulo}}">

    <label for="autor">Autor</label>
    <input type="text" name="autor" value="{{$livro->autor}}">

    <label for="categoria">Categoria</label>
    <input type="text" name="categoria" value="{{$livro->categoria}}">

    <label for="cod_secao">Seção</label>
    <input type="number" name="cod_secao" value="{{$livro->cod_secao}}">

    <label for="data_publicacao">Data de publicação</label>
    <input type="date" name="data_publicacao" value="{{$livro->data_publicacao}}">


    <button>Atualizar</button>
  </form>
</body>

</html>