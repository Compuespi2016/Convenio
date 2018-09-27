<?php
include_once('db/conexao.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$senha = $_POST['senha'];
	$query = "SELECT * FROM user_preg WHERE id = '$id' AND senha = '$senha' ";
	$sql =  mysqli_query($conecta,$query) or die(mysqli_error());

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
	<header>
		<div id="topo">
			<img src="http://www.uespi.br/site/wp-content/uploads/2015/01/logo-1.png">
		</div>
		<div id="titulo">
			<p id="setor">PRÓ-REITORIA DE ENSINO E GRADUAÇÃO - PREG</p>
			<p id="convenio_estagio">CONVÊNIOS DE ESTÁGIO</p>
		</div>
	</header>
<form id="login" action="login_empresa.php" method="POST">
	<div id="titulo_divisao">Login PREG</div>
	<input type="text" name="id" placeholder="ID">
	<input type="password" name="senha" placeholder="Senha">
	<div id="divisao_login"></div>
	<input type="submit" value="Logar">


</form>	
</body>
</html>