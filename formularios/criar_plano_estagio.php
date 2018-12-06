 <?php
include_once('../db/conexao.php');
session_start();
	if(isset($_POST['plano'])){
		$id_aluno = $_POST["id_aluno"];
		$id_empresa = $_SESSION["id"];
		$plano = $_POST["plano"];

		$query = "INSERT INTO plano_estagio (aluno_id,empresa_id,plano) VALUES (".$id_aluno.",".$id_empresa.", '$plano')";
		$query = mysqli_query($conecta,$query);
		
		$updateplano_id = "UPDATE vinculo SET plano_id=".mysqli_insert_id($conecta)." WHERE aluno_id=".$id_aluno;
		$updateplano_id = mysqli_query($conecta,$updateplano_id);

		$dados_aluno = $_POST["id_aluno"];
		$dados_aluno = "SELECT * FROM aluno WHERE id=".$dados_aluno;
		$dados_aluno = mysqli_query($conecta,$dados_aluno);
		$dados_aluno = mysqli_fetch_assoc($dados_aluno);
	}
	if(isset($_GET['id_aluno'])){
		$dados_aluno = $_GET["id_aluno"];
		$dados_aluno = "SELECT * FROM aluno WHERE id=".$dados_aluno;
		$dados_aluno = mysqli_query($conecta,$dados_aluno);
		$dados_aluno = mysqli_fetch_assoc($dados_aluno);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Criar plano de estágio</title>
	<link href="../estilos/popup.css" rel="stylesheet">
	<link href="../estilos/cadastro.css" rel="stylesheet">
	<link href="../estilos/topo.css" rel="stylesheet">
</head>
<body>
	<?php require('../include/topo.php') ?>
	<form id="cadastro" action="criar_plano_estagio.php" method="POST">
		<div id="titulo_divisao">Criar plano de estágio</div>
		<p style="color:white;font-size: 20px"><?php echo $dados_aluno["nome"]; ?></p>

		<input type="hidden" name="id_aluno" maxlength=50 value="<?php echo $_GET["id_aluno"] ?>">

		<label for="plano" >Plano de estágio</label>
		<textarea type="text" cols="30" name="plano" maxlength=535></textarea>
		
		<div id="divisao"></div>

		<button type="submit">Registrar plano</button>
	</form>
</body>
</html>