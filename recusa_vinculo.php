<?php include_once('db/conexao.php'); ?>
<?php
	if(isset($_POST['motivo'])){
		$motivo = $_POST['motivo'];
		$query = "UPDATE vinculo SET status='recusado',motivo='$motivo' WHERE id=".$_GET["id"];
		$query = mysqli_query($conecta,$query);

		if($query){
			header('location: solicitacoes_vinculo.php');
		}else{
			alert('Erro ao atualizar o vinculo');
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/tabela.css" rel="stylesheet">
	<link href="estilos/cadastro.css" rel="stylesheet">
	<title>Cancelar convênio</title>
</head>
<body>
	<?php require('include/topo.php') ?>
	<form action="recusa_vinculo.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<input type="text" style="color: black" placeholder="Motivo" name="motivo" maxlength="200">
		<button type="submit">Confirmar</button>
	</form>
</body>
</html>