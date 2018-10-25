<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: index.php");
	exit();
}
$query = "SELECT vinculo.id id_vinculo, vinculo.presencas,vinculo.faltas,vinculo.porcentagem,aluno.nome nome_aluno, aluno.id id_aluno FROM user_empresa,vinculo,aluno,professor WHERE user_empresa.id =".$_SESSION['id']." AND aluno.id = ".$_GET['id']." AND vinculo.status='aceito'";
$data = mysqli_query($conecta,$query);
if($data === FALSE){
	echo mysqli_error($conecta);
}
if(isset($_GET['id'])){
	$presencas = $_POST['presencas'];
	$faltas = $_POST['faltas'];
	$porcentagem = ($presencas/($presencas+$faltas))*100;
	$dados = "UPDATE vinculo SET presencas=".$presencas.",faltas=".$faltas.",porcentagem=".$porcentagem." WHERE id=".$data["id_vinculo"];
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
	<h1>Aluno: <?php echo $dados['nome_aluno']; ?></h1>
	<form action="atualizar_frequencia.php" method="POST">
		<label for="presencas">Presenças</label>
		<input type="number" placeholder="Presenças" value="<?php echo $dados['presencas']; ?>">
		<label for="faltas">Faltas</label>
		<input type="number" placeholder="Faltas" value="<?php echo $dados['faltas']; ?>">
		<label for="porcentagem">Porcentagem</label>
		<p name="porcentagem"><?php echo $dados['porcentagem']; ?></p>
		<button type="submit">Atualizar</button>
	</form>
</body>
</html>