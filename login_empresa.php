<?php
include_once('db/conexao.php');
	if (isset($_POST['id'] )) {
		$id = $_POST['id'];
		$senha = $_POST['senha'];
		$query = "SELECT * FROM user_empresa WHERE id = '$id' AND senha = '$senha' ";
		$sql =  mysqli_query($conecta,$query) or die(mysqli_error());	# code...
		$dados = mysqli_fetch_assoc($sql);
		$row = mysqli_num_rows($sql);
		if ($row > 0) {
			session_start();
			$_SESSION['id'] = $dados["id"];
			header("location: home_empresa.php");
			die();
			//echo "<center>Logado com sucesso, aguarde .... </center>";
			//echo "<script>loginsuccessfully()</script>";
		}
		else{
			header("location: login_empresa.php");
			die();
			//echo "<center>Id ou senha invalidos tente novamente</center>";
			//echo "<script>loginfailed()</script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/login.css" rel="stylesheet">

	<script type="text/javascript">

		function loginsuccessfully(){
			setTimeout("window.location = 'index.php'",1000);
		}
		function loginfailed(){
			setTimeout("window.location = 'login_empresa.php'",1000);
		}
	</script>
</head>
<body>
	<?php require('include/topo.php') ?>
	
	<form id="login" action="login_empresa.php" method="POST">
		<div id="titulo_divisao">Login empresa</div>
		<input type="text" name="id" placeholder="ID">
		<input type="password" name="senha" placeholder="Senha">
		<div id="divisao_login"></div>
		<input type="submit" value="Logar">
	</form>

</body>
</html>