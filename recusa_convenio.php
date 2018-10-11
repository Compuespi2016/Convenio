<?php include_once('db/conexao.php'); ?>
<?php
	$query = "DELETE FROM solicitacoes WHERE empresa_id=".$_GET["id"];
	$query = mysqli_query($conecta,$query);
	if($query){
		header('location: solicitacoes.php');
	}else{
		echo "erro";
	}
?>