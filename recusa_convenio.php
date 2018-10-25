<?php include_once('db/conexao.php'); ?>
<?php
	$query = "DELETE FROM solicitacoes WHERE empresa_id=".$_GET["id"];
	$query = mysqli_query($conecta,$query);

	$update = "UPDATE user_empresa SET recusado='sim' WHERE id=".$_GET["id"];
	$update = mysqli_query($conecta,$update);
	
	if($update){
		header('location: solicitacoes.php');
	}else{
		echo "erro";
	}
?>