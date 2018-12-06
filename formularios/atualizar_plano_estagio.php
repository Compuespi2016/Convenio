<?php
include_once('../db/conexao.php');
session_start();
	if(isset($_POST['plano'])){
		$id_aluno = $_POST["id_aluno"];
		$id_empresa = $_SESSION["id"];
		$plano = $_POST["plano"];
		$avaliacao = $_POST["avaliacao"];
		
		$updateplano_id = "UPDATE plano_estagio SET aluno_id=".$id_aluno.",empresa_id=".$id_empresa. ",plano= '$plano',avaliacao='$avaliacao' WHERE aluno_id=".$id_aluno;
		$updateplano_id = mysqli_query($conecta,$updateplano_id);

		if(!$updateplano_id){
			echo mysqli_error($conecta);
		}

		$dados_aluno = $_POST["id_aluno"];
		$dados_aluno = "SELECT * FROM aluno WHERE id=".$dados_aluno;
		$dados_aluno = mysqli_query($conecta,$dados_aluno);
		$dados_aluno = mysqli_fetch_assoc($dados_aluno);

		$dados_vinculo = "SELECT * FROM plano_estagio WHERE aluno_id=".$_POST['id_aluno']." AND empresa_id=".$_SESSION['id'];
		$dados_vinculo = mysqli_query($conecta,$dados_vinculo);
		$dados_vinculo = mysqli_fetch_assoc($dados_vinculo);
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
	<div id="menu_left" style="display:flex;flex-direction:column;">
		<a href="../frequencia.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
	</div>
	<form id="cadastro" action="atualizar_plano_estagio.php" method="POST">
		<div id="titulo_divisao">Atualizar plano de estágio</div>
		<p style="color:white;font-size: 20px;font-weight: 200">Aluno(a): <?php echo $dados_aluno["nome"]; ?></p>
		
		<?php $id = isset($_GET['id_aluno']) ? $_GET['id_aluno'] : $_POST['id_aluno']; ?>
		<input type="hidden" name="id_aluno" maxlength=50 value="<?php echo $id ?>">

		<label for="plano" style="color:white">Plano de estágio</label>
		<textarea type="text" cols="40" name="plano" maxlength=535><?php echo $dados_vinculo['plano']; ?></textarea>

		<label for="avaliacao" style="color:white">Avaliação</label>
		<textarea type="text" cols="40" name="avaliacao" maxlength=535><?php echo $dados_vinculo['avaliacao']; ?></textarea>

		<label for="nota" style="color:white">Nota</label>
		<p><?php echo $dados_vinculo['nota']; ?></p>
		
		<div id="divisao"></div>

		<button type="submit">Registrar plano</button>
	</form>
</body>
</html>