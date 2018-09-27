<?php
include_once('db/conexao.php');
if (isset($_POST['id'] )) {
	$id = $_POST['id'];
 	$senha = $_POST['senha'];
 	$query = "SELECT * FROM user_empresa WHERE id = '$id' AND senha = '$senha' ";
	$sql =  mysqli_query($conecta,$query) or die(mysqli_error());	# code...
 	$row = mysqli_num_rows($sql);
	if ($row > 0) {
		session_start();
		$_SESSION['id'] = mysqli_insert_id($conecta);
		header("location: index.php");
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

<form action="login_empresa.php" method="POST">
	ID USER:<br>
	<input type="text" name="id"><br>
	Senha:<br>
	<input type="password" name="senha"><br>
	<button type="submit"> Logar</button>


</form>	
</body>
</html>