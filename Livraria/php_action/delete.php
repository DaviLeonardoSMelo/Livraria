<?php 
//sessão
session_start();
//conexão
require_once 'db_connect.php'; //conexão com banco de dados

if (isset ($_POST['btn-deletar'])): //se o botão cadastrar for apertado coloca os seguintes dados no banco de dados.
	
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM livros WHERE id = '$id' "; 

	if(mysqli_query($connect, $sql)); //parametros de conexão e o sql é onde insere os itens no banco de dados
		$_SESSION['mensagem'] = "livro deletado!";
		header('Location: ../index.php?sucesso');	
	else:
		$_SESSION['mensagem'] = "livro não deletar!";
		header('Location: ../index.php?erro');
endif;