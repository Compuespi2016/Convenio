<?php include_once("../db/conexao.php"); ?>
<?php
	$query = "SELECT * FROM curso";
	$query = mysqli_query($conecta,$query);
	if(!$query){
		echo mysqli_error($conecta);
	}
?>


<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="cadastro_convenio.php" method="POST">
			<label for="nome">Curso</label>
			<?php while($dados = mysqli_fetch_assoc($query)) { ?>
				<?php $id = $dados["id"]; ?>
				<?php $nome = $dados["nome"]; ?>
				<input type="checkbox" name="cursos[]" value="<?php echo $id ?>"><?php echo $nome; ?>
			<?php } ?>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>
<?php mysqli_close($conecta) ?>