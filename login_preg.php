<?php
include_once('db/conexao.php');
	if (isset($_POST['id'])){
		$id = $_POST['id'];
 		$senha = $_POST['senha'];
 		$query = "SELECT * FROM user_preg WHERE id = '$id' AND senha = '$senha' ";
 		$sql =  mysqli_query($conecta,$query) or die(mysqli_error());
		$dados = mysqli_fetch_assoc($sql);
		$row = mysqli_num_rows($sql);
		if ($row > 0) {
			session_start();
			$_SESSION['id'] = $dados['id'];
			echo "<center>Logado com sucesso, aguarde .... </center>";
			header("location: home_preg.php");
			exit();
			///echo "<script>loginsuccessfully()</script>";
		}
		else{
			echo "<center>Id ou senha invalidos tente novamente</center>";
			header("location: login_preg.php");
			exit();
			///-echo "<script>loginfailed()</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Preg</title>
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/login.css" rel="stylesheet">
	<script type="text/javascript">
		function loginsuccessfully(){
			setTimeout("window.location = 'home_preg.php'",1000);
		}
		function loginfailed(){
			setTimeout("window.location = 'login_preg.php'",1000);
		}
	</script>
</head>
<body>
	<?php require('include/topo.php') ?>
	<form id="login" action="login_preg.php" method="POST">
		<div id="titulo_divisao">Login PREG</div>
		<input type="text" name="id" placeholder="ID" maxlength="10">
		<input type="password" name="senha" placeholder="Senha" maxlength="30">
		<div id="divisao_login"></div>
		<input id="submit" type="submit" value="Logar">
	</form>	
</body>
</html>