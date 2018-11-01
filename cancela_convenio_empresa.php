<?php include_once('db/conexao.php');
	session_start();
	if(!isset($_SESSION['id'])) {
		header("location: login_empresa.php");
		exit();
	}

	$query = "DELETE FROM convenios WHERE empresa_id = " . $_SESSION['id'];
	$query = mysqli_query($conecta,$query);

	$descricao = "UPDATE user_empresa SET recusado = 'vazio' WHERE id=".$_SESSION['id'];
	$descricao = mysqli_query($conecta,$descricao);

	if(!$query){
		echo mysqli_error($conecta);
	}else{
		header('location: home_empresa.php?cancelamento=true');
	}
	
?>