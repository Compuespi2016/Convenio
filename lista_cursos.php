<?php include_once('db/conexao.php') ?>
<?php
	if(isset($_GET["id"])){
		$query = "SELECT c.nome FROM solicitacoes s,curso c WHERE s.empresa_id =".$_GET["id"]." AND s.curso_id = c.id";
		$query = mysqli_query($conecta,$query);
		if(!$query){
			echo mysqli_error($conecta);
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/cursos.css" rel="stylesheet">
	<link href="estilos/lista_cursos.css" rel="stylesheet">
</head>
<body>
	<?php require('include/topo.php') ?>
	<ul id="cursos">
		<?php while($dados = mysqli_fetch_assoc($query)){ ?>
				<li><?php echo $dados["nome"] ?></li>
		<?php } ?>
	</ul>
</body>
</html>