<?php
	include_once("db/conexao.php");
	$id_empresa = mysqli_insert_id($conecta);
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="estilos/popup.css" rel="stylesheet">
</head>
<body>
	<div id="popup">
		<p id="alert">Atenção!</p>
		<p>O ID:<?php echo 3 ?> será utilizado para acesso ao sistema</p>
	</div>
</body>
</html>