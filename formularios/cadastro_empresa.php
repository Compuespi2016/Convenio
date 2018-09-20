<?php
include_once('../db/conexao.php');
	if(isset($_POST['nome'])){
		$nomemp = $_POST['nome'];
		$senha = $_POST['senha'];
		$cnpj = $_POST['cnpj'];
		$cpf = $_POST['cpf'];
		$ramo = $_POST['ramo'];
		$enderecoemp = $_POST['endereco'];
		$telefonemp = $_POST['telefone'];
		$telefonedon = $_POST['telefone_dono'];
		$email = $_POST['email'];
		$nomeresp = $_POST['dono'];

		$x = "{'nomeemp'}"


		$query = "insert into user_empresa (nome , senha, cnpj, cpf, ramo,endereco,telefone,telefone_dono,email,dono) values ({'nomemp'},{'senha'},{'cnpj'},{'cpf'},{'ramo'},{'enderecoemp'},{'telefonemp'},{'telefonedon'},{'email'}, {nomeresp})";

		if(mysqli_query($conecta,$query)){
			echo "<center> Inserido .... </center>";
		}
		else
			echo "<center> Inserido .... </center>";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>

<form action="cadastro_empresa.php" method="POST">
	Nome Empresa:<br>
	<input type="text" name="nome"><br>
	Senha:<br>
	<input type="password" name="senha"><br>
	CNPJ:<br>
	<input type="text" name="cnpj"><br>
	CPf:<br>
	<input type="text" name="cpf"><br>
	Ramo:<br>
	<input type="text" name="ramo"><br>
	Endereco Empresa:<br>
	<input type="text" name="endereco"><br>
	Telefone Empresa:<br>
	<input type="text" name="telefone"><br>
	Telefone_Dono:<br>
	<input type="text" name="telefone_dono"><br>
	Email Responsavel:<br>
	<input type="text" name="email"><br>
	Nome Responsavel:<br>
	<input type="text" name="dono"><br>
	<button type="submit"> Enviar</button>


</form>


</body>
</html>