<?php
	include_once("db/conexao.php");
	$id_empresa = mysqli_insert_id($conecta);
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="/convenio/estilos/popup.css" rel="stylesheet">
	<link href="/convenio/estilos/topo.css" rel="stylesheet">
</head>
<body>
	<?php include_once('include/topo.php'); ?>
	<div id="popup">
		<p id="alert">Atenção!</p>
		<p>O código de identificação da sua empresa é:  <b><?php echo $_GET["id"]; ?></b> <br><br>Este código deverá ser utilizado no campo ID para realizar login no sistema de convênio.</p>
		<a href="login_empresa.php">Ir para login</a>
	</div>
</body>
</html>