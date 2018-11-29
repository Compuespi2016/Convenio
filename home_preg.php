<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/menu_home.css" rel="stylesheet">
</head>
<body>
	<?php 
		require('include/topo.php');
		session_start();
	?>
	<h2>Bem Vindo <strong>PREG</strong>,</h2>
	<div id="menu_preg">
		<div id="menu_div1">
			<a href="solicitacoes.php">Solicitações Convênio</a>
			<a href="solicitacoes_vinculo.php">Solicitações Vínculos</a>
		</div>
		<div id="menu_div1">
			<a href="empresas_conveniadas.php">Empresas Conveniadas</a>
			<a href="alunos_vinculados.php">Alunos Vinculados</a>
		</div>
		<div id="menu_div1">
			<a href="include/logout.php">Sair</a>
		</div>
	</div>

</body>
</html>