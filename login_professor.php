<?php
include_once('db/conexao.php');
	if (isset($_POST['matricula'])){
		$id = $_POST['matricula'];
 		$senha = $_POST['senha'];
 		$query = "SELECT * FROM professor WHERE matricula = '$id' AND senha = '$senha' LIMIT 1";
 		echo $query;
 		$sql =  mysqli_query($conecta,$query) or die(mysqli_error());
        $dados = mysqli_fetch_assoc($sql);
		$row = mysqli_num_rows($sql);
		if ($row > 0) {
			session_start();
			$_SESSION['id'] = $dados['id'];
			$_SESSION['nivel'] = 2;
			header("location: home_professor.php");
		}
		else{
			echo "<script>alert('Matrícula ou senha inválidos')</script>";
			//header("location: login_preg.php");
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Professor</title>
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/login.css" rel="stylesheet">
</head>
<body>
	<?php require('include/topo.php') ?>
	<form id="login" action="login_professor.php" method="POST">
		<div id="titulo_divisao">LOGIN PROFESSOR</div>
		<input type="text" name="matricula" placeholder="Matricula" maxlength="6">
		<input type="password" name="senha" placeholder="Senha" maxlength="30">
		<div id="divisao_login"></div>
		<input type="submit" value="Logar">
	</form>	
</body>
</html>