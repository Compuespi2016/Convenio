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

		$query = "INSERT INTO user_empresa (nome , senha, cnpj, cpf, ramo,endereco,telefone,telefone_dono,email,dono) VALUES ('$nomemp','$senha','$cnpj','$cpf','$ramo','$enderecoemp','$telefonemp','$telefonedon','$email', '$nomeresp')";
		$query = mysqli_query($conecta,$query);

		$id_empresa = mysqli_insert_id($conecta);
		if($query){
?>
			<script>document.getElementById('popup').style.display = 'flex'</script>
<?php
			session_start();
			$_SESSION['id'] = $id_empresa;
			
		}
		else{
			echo mysqli_error($conecta);
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link href="../estilos/popup.css" rel="stylesheet">
	<link href="../estilos/cadastro.css" rel="stylesheet">
</head>
<body>

<form id="cadastro" action="cadastro_empresa.php" method="POST">
	
	<input type="text" name="nome" placeholder="Razão Social">
	
	<input type="text" name="ramo" placeholder="Ramo">
	
	<input type="text" name="cnpj" placeholder="CNPJ">
	
	<input type="text" name="endereco" placeholder="Endereço empresa">
	
	<input type="text" name="telefone" placeholder="Telefone empresa">

	<div id="divisao"></div>
	
	<input type="text" name="dono" placeholder="Nome do responsável">
	
	<input type="text" name="cpf" placeholder="CPF">

	<input type="text" name="email" placeholder="Email do responsável">

	<input type="text" name="telefone_dono" placeholder="Telefone para contato">

	<input type="password" name="senha" placeholder="Senha">
		
	<button type="submit"> Enviar</button>
</form>
<div id="popup">
	<p id="alert">Atenção!</p>
	<p>ID: <?php echo $id_empresa ?> <br>Deverá ser utilizado para acessar o sistema.</p>
	<a href="">Ir para login</a>
</div>

</body>
</html>