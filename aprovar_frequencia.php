<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: index.php");
	exit();
}
if(isset($_GET["id"])){
	$atualiza_aprovado = "UPDATE vinculo SET motivo_freq='Normal' WHERE id=".$_GET["id"];
	$atualiza_aprovado = mysqli_query($conecta,$atualiza_aprovado);
	if($atualiza_aprovado){
		header("location: frequencia.php?atualizado=true");
	}else{
		echo mysqli_error($conecta);
	}
}