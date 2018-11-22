 <?php
include_once('../db/conexao.php');
session_start();
	if(isset($_POST['plano'])){
		$id_aluno = $_POST["id_aluno"];
		$id_empresa = $_SESSION["id"];
		$plano = $_POST["plano"];
		$avaliacao = $_POST["avaliacao"];
		$nota = $_POST["nota"];
		
		$updateplano_id = "UPDATE plano_estagio SET id_aluno=".$id_aluno.",id_empresa=".$id_empresa. ",plano= '$plano',avaliacao='$plano',nota=".$nota . "	WHERE aluno_id=".$id_aluno;
		$updateplano_id = mysqli_query($conecta,$updateplano_id);

	}

	if(isset($_GET['id_aluno'])){
		$dados_aluno = $_GET["id_aluno"];
		$dados_aluno = "SELECT * FROM aluno WHERE id=".$dados_aluno;
		$dados_aluno = mysqli_query($conecta,$dados_aluno);
		$dados_aluno = mysqli_fetch_assoc($dados_aluno);

		$dados_vinculo = "SELECT * FROM plano_estagio WHERE aluno_id=".$_GET['id_aluno']." AND empresa_id=".$_SESSION['id'];
		$dados_vinculo = mysqli_query($conecta,$dados_vinculo);
		$dados_vinculo = mysqli_fetch_assoc($dados_vinculo);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Criar plano de estágio</title>
	<link href="../estilos/popup.css" rel="stylesheet">
	<link href="../estilos/cadastro.css" rel="stylesheet">
	<link href="../estilos/topo.css" rel="stylesheet">
	<script>
		function validanota(elem){

			if(parseInt(elem.value) > 10){
				elem.value = 10
			}
		}
	</script>
</head>
<body>
	<?php require('../include/topo.php') ?>
	<form id="cadastro" action="criar_plano_estagio.php" method="POST">
		<div id="titulo_divisao">Criar plano de estágio</div>
		<p style="color:white;font-size: 20px;font-weight: 200">Aluno(a): <?php echo $dados_aluno["nome"]; ?></p>

		<input type="hidden" name="id_aluno" maxlength=50 value="<?php echo $_GET['id_aluno'] ?>">

		<label for="plano" style="color:white">Plano de estágio</label>
		<textarea type="text" cols="40" name="plano" maxlength=535><?php echo $dados_vinculo['plano']; ?></textarea>

		<label for="avaliacao" style="color:white">Avaliação</label>
		<textarea type="text" cols="40" name="avaliacao" maxlength=535 value="<?php echo $dados_vinculo['avaliacao']; ?>"></textarea>

		<label for="nota" style="color:white">Nota</label>
		<input type="number" name="nota" max=10 maxlength=3 value="<?php echo $dados_vinculo['nota']; ?>" onchange="validanota(this)">
		
		<div id="divisao"></div>

		<button type="submit">Registrar plano</button>
	</form>
</body>
</html>