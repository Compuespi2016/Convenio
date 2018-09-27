<?php
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: login_preg.php");
	exit();
}else{

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
				<th>Id Empresa</th>
				<th>Id Curso</th>	
			</thead>
		</table>
	</div>

</body>
</html>