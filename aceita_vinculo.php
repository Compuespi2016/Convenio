<?php include_once('db/conexao.php'); ?>
<?php
	session_start();
	$id_vinculo = $_GET['id'];
	$update = "UPDATE vinculo SET status='aceito' WHERE id=".$id_vinculo;
	$update = mysqli_query($conecta,$update);
	
	if(!$update){
		alert('Erro ao atualizar o vinculo');
	}else{
		header('location: solicitacoes_vinculo.php');
	}
?>