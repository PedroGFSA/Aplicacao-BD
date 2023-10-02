<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
</head>

<body>
  <form action="/cadastrar-livro" method="POST" style="display: flex; flex-direction:column; gap:8px; max-width:300px; margin-left:1rem;">
    @csrf
    <h1>Cadastrar livro</h1>
    <!-- <label for="isbn">ISBN</label>
    <input type="text" name="isbn"> -->

    <label for="titulo">Título</label>
    <input type="text" name="titulo">

    <label for="autor">Autor</label>
    <input type="text" name="autor">

    <label for="categoria">Categoria</label>
    <input type="text" name="categoria">

    <label for="cod_secao">Seção</label>
    <input type="number" name="cod_secao">

    <label for="data_publicacao">Data de publicação</label>
    <input type="date" name="data_publicacao">

    <button>Cadastrar</button>
  </form>
</body>

</html>