<?php include_once('db/conexao.php'); ?>
<?php
	$query = "UPDATE vinculo SET status='recusado' WHERE id=".$_GET["id"];
	$query = mysqli_query($conecta,$query);
	if($query){
		header('location: solicitacoes_vinculo.php');
	}else{
		alert('Erro ao atualizar o vinculo');
	}
?>