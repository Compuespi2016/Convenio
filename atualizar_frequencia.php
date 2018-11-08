<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: index.php");
	exit();
}
$query = "SELECT vinculo.id id_vinculo, vinculo.presencas,vinculo.faltas,vinculo.porcentagem,aluno.nome nome_aluno, aluno.id id_aluno FROM user_empresa,vinculo,aluno,professor WHERE user_empresa.id =".$_SESSION['id']." AND aluno.id = ".$_GET['id']." AND vinculo.empresa_id=user_empresa.id AND vinculo.aluno_id=aluno.id AND vinculo.status='aceito' LIMIT 1";

$data = mysqli_query($conecta,$query);
if($data === FALSE){
	echo mysqli_error($conecta);
}

$dados_aluno = mysqli_fetch_assoc($data);

$presencas = 0;
$faltas = 0;
$porcentagem = 0;
if(isset($_POST['presencas'])){
	$presencas = $_POST['presencas'];
	$faltas = $_POST['faltas'];
	$porcentagem = ($presencas/($presencas+$faltas))*100;
	$dados = "UPDATE vinculo SET presencas=".$presencas.",faltas=".$faltas.",porcentagem=".$porcentagem." WHERE aluno_id=".$_GET["id"];
	$dados = mysqli_query($conecta,$dados);
	header("Refresh: 0");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/tabela.css" rel="stylesheet">
	<title>Frequência</title>
</head>
<body>
	<?php require('include/topo.php'); ?>
	<div id="menu_left" style="display:flex;flex-direction:column;">
		<a href="#" style="text-align:start;width:150px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;margin-bottom:5px;">Alunos Vinculados ></a>
		<a href="home_empresa.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
	</div>
	<h1>Aluno: <?php echo $dados_aluno['nome_aluno']; ?></h1>
	<form action="atualizar_frequencia.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<label for="presencas">Presenças</label>
		<input name="presencas" type="number" placeholder="Presenças" value="<?php echo $dados_aluno['presencas']; ?>">
		<label for="faltas">Faltas</label>
		<input name="faltas" type="number" placeholder="Faltas" value="<?php echo $dados_aluno['faltas']; ?>">

		<label for="porcentagem">Porcentagem <?php echo $dados_aluno['porcentagem'] ?>%</label>
		<button type="submit">Atualizar</button>
	</form>
</body>
</html>