<?php include_once('db/conexao.php'); ?>
<?php
	$query = "DELETE FROM solicitacoes WHERE empresa_id=".$_GET["id"];
	$query = mysqli_query($conecta,$query);
	if($query){
		header("location: home_preg.php");
	}else{
		echo "erro"
	}
?>