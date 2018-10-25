<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/menu_home.css" rel="stylesheet">
</head>
<body>
	<?php require('include/topo.php');
	session_start();
	?>
	<div>
		<?php echo "Bem Vindo PREG";  ?>
	</div>
	<div id="menu">
		<a href="solicitacoes.php">Solicitações Convênio</a>
		<a href="solicitacoes_vinculo.php">Solicitações Vínculos</a>
		<a href="empresas_conveniadas.php">Empresas Conveniadas</a>
		<a href="alunos_vinculados.php">Alunos Vinculados</a>
		<a href="include/logout.php">Sair</a>
	</div>

</body>
</html>