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
	$resultado = mysqli_query($conexao,"SELECT e.nome , id from solicitacoes  where id = " . $id_emp );
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
				<th>Nome Curso</th>	
			</thead>
		</table>
	</div>


<?php
	$pedidos = listarSolicitacoes($conecta,$id);
	foreach ($pedidos as $pedido ){


?>
		<tr>
				
			<td> <?= $pedido['nome']?> </td>
			<td> <?= $pedido['id']?> </td>

		</tr>

<?php

	}
 ?>


</body>
</html>