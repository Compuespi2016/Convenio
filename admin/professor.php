<?php
include_once('../db/conexao.php');
	if(isset($_POST['nome'])){
		$nome = $_POST['nome'];
		$matricula = $_POST['matricula'];
		$curso = $_POST['curso'];
		$senha = $_POST['senha'];
		$confirmarsenha = $_POST['confirmarsenha'];
		
		$query = "INSERT INTO professor (nome,matricula,curso_id,senha) VALUES ('$nome','$matricula',".$curso.",'$senha')";
		if($senha == $confirmarsenha){
			$query = mysqli_query($conecta,$query);	
		}else{
			alert('Senha é diferente de confirmar senha');
		}
	}
	$curso = "SELECT * FROM curso";
	$curso = mysqli_query($conecta,$curso);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Professor</title>
	<link href="../estilos/popup.css" rel="stylesheet">
	<link href="../estilos/cadastro.css" rel="stylesheet">
	<link href="../estilos/topo.css" rel="stylesheet">
</head>
<body>
	<?php require('../include/topo.php') ?>
	<form id="cadastro" action="professor.php" method="POST">
		<div id="titulo_divisao">Cadastro de professores</div>

		<input type="text" name="nome" maxlength=50 placeholder="Nome">
		
		<input type="text" name="matricula" maxlength=7 placeholder="Matricula">
		
		<select name="curso" style="margin-top:20px">
            <?php while($cursos = mysqli_fetch_assoc($curso)) { ?>
            	<option value='<?php echo $cursos['id']; ?>'><?php echo $cursos['nome']; ?></option>
            <?php } ?>
        </select>
		
		<input type="password" name="senha" maxlength=20 placeholder="Senha">

		<input type="password" name="confirmarsenha" maxlength=20 placeholder="Confirmar Senha">
		
		<div id="divisao"></div>

		<button type="submit">Cadastrar</button>
	</form>
<script type="text/javascript">
</script>

</body>
</html>