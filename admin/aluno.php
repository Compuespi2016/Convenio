<?php
include_once('../db/conexao.php');
	if(isset($_POST['nome'])){
		$nome = $_POST['nome'];
		$matricula = $_POST['matricula'];
		$periodo = $_POST['periodo'];
		$curso = $_POST['curso'];
		$query = "INSERT INTO aluno (nome,matricula,curso_id,periodo) VALUES ('$nome','$matricula','$curso','$periodo')";
		$query = mysqli_query($conecta,$query);
		if(!$query){
			echo mysqli_error($conecta);
		}
	}
	$curso = "SELECT * FROM curso";
	$curso = mysqli_query($conecta,$curso);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Aluno</title>
	<link href="../estilos/popup.css" rel="stylesheet">
	<link href="../estilos/cadastro.css" rel="stylesheet">
	<link href="../estilos/topo.css" rel="stylesheet">
</head>
<body>
	<?php require('../include/topo.php') ?>
	<form id="cadastro" action="aluno.php" method="POST">
		<div id="titulo_divisao">Cadastro de alunos</div>

		<input type="text" name="nome" maxlength=50 placeholder="Nome">
		
		<input type="text" name="matricula" maxlength=7 placeholder="Matricula">
		
		<select name="curso" style="margin-top:20px">
            <?php while($cursos = mysqli_fetch_assoc($curso)) { ?>
            	<option value="<?php echo $cursos['id']; ?>"><?php echo $cursos['nome']; ?></option>
            <?php } ?>
        </select>
		
		<input type="number" name="periodo" max=12 placeholder="Período">
		
		<div id="divisao"></div>

		<button type="submit">Cadastrar</button>
	</form>
<script type="text/javascript">
</script>

</body>
</html>