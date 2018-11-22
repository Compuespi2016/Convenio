<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: index.php");
	exit();
}
if($_SESSION['nivel'] == 3){
	$query = "SELECT vinculo.id id_vinculo, vinculo.presencas,vinculo.faltas,vinculo.porcentagem,vinculo.plano_id,aluno.nome nome_aluno, aluno.id id_aluno,professor.nome nome_professor,user_empresa.nome nome_empresa FROM user_empresa,vinculo,aluno,professor WHERE user_empresa.id =".$_SESSION['id']." AND user_empresa.id=vinculo.empresa_id AND aluno.id = vinculo.aluno_id AND professor.id = vinculo.professor_id AND vinculo.status='aceito'";
}else{
	$query = "SELECT vinculo.id id_vinculo, vinculo.presencas,vinculo.faltas,vinculo.porcentagem,aluno.nome nome_aluno, aluno.id id_aluno,professor.nome nome_professor,user_empresa.nome nome_empresa FROM user_empresa,vinculo,aluno,professor WHERE vinculo.professor_id =".$_SESSION['id']." AND user_empresa.id=vinculo.empresa_id AND aluno.id = vinculo.aluno_id AND professor.id = vinculo.professor_id AND vinculo.status='aceito'";
}

$data = mysqli_query($conecta,$query);
if($data === FALSE){
	echo mysqli_error($conecta);
}

if(isset($_GET['atualizado'])){
	echo "<script>alert('Registro atualizado')</script>";
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
		<?php if($_SESSION['nivel'] == 2){ ?>
			<a href="lista_vinculo_professor.php" style="text-align:start;width:150px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;margin-bottom:5px;">Alunos Vinculados ></a>
		<?php } ?>
		<?php if($_SESSION['nivel'] == 2){ ?>
				<a href="home_professor.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
		<?php }else{ ?>
				<a href="home_empresa.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
		<?php } ?>
		
	</div>
	<div id="tabela">
		<table>
			<thead>
				<tr>
					<th>Nome do aluno</th>
					<?php if($_SESSION['nivel'] == 3){ ?>
						<th>Nome do professor</th>
					<?php } ?>
					<th>Presenças</th>
					<th>Faltas</th>
					<th>Porcentagem de frequência</th>
					<?php if($_SESSION['nivel'] == 3){ ?>
						<th>Atualizar frequência</th>
						<th>Plano de estágio</th>
					<?php } ?>
					<?php if($_SESSION['nivel'] == 2) {?>
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
					<?php } ?>
						<td style="text-align:center"><?php echo $dados['presencas']; ?></td>
						<td style="text-align:center"><?php echo $dados['faltas']; ?></td>
						<?php if($dados["porcentagem"] > 50){ ?>
							<td style="text-align:center;color:lightgreen"><?php echo $dados['porcentagem']; ?>%</td>
						<?php }else{ ?>
							<td style="text-align:center;color:crimson"><?php echo $dados['porcentagem']; ?>%</td>
						<?php } ?>
						<?php if($_SESSION['nivel'] == 3){ ?>
							<td style="text-align:center"><a id="blue" href="atualizar_frequencia.php?id=<?php echo $dados['id_aluno']; ?>"><img src="imgs/atualizar.png" style="width:32px;height:32px" /></a></td>
							<?php if($dados['plano_id'] == 0){ ?>
								<td><a href="formularios/criar_plano_estagio.php?id_aluno=<?php echo $dados['id_aluno']; ?>"><img src="imgs/lista.png" style="width:32px;height:32px" /></a></td>
							<?php }else{ ?>
								<td><a href="formularios/atualizar_plano_estagio.php?id_aluno=<?php echo $dados['id_aluno']; ?>"><img src="imgs/lista.png" style="width:32px;height:32px" /></a></td>
							<?php } ?>
						<?php } ?>
					<?php  if($_SESSION['nivel'] == 2){ ?>
						<td style="text-align:center"><a id="blue" href="aprovar_frequencia.php?id=<?php echo $dados['id_vinculo']; ?>"><img src="imgs/ok.png" style="width:32px; height:32px" /></a></td>
						<td style="text-align:center"><a id="blue" href="recusar_frequencia.php?id=<?php echo $dados['id_vinculo']; ?>"><img src="imgs/no.png" style="width:32px;height:32px" /></a></td>
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