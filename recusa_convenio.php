<?php include_once('db/conexao.php'); ?>
<?php
	if(isset($_POST['motivo'])){
		$motivo = $_POST['motivo'];
		$query = "DELETE FROM solicitacoes WHERE empresa_id=".$_GET["id"];
		$query = mysqli_query($conecta,$query);

		$update = "UPDATE user_empresa SET recusado='sim',motivo='$motivo' WHERE id=".$_GET["id"];
		$update = mysqli_query($conecta,$update);
		
		if($update){
		//	header('location: solicitacoes.php');
			echo "deu certo";
		}else{
			echo "erro";
		}
		if(!$query){
			echo msqli_error($conecta);
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/tabela.css" rel="stylesheet">
	<link href="estilos/cadastro.css" rel="stylesheet">
	<title>Recusar convênio</title>
</head>
<body>
	<?php require('include/topo.php') ?>
	<form action="recusa_convenio.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<input type="text" style="color: black" placeholder="Motivo" name="motivo" maxlength="200">
		<button type="submit">Confirmar</button>
	</form>
</body>
</html>