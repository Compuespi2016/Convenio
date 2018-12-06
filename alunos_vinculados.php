<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_preg.php");
	exit();
}else{
	
}
$query = "SELECT vinculo.id id_vinculo,vinculo.data,vinculo.status status,aluno.nome nome_aluno,professor.nome nome_professor,user_empresa.nome nome_empresa FROM user_empresa,vinculo,aluno,professor WHERE user_empresa.id = vinculo.empresa_id AND aluno.id = vinculo.aluno_id AND professor.id = vinculo.professor_id AND vinculo.status='aceito'";
$data = mysqli_query($conecta,$query);
if($data === FALSE){
	echo mysqli_error($conecta);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <link href="/convenio/bootstrap/bootstrap.css" rel="stylesheet">
    <script src="/convenio/bootstrap/bootstrap.js"></script>
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/tabela.css" rel="stylesheet">
	<title>Alunos Vinculados</title>
</head>
<body>
	<?php require('include/topo.php'); ?>
	<div id="menu_left" style="display:flex;flex-direction:column;">
	<!--	<a href="empresas_conveniadas.php" style="text-align:start;width:150px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;margin-bottom:5px;">Empresas conveniadas ></a> -->
		<a href="home_preg.php"><img src="imgs/back.png" style="width:28px;height:20px"/>Voltar</a>
	</div>
	<div id="tabela">
		<table class="table table-dark">
			<thead>
				<tr>
					<th>Aluno</th>
					<th>Empresa</th>
					<th>Professor</th>
					<th>Data</th>
				</tr>
			</thead>
			<tbody>
<?php
	while($dados = mysqli_fetch_assoc($data)){
?>
				<tr>
					<td style="text-align:center"> <?php echo $dados['nome_aluno'];?> </td>
					<td style="text-align:center"> <?php echo $dados['nome_empresa'];?> </td>
					<td style="text-align:center"> <?php echo $dados['nome_professor'];?> </td>
					<td style="text-align:center"> <?php echo date('d-m-Y', strtotime($dados['data'])); ?> </td>
				</tr>
<?php
	}
 ?>
			</tbody>
		</table>
	</div>
</body>
</html>