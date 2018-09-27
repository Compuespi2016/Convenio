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

		$query = "insert into user_empresa (nome , senha, cnpj, cpf, ramo,endereco,telefone,telefone_dono,email,dono) values ({$nomemp},{$senha},{$cnpj},{$cpf},{$ramo},{$enderecoemp},{$telefonemp},{$telefonedon},{$email}, {$nomeresp})";

		if(mysqli_query($conecta,$query)){
			echo "<center> Inserido .... </center>";
			session_start();
			$_SESSION['id'] = mysqli_insert_id($conecta);
			
		}
		else
			echo "<center> Nao deu certo .... </center>";
			echo "<script>loginfailed()</script>";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link href="../estilos/popup.css" rel="stylesheet">
	<link href="../estilos/cadastro.css" rel="stylesheet">
	<link href="../estilos/topo.css" rel="stylesheet">
</head>
<body>
	<header>
		<div id="topo">
			<img src="http://www.uespi.br/site/wp-content/uploads/2015/01/logo-1.png">
		</div>
		<div id="titulo">
			<p id="setor">PRÓ-REITORIA DE ENSINO E GRADUAÇÃO - PREG</p>
			<p id="convenio_estagio">CONVÊNIOS DE ESTÁGIO</p>
		</div>
	</header>
<form id="cadastro" action="cadastro_empresa.php" method="POST">
	<div id="titulo_divisao">Cadastro de empresa</div>
	<div id="divisao">Dados da empresa</div>

	<input type="text" name="nome" placeholder="Razão Social">
	
	<input type="text" name="ramo" placeholder="Ramo">
	
	<input type="text" name="cnpj" placeholder="CNPJ">
	
	<input type="text" name="endereco" placeholder="Endereço da empresa">
	
	<input type="text" name="telefone" placeholder="Telefone da empresa">

	<div id="divisao">Dados do responsável</div>
	
	<input type="text" name="dono" placeholder="Nome do responsável">
	
	<input type="text" name="cpf" placeholder="CPF">

	<input type="text" name="email" placeholder="Email do responsável">

	<input type="text" name="telefone_dono" placeholder="Telefone para contato">

	<input type="password" name="senha" placeholder="Senha">
	
	<div id="divisao"></div>

	<input type="submit">
</form>
<div id="popup">
	<p id="alert">Atenção!</p>
	<p>ID: <?php echo $id_empresa ?> <br>Deverá ser utilizado para acessar o sistema.</p>
	<a href="../login_empresa.php">Ir para login</a>
</div>
<script type="text/javascript">
	function loginsuccessfully(){
		setTimeout("window.location = 'home.php'",1000);
	}

	function loginfailed(){
		setTimeout("window.location = 'cadastro_empresa.php'",1000);
	}
</script>

</body>
</html>