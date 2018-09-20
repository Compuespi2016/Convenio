<?php include_once("../db/conexao.php"); ?>
<?php
	$query = "SELECT * FROM curso";
	$query = mysqli_query($conecta,$query);
	if(!$query){
		echo mysqli_error($conecta);
	}
	if(isset($_POST["nome"])){
		$checkbox = $_POST["cursos"]
		foreach($checkbox as $valor){
			$query_checkbox = "INSERT INTO convenios (empresa_id,curso_id) VALUES (".$_SESSION["id"].",".$valor.")";
			$query_checkbox = mysqli_query($conecta,$query_checkbox);
		}
	}
?>

<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<form action="cadastro_convenio.php" method="POST">
			<label for="nome">Curso</label>
			<?php while($dados = mysqli_fetch_assoc($query)) { ?>
				<?php $id = $dados["id"]; ?>
				<?php $nome = $dados["nome"]; ?>
				<input type="checkbox" name="cursos[]" value="<?php echo $id ?>"><?php echo utf8_decode($nome); ?>
			<?php } ?>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>
<?php mysqli_close($conecta) ?>