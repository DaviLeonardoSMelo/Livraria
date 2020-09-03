
<?php


include_once 'php_action/db_connect.php';

//header

include_once 'includes/header.php';

//mensagem

include_once 'includes/mensagem.php';
?>
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    
<link rel="stylesheet" type="text/css" href="style.css">

<div class="row" id="container1"> 
  <div class="col 12 m6 push-m3 ">
    <h1 class="light">Livros</h1>
    <table class="highlight">
      <thead>
        <tr>
          <th>Livro</th>
          <th>Escritor</th>
          <th>ano do livro</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM livros";
        $resultado = mysqli_query($connect,$sql);

        if(mysqli_num_rows($resultado) > 0):
        while($dados = mysqli_fetch_array($resultado)):
        ?>
        <tr>
          <td><?php echo $dados['livro']; ?></td>
          <td><?php echo $dados['escritor']; ?></td>
          <td><?php echo $dados['data']; ?></td>
          <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
          <div id="modal<?php echo $dados['id']; ?>" class="modal">
            <div class="modal-content">
             <h4>Deletar</h4>
              <p>quer mesmo deletar?</p>
            </div>
              <div class="modal-footer">
                
                <form action="php_action/delete.php" method="post"> 
                  <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                  <button type="submit" name="btn-deletar" class="btn red">Sim</button>
                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                </form>
            </div>
         </div>

          <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating blue"><i class="material-icons">edit</i></a></td>
        </tr>
        <?php 
        endwhile;
        else:?>
        <tr>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
        </tr> 
        <?php      
        endif;
        ?>
      </tbody>
    </table>
    <foot>
    <a href="adicionar.php" class="btn" id="addbtn">adicionar livro </a>
    </foot>
</div>

<?php
//footer
include_once 'includes/footer.php';
?>