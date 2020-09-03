<?php 
//sessão
session_start();
//conexão
require_once 'db_connect.php'; //conexão com banco de dados
//clear
function clear ($input){
	global $connect;
	//sql
	$var = mysqli_escape_string($connect, $input);
	//xss
	$var = htmlspecialchars($var);
	return $var;
}

if (isset ($_POST['btn-cadastrar'])): 
	$livro = clear( $_POST['livro']); 
	$escritor = clear($_POST['escritor']);
	$data = clear($_POST['data']);

	$sql = "INSERT INTO livros (livro, escritor, data) VALUES ('$livro','$escritor', '$data')"; // primeiro os nomes no banco de dados depois os valores das variaveis criadas.

	if(mysqli_query($connect, $sql)); //parametros de conexão e o sql é onde insere os itens no banco de dados
		$_SESSION['mensagem'] = "livro cadastrado!";
		header('Location: ../index.php?sucesso');	
	else:
		$_SESSION['mensagem'] = "livro não cadastrado!";
		header('Location: ../index.php?erro');
endif;