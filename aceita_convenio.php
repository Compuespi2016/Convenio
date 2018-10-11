<?php include_once('db/conexao.php'); ?>
<?php
	session_start();
	$id_empresa = $_GET['id'];
	$select = "SELECT empresa_id,curso_id FROM solicitacoes WHERE empresa_id=".$id_empresa;
	$select = mysqli_query($conecta,$select);
	while($dados = mysqli_fetch_assoc($select)){
		$query = "INSERT INTO convenios (empresa_id,curso_id) VALUES (".$dados['empresa_id'].",".$dados['curso_id'].")";
		$insert = mysqli_query($conecta,$query);
		if(!$insert){
			echo mysqli_error($insert);
		}
		$deleta = "DELETE FROM solicitacoes WHERE empresa_id=".$dados['empresa_id']." AND curso_id=".$dados['curso_id'];
		$deleta = mysqli_query($conecta,$deleta);
		if(!$deleta){
			echo mysqli_error($deleta);
		}
	}
	header('location: solicitacoes.php');
?>