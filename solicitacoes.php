<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_preg.php");
	exit();
}else{
	
}
$query = "SELECT user_empresa.nome,user_empresa.id,user_empresa.ramo,user_empresa.telefone,user_empresa.email,user_empresa.cnpj,user_empresa.endereco,user_empresa.dono FROM user_empresa,solicitacoes WHERE user_empresa.id = solicitacoes.empresa_id GROUP BY user_empresa.nome";
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
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/tabela.css" rel="stylesheet">
	<title>Solicitações</title>
</head>
<body>
	<?php require('include/topo.php'); ?>
	<div id="menu_left" style="display:flex;flex-direction:column;">
		<a href="empresas_conveniadas.php" style="text-align:start;width:150px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;margin-bottom:5px;">Empresas conveniadas ></a>
		<a href="home_preg.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
	</div>
	<div id="tabela">
		<table class="table table-dark">
			<thead>
				<tr>
					<th>Nome Empresa</th>
					<th>Ramo</th>
					<th>CNPJ</th>
					<th>Dados da empresa</th>
					<th>Listar cursos</th>
					<th>Aceitar</th>
					<th>Recusar</th>
				</tr>
			</thead>
			<tbody>
<?php while($dados = mysqli_fetch_assoc($data)){ ?>
				<tr>
					<td style="text-align:center"><?php echo $dados['nome'];?></td>
					<td style="text-align:center"><?php echo $dados['ramo'];?></td>
					<td style="text-align:center"><?php echo $dados['cnpj'];?></td>
					<td style="text-align:center"><a href="lista_dados_empresa.php?id=<?php echo $dados['id']; ?>"><img src="imgs/lista.png" style="width:32px;height:32px"></a></td>
					<td style="text-align:center"><a id="blue" href="lista_cursos.php?id=<?php echo $dados['id']; ?>"><img src="imgs/lista.png" style="width:32px;height:32px"></a></td>
					<td style="text-align:center"><a id="green" href="aceita_convenio.php?id=<?php echo $dados['id']; ?>"><img src="imgs/ok.png" style="width:32px;height:32px"></a></td>
					<td style="text-align:center"><a id="red" href="recusa_convenio.php?id=<?php echo $dados['id']; ?>"><img src="imgs/no.png" style="width:32px;height:32px"></a></td>
				</tr>
<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>