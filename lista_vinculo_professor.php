<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_professor.php");
	exit();
}else{
	
}
$query = "SELECT vinculo.id id_vinculo,vinculo.data,vinculo.status status,aluno.nome nome_aluno,professor.nome nome_professor,user_empresa.nome nome_empresa FROM user_empresa,vinculo,aluno,professor WHERE user_empresa.id = vinculo.empresa_id AND aluno.id = vinculo.aluno_id AND professor.id = vinculo.professor_id";
$data = mysqli_query($conecta,$query);
if(!$data){
	echo mysqli_error($conecta);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/tabela.css" rel="stylesheet">
	<title>Lista Vinculos</title>
</head>
<body>
	<?php require('include/topo.php'); ?>
	<div id="menu_left" style="display:flex;flex-direction:column;">
	<!--	<a href="empresas_conveniadas.php" style="text-align:start;width:150px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;margin-bottom:5px;">Empresas conveniadas ></a> -->
		<a href="home_preg.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
	</div>
	<div id="tabela">
		<table>
			<thead>
				<tr>
					<th>Aluno</th>
					<th>Empresa</th>
					<th>Status</th>
					

				</tr>
			</thead>
			<tbody>
<?php
	while($dados = mysqli_fetch_assoc($data)){
?>
				<tr>
					<td style="text-align:center"> <?php echo $dados['nome_aluno'];?> </td>
					<td style="text-align:center"> <?php echo $dados['nome_empresa'];?> </td>
					<?php
					if ($dados['status'] == 'pendente') { ?>
						<td style="color: aqua; text-align:center"> <?php echo $dados['status'];?> </td>
					<?php } ?>

					<?php
					if ($dados['status'] == 'negado') { ?>
						<td style="color: red; text-align:center"> <?php echo $dados['status'];?> </td>
					<?php } ?>

					<?php
					if ($dados['status'] == 'aprovado') { ?>
						<td style="color:  lightgreen; text-align:center"> <?php echo $dados['status'];?> </td>
					<?php } ?>
					
				</tr>
<?php
	}
 ?>
			</tbody>
		</table>
	</div>
</body>
</html>