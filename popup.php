<?php
	include_once("db/conexao.php");
	$id_empresa = mysqli_insert_id($conecta);
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="/convenio/estilos/popup.css" rel="stylesheet">
</head>
<body>
	<div id="popup">
		<p id="alert">Atenção!</p>
		<p>ID: <?php echo $_GET["id"]; ?> <br>Deverá ser utilizado para acessar o sistema.</p>
		<button>Ir para login</button>
	</div>
</body>
</html>