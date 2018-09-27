<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_preg.php");
	exit();
}else{

}

$id = $_SESSION['id'];

function listarSolicitacoes($conexao,$id_emp){
	$pedidos = array();
	$resultado = mysqli_query($conexao,"SELECT u.nome,u.id from solicitacoes s,user_empresa u where u.id =".$id_emp);
	while($pedido = mysqli_fetch_assoc($resultado)){
		array_push($pedidos, $pedido);
	}
	return $pedidos;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Solicitações</title>
</head>
<body>
	<div>
		<table>
			<thead>
				<th>Nome Empresa</th>
				<th>Visualizar cursos</th>
				<th>Aceitar</th>
				<th>Recusar</th>
			</thead>
		</table>
	</div>
<?php
	$pedidos = listarSolicitacoes($conecta,$id);
	foreach ($pedidos as $pedido ){
?>
		<tr>
			<td> <?= $pedido['nome']?> </td>
			<a id="blue" href="lista_cursos.php?id=<?php echo $pedido['id']; ?>">Listar</a>
			<a id="green" href="aceita_convenio.php?id=<?php echo $pedido['id']; ?>">Aceitar</a>
			<a id="red" href="recusa_convenio.php?id=<?php echo $pedido['id']; ?>">Recusar</a>
		</tr>
<?php
	}
 ?>
</body>
</html>