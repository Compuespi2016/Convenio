<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: index.php");
	exit();
}
$query = "SELECT vinculo.id id_vinculo, vinculo.presencas,vinculo.faltas,vinculo.porcentagem,aluno.nome nome_aluno, aluno.id id_aluno,professor.nome nome_professor,user_empresa.nome nome_empresa FROM user_empresa,vinculo,aluno,professor WHERE user_empresa.id =".$_SESSION['id']." AND aluno.id = vinculo.aluno_id AND professor.id = vinculo.professor_id AND vinculo.status='aceito'";
$data = mysqli_query($conecta,$query);
if($data === FALSE){
	echo mysqli_error($conecta);
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
	<div id="tabela">
		<table>
			<thead>
				<tr>
					<th>Nome do aluno</th>
					<?php if($_SESSION['nivel'] == 3){ ?>
						<th>Nome do professor</th>
						<th>Atualizar frequência</th>
					<?php } ?>
					<th>Presenças</th>
					<th>Faltas</th>
					<th>Porcentagem de frequência</th>
					<?php  if($_SESSION['nivel'] == 2) {?>
						<th>Aprovar frequência</th>
						<th>Informar Problema</th>
					<?php } ?>

				</tr>
			</thead>
			<tbody>
<?php
		while($dados = mysqli_fetch_assoc($data)){
?>
				<tr>
					<td style="text-align:center"> <?php echo $dados['nome_aluno'];?> </td>
					
					<?php if($_SESSION['nivel'] == 3){ ?>
						<td style="text-align:center"> <?php echo $dados['nome_professor'];?> </td>
						<td style="text-align:center"><a id="blue" href="atualizar_frequencia.php?id=<?php echo $dados['id_aluno']; ?>">Atualizar frequência</a></td>
					<?php } ?>
						<td style="text-align:center"><?php echo $dados['presencas']; ?></td>
						<td style="text-align:center"><?php echo $dados['faltas']; ?></td>
						<td style="text-align:center"><?php echo $dados['porcentagem']; ?></td>
					<?php  if($_SESSION['nivel'] == 2){ ?>
						<td style="text-align:center"><a id="blue" href="aprovar_frequencia.php?id=<?php echo $dados['id_aluno']; ?>&&aprovado=true">Aprovar frequência</a></td>
						<td style="text-align:center"><a id="blue" href="aprovar_frequencia.php?id=<?php echo $dados['id_aluno']; ?>&&recusado=true">Informar Problema</a></td>
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