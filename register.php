<?php
//includes
include_once 'php_action/register.php';

include_once 'php_action/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cadastre</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="box">
		<h1>Cadastro</h1>
		<p>Por favor preencha para cadastrar!</p>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
				<label>Usuario:</label>
				<input type="text" name="username" class="form-control" value="<?php echo $username; ?>" id="username">
				<span class="help-block"><?php echo $username_err; ?></span>
			</div>
			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
				<label>Senha : </label>
				<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" id="password">
				<span class="help-block"><?php echo $password_err; ?></span>
			</div>
			<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
				<label>Confirmar Senha:</label>
				<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
				<span class="help-block"><?php echo $confirm_password_err; ?></span>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="confirmar">
				<input type="reset" class="btn btn-default" value="resetar">	
			</div>
			<p>Tudo certo tem uma conta? <a href="index.php">fazer login</a></p>
		</form>
</body>
</html>