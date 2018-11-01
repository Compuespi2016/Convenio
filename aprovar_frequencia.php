

<?php
//Concluir pagina
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

$dados_aluno = mysqli_fetch_assoc($data);
if(isset($_GET['id'])){
	$motivo = $_POST['motivo'];
	$dados = "UPDATE vinculo SET motivo_frequencia=".$motivo." WHERE id=".$data["id_vinculo"];
}
?>
<?php if(isset($_GET['recusado'])) { ?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link href="estilos/topo.css" rel="stylesheet">
		<link href="estilos/tabela.css" rel="stylesheet">
		<title>Aprovar Frequencia</title>
	</head>
	<body>
		<?php require('include/topo.php'); ?>
		<div id="menu_left" style="display:flex;flex-direction:column;">
			<a href="#" style="text-align:start;width:150px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;margin-bottom:5px;">Alunos Vinculados ></a>
			<a href="home_professor.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
		</div>
		<h1>Aluno: <?php echo $dados_aluno['nome_aluno']; ?></h1>
		<form action="aprovar_frequencia.php" method="POST">
			<label for="motivo">Presenças</label>
			<input type="text" name="motivo" placeholder="Motivo" value="<?php echo $dados_aluno['presencas']; ?>">
			<button type="submit">Aprovar</button>
		</form>
	</body>
	</html>
<?php } ?>