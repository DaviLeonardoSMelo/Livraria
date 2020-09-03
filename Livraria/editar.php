<?php
//conexao
include_once 'php_action/db_connect.php';
//header
include_once 'includes/header.php';
//select
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect,$_GET['id']);

    $sql = "SELECT * FROM livros WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
  <div class="col 12 m6 push-m3 ">
    <h3 class="light">Editar Livro</h3>
    <form action="php_action/update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $dados ['id']; ?>">
      <div class="input-field col s12">
        <input type="text" name="livro" id="livro" value="<?php echo $dados['livro']; ?>">
        <label for="livro">livro</label>
      </div>
      <div class="input-field col s12">
        <input type="text" name="escritor" id="escritor" value="<?php echo $dados['escritor']; ?>">
        <label for="escritor">Escritor</label>
      </div>
      <div class="input-field col s12">
        <input type="text" name="data" id="data" value="<?php echo $dados['data']; ?>">
        <label for="anolivro">ano do livro</label>
      </div>

      <button type="submit" name="btn-editar" class="btn">Atualizar</button>
      <a href="index.php" type="submit" class="btn green">Lista de livros</a>
    </form>
</div>

<?php
//footer
include_once 'includes/footer.php';
?>