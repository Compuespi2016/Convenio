<?php
include_once('../db/conexao.php');
	if(isset($_POST['nome'])){
		$erro = false;
		

		$nomemp = $_POST['nome'];
		$senha = $_POST['senha'];
		$confirmar_senha = $_POST['confirmarsenha'];
		$cnpj = $_POST['cnpj'];
		$cpf = $_POST['cpf'];
		$ramo = $_POST['ramo'];
		$enderecoemp = $_POST['endereco'];
		$telefonemp = $_POST['telefone'];
		$telefonedon = $_POST['telefone_dono'];
		$email = $_POST['email'];
		$nomeresp = $_POST['dono'];

		if($nomemp == ''){
			echo "<script>alert('informe a Razão Social')</script>";
		}elseif ($ramo == '') {
			echo "<script>alert('informe o ramo da empresa')</script>";
		}elseif ($cnpj == '') {
			echo "<script>alert('informe o CNPJ da empresa')</script>";
		}elseif ($enderecoemp == '') {
			echo "<script>alert('informe o endereço da empresa')</script>";
		}elseif ($telefonemp == '') {
			echo "<script>alert('informe o telefone da empresa')</script>";
		}elseif ($nomeresp == '') {
			echo "<script>alert('informe o nome do responsável')</script>";
		}elseif ($cpf == '') {
			echo "<script>alert('informe o CPF do responsável da empresa')</script>";
		}elseif ($email == '') {
			echo "<script>alert('informe o email do responsável')</script>";
		}elseif ($telefonedon == '') {
			echo "<script>alert('informe o telefone do responsavel da empresa')</script>";
		}elseif ($senha == '') {
			echo "<script>alert('informe uma senha')</script>";
		}elseif ($confirmar_senha == '') {
			echo "<script>alert('é necessário confirmação de senha')</script>";
		}else{

			$query = "INSERT INTO user_empresa (nome , senha, cnpj, cpf, ramo,endereco,telefone,telefone_dono,email,dono) VALUES ( '$nomemp','$senha','$cnpj','$cpf', '$ramo', '$enderecoemp', '$telefonemp', '$telefonedon', '$email', '$nomeresp' )";
			if($confirmar_senha == $senha){
				
				if(mysqli_query($conecta,$query)){
					session_start();
					$_SESSION['id'] = mysqli_insert_id($conecta);
					$id_empresa = mysqli_insert_id($conecta);
					//header('location: cadastro_empresa.php?id='.$id_empresa);
?>
			<!--<script>alert('O id: <?php echo $id_empresa; ?> deverá ser utilizado para login')</script>-->
<?php
				header('location: ../popup.php?id='.$id_empresa);
				//header('location: ../home_empresa.php?id='.$id_empresa);
				}
				else{
					
					echo mysqli_error($conecta);
				}
			}else{
				echo "<script>alert('Campo senha diferente de confirmar senha')</script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link href="../estilos/popup.css" rel="stylesheet">
	<link href="../estilos/cadastro.css" rel="stylesheet">
	<link href="../estilos/topo.css" rel="stylesheet">
	<script>
		function formatarCampo(campoTexto) {
		    if (campoTexto.value.length <= 11) {
		        campoTexto.value = mascaraCpf(campoTexto.value);
		    } else {
		        campoTexto.value = mascaraCnpj(campoTexto.value);
		    }
		}
		function retirarFormatacao(campoTexto) {
		    campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g,"");
		}
		function mascaraCpf(valor) {
		    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
		}
		function mascaraCnpj(valor) {
		    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
		}
	</script>
</head>
<body>
	<?php require('../include/topo.php') ?>
	<form id="cadastro" action="cadastro_empresa.php" method="POST">
		<div id="titulo_divisao">Cadastro de empresa</div>
		<div id="divisao">Dados da empresa</div>

		<input type="text" name="nome" maxlength=50 placeholder="Razão Social">
		
		<input type="text" name="ramo" maxlength=50 placeholder="Ramo">

		<input type="text" name="cnpj" placeholder="CNPJ" onblur="formatarCampo(this);" minlength="14" maxlength="14"/>
		
		<input type="text" name="endereco" maxlength=50 placeholder="Endereço da empresa">
		
		<input type="text" name="telefone" maxlength=11 placeholder="Telefone da empresa">

		<div id="divisao">Dados do responsável</div>
		
		<input type="text" name="dono" maxlength=50 placeholder="Nome do responsável">
		
		<input type="text" name="cpf" placeholder="CPF" onblur="formatarCampo(this);" minlength="11" maxlength="11"/>

		<input type="email" name="email" maxlength=40 placeholder="Email do responsável">

		<input type="text" name="telefone_dono" maxlength=11 placeholder="Telefone para contato">

		<input type="password" name="senha" maxlength=20 placeholder="Senha">

		<input type="password" name="confirmarsenha" minlength="4" maxlength=20 placeholder="Confirmar senha">
		
		<div id="divisao"></div>

		<button type="submit">Cadastrar</button>
	</form>

</body>
</html>