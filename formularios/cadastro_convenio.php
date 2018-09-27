<?php include_once("../db/conexao.php"); ?>
<?php
	$query = "SELECT * FROM curso";
	$query = mysqli_query($conecta,$query);
	if(!$query){
		echo mysqli_error($conecta);
	}
	if(isset($_POST["cursos"])){
		$checkbox = $_POST["cursos"];
		foreach($checkbox as $valor){
			$query_checkbox = "INSERT INTO solicitacoes (empresa_id,curso_id) VALUES (".$_SESSION["id"].",".$valor.")";

			echo $valor;
			$query_checkbox = mysqli_query($conecta,$query_checkbox);
		}
	}
?>

<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../estilos/topo.css" rel="stylesheet">
		<link href="../estilos/cadastro_convenio.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id="topo">
				<a href="../index.php">
				<img src="http://www.uespi.br/site/wp-content/uploads/2015/01/logo-1.png"></a>
			</div>
			<div id="titulo">
				<p id="setor">PRÓ-REITORIA DE ENSINO E GRADUAÇÃO - PREG</p>
				<p id="convenio_estagio">CONVÊNIOS DE ESTÁGIO</p>
			</div>
		</header>
		<form id="checkboxs" action="cadastro_convenio.php" method="POST">
			<div id="check">
				<?php while($dados = mysqli_fetch_assoc($query)) { ?>
					<?php $id = $dados["id"]; ?>
					<?php $nome = $dados["nome"]; ?>
					<input type="checkbox" name="cursos[]" value="<?php echo $id ?>"><?php echo utf8_decode($nome); echo "<br>" ?>
				<?php } ?>
			</div>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>
<?php mysqli_close($conecta) ?>