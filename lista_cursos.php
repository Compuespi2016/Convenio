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
</head>
<body>
	<header>
		<div id="topo">
			<a href="index.php">
				<img src="http://www.uespi.br/site/wp-content/uploads/2015/01/logo-1.png">
			</a>
		</div>
		<div id="titulo">
			<p id="setor">PRÓ-REITORIA DE ENSINO E GRADUAÇÃO - PREG</p>
			<p id="convenio_estagio">CONVÊNIOS DE ESTÁGIO</p>
		</div>
	</header>

	<ul id="cursos">
		<?php while($dados = mysqli_fetch_assoc($query)){ ?>
				<li><?php echo $dados ?></li>
		<?php } ?>
	</ul>
</body>
</html>