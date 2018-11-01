<?php include_once('db/conexao.php');
	session_start();
	if(!isset($_SESSION['id'])) {
		header("location: login_preg.php");
		exit();
	}
	if(isset($_POST['motivo'])){
		$query = "DELETE FROM convenios WHERE empresa_id = " . $_GET['id'];
		$query = mysqli_connect($conecta,$query);

		$motivo = $_POST['motivo'];
		$descricao = "INSERT INTO user_empresa (motivo) VALUES ('$motivo') WHERE id=".$_GET['id'];
		$descricao = mysqli_query($conecta,$descricao);

		if(!$query){
			echo mysqli_error($conecta);
		}else{
			header('location: home_preg.php');
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
	<form action="cancelar_convenio.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<input type="text" placeholder="Motivo" name="motivo" maxlength="200">
		<button type="submit">Confirmar</button>
	</form>
</body>
</html>