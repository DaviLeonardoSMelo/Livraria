<?php 
//sessão
session_start();
//conexão
require_once 'db_connect.php'; 

function clear ($input){
	global $connect;
	//sql
	$var = mysqli_escape_string($connect, $input);
	//xss
	$var = htmlspecialchars($var);
	return $var;

if (isset ($_POST['btn-editar'])): //se o botão cadastrar for apertado coloca os seguintes dados no banco de dados.
	$livro = clear($_POST['livro']); // declarando que vou gravar a variavel livro no banco de dados.
	$escritor = clear($_POST['escritor']);
	$data = clear($_POST['data']);
	$id = clear($_POST['id']);

	$sql = "UPDATE livros SET livro = '$livro', escritor = '$escritor', data = '$data' WHERE id = '$id'"; // primeiro os nomes no banco de dados depois os valores das variaveis criadas.

	if(mysqli_query($connect, $sql)); //parametros de conexão e o sql é onde insere os itens no banco de dados
		$_SESSION['mensagem'] = "livro atualizado!";
		header('Location: ../index.php?sucesso');	
	else:
		$_SESSION['mensagem'] = "livro não atualizado!";
		header('Location: ../index.php?erro');
endif;