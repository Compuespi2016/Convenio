<?php include_once('db/conexao.php');
	session_start();
	if(!isset($_SESSION['id'])) {
		header("location: login_empresa.php");
		exit();
	}

	$query = "DELETE FROM convenios WHERE empresa_id = " . $_SESSION['id'];
	$query = mysqli_connect($conecta,$query);

	$atualiza_recusado = "UPDATE user_empresa SET recusado='vazio' WHERE id=". $_SESSION['id'];
	$atualiza_recusado = mysqli_query($conecta,$atualiza_recusado);
	
	if(!$query){
		echo mysqli_error($conecta);
	}else{
		header('location: home_empresa.php?desfazer=true');
	}
?>