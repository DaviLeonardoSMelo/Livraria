<?php
session_start();
//include
require_once 'config.php';

//error_reporting(E_ERROR);

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty(trim($_POST["username"]))){
		$username_err = "nome do usuario por favor."; 
	}
	 else{
	
		$tempname = $_POST['username'];
		$sql = "SELECT id FROM users WHERE username = '$tempname'";

		if($stmt = mysqli_prepare($connect, $sql)){

			mysqli_stmt_bind_param($stmt, "ss", $param_username);			
			
			$param_username = trim($_POST["username"]);
	
			if(mysqli_stmt_execute($stmt)){

				mysqli_stmt_store_result($stmt);
			
				if(mysqli_stmt_num_rows($stmt) > 0){
					$username_err = "esse usuario ja foi cadastrado";
					echo "Opa! deu erro, tente novamente depois.";					
				
					}else{
					$username = trim($_POST["username"]);
				}

				mysqli_stmt_close($stmt);
			}
		}

		if(empty(trim($_POST["password"]))){
			$password_err = "senha por favor!";
		} elseif(strlen(trim($_POST["password"])) < 6){
			$password_err = "senha precisa ter mais de 6 digitos";
		} else{
			$password = trim($_POST["password"]);
		}

		if(empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "por favor confirma a senha.";

		} else{
			$confirm_password = trim($_POST["confirm_password"]);
			if(empty($password_err) && ($password != $confirm_password)){
				$confirm_password_err = "a senha e não foi confirmada corretamente";
			}
		}

		if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
		
			$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
		
			if($stmt = mysqli_prepare($connect, $sql)){

				mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

				$param_username = $username;
				$param_password = password_hash($password,PASSWORD_DEFAULT);

				if(mysqli_stmt_execute($stmt)){
					header("location: index.php");
				} else{
					echo "algo deu errado tente novamente depois.";
				}

				mysqli_stmt_close($stmt);
			}
		}
	}
	mysqli_close($connect);
}
?>