<?php
//header
include_once 'includes/header.php';
?>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
 

<div class="row" id="container2">
  <div class="col 12 m6 push-m3 ">
    <h3 class="light">Novo Livro</h3>
    <form action="php_action/create.php" method="post">
      <div class="input-field col s12">
        <input type="text" name="livro" id="livro">
        <label for="livro">livro</label>
      </div>
      <div class="input-field col s12">
        <input type="text" name="escritor" id="escritor">
        <label for="escritor">Escritor</label>
      </div>
      <div class="input-field col s12">
        <input type="text" name="data" id="data">
        <label for="anolivro">ano do livro</label>
      </div>

      <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
      <a href="index.php" type="submit" class="btn green">Lista de livros</a>
    </form>
</div>

<?php
//footer
include_once 'includes/footer.php';
?>