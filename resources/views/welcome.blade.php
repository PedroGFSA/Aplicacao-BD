<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
</head>

<body>
  <form action="/cadastrar-pessoa" method="POST" style="display: flex; flex-direction:column; gap:8px; max-width:300px;">
    @csrf
    <h1>Cadastrar pessoa</h1>
    <label for="cpf">CPF</label>
    <input type="text" name="cpf">

    <label for="primeiro_nome">Primeiro nome</label>
    <input type="text" name="primeiro_nome">

    <label for="sobrenome">Sobrenome</label>
    <input type="text" name="sobrenome">

    <label for="telefone">Telefone</label>
    <input type="text" name="telefone">

    <label for="email">Email</label>
    <input type="email" name="email">

    <label for="data_nascimento">Data de nascimento</label>
    <input type="date" name="data_nascimento">

    <button>Enviar</button>
  </form>
</body>

</html>