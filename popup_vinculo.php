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
		<p id="alert">Solicitação Realizada com sucesso!</p>
		<p>Sua solicitação de vínculo foi enviada com sucesso para análise pela PREG. Você receberá em breve uma mensagem informando a nossa decisão.</p>
		<a href="home_professor.php">Ir para home</a>
	</div>
</body>
</html>