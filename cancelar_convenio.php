<?php include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_professor.php");
	exit();
}
$query = "delete from convenios where empresa_id = " . $_SESSION['id'];
$query = mysqli_connect($conecta,$query);
if(!$query){
			echo mysqli_error($conecta);
}else{
	header('location: home_empresa.php');
}
?>