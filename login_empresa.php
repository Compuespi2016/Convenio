<?php
	include_once('db/conexao.php');
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$senha = $_POST['senha'];
		$query = "SELECT * FROM user_empresa WHERE id = '$id' AND senha = '$senha' ";
		$sql =  mysqli_query($conecta,$query);
		$row = mysqli_num_rows($sql);
		if ($row > 0) {
			session_start();
			$_SESSION['id'] = mysqli_insert_id($conecta);
				echo "<center>Logado com sucesso, aguarde .... </center>";
				echo "<script>loginsuccessfully()</script>";
		}
		else{
			echo "<center>Id ou senha invalidos tente novamente</center>";
			echo "<script>loginfailed()</script>";
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="estilos/login.css" rel="stylesheet">
	<script>
		function loginsuccessfully(){
			setTimeout("window.location = 'home.php'",1000);
		}
		function loginfailed(){
			setTimeout("window.location = 'login_empresa.php'",1000);
		}
	</script>
</head>
<body>

	<form id="login" action="login_empresa.php" method="POST">
		<input type="text" name="id" placeholder="ID">
		<input type="password" name="senha" placeholder="Senha">
		<button type="submit">Logar</button>
	</form>	
</body>
</html>