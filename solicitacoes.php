<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_preg.php");
	exit();
}else{
	
}
$query = "SELECT user_empresa.nome,user_empresa.id FROM user_empresa,solicitacoes WHERE user_empresa.id = solicitacoes.empresa_id";
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
	<title>Solicitações</title>
</head>
<body>
<header>
	<?php require('include/topo.php'); ?>
	<div id="tabela">
		<table>
			<thead>
				<tr>
					<th>Nome Empresa</th>
					<th>Visualizar cursos</th>
					<th>Aceitar</th>
					<th>Recusar</th>
				</tr>
			</thead>
			<tbody>
<?php
	while($dados = mysqli_fetch_assoc($data)){
?>
				<tr>
					<td style="text-align:center"> <?php echo $dados['nome'];?> </td>
					<td style="text-align:center"><a id="blue" href="lista_cursos.php?id=<?php echo $dados['id']; ?>">Listar</a></td>
					<td style="text-align:center"><a id="green" href="aceita_convenio.php?id=<?php echo $dados['id']; ?>">Aceitar</a></td>
					<td style="text-align:center"><a id="red" href="recusa_convenio.php?id=<?php echo $dados['id']; ?>">Recusar</a></td>
				</tr>
<?php
	}
 ?>
			</tbody>
		</table>
	</div>
</body>
</html>