<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_preg.php");
	exit();
}else{
	
}
$query = "SELECT user_empresa.nome,user_empresa.cnpj FROM user_empresa,convenios where user_empresa.id = convenios.empresa_id group by user_empresa.nome ";
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
	<title>Empresas Conveniadas</title>
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
					<th>Nome Empresa</th>
					<th>CNPJ Empresa</th>
					<!--<th>Aceitar</th>
					<th>Recusar</th> -->
				</tr>
			</thead>
			<tbody>
<?php
	while($dados = mysqli_fetch_assoc($data)){
?>
				<tr>
					<td style="text-align:center"> <?php echo $dados['nome'];?> </td>
					<td style="text-align:center"> <?php echo $dados['cnpj'];?> </td>
				</tr>
<?php
	}
 ?>
			</tbody>
		</table>
	</div>
</body>
</html>