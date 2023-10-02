<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
</head>

<body>
  <form action="/cadastrar-reserva" method="POST" style="display: flex; flex-direction:column; gap:8px; max-width:300px; margin-left:1rem;">
    @csrf
    <h1>Fazer reserva</h1>
    
    
    <!-- <label for="id_reserva">ID da Reserva</label>  
    <input type='text' name='id_reserva'> -->
   
    

    <label for="livro_id">ID do livro</label>
    <input type="text" name="livro_id">

    <label for="mat_aluno">Matrícula do Aluno</label>
    <input type="text" name="mat_aluno">

    <label for="mat_funcionario">Matrícula do Funcionário</label>
    <input type="text" name="mat_funcionario">

    <button>Reservar</button>
  </form>
</body>

</html>