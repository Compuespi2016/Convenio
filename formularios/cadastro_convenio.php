<?php include_once("../db/conexao.php"); ?>
<?php
	session_start();
	$query = "SELECT * FROM curso";
	$query = mysqli_query($conecta,$query);
	if(!$query){
		echo mysqli_error($conecta);
	}
	if(isset($_POST["cursos"])){
		$checkbox = $_POST["cursos"];
		$cont=0;
		foreach($checkbox as $valor){
			$query_checkbox = "INSERT INTO solicitacoes (empresa_id,curso_id) VALUES (".$_SESSION["id"].",".$valor.")";
			$query_checkbox = mysqli_query($conecta,$query_checkbox);				
?>
<?php
		}
		$update_recusado = "UPDATE user_empresa SET recusado = 'pendente' WHERE id=".$_SESSION['id'];
		$update_recusado = mysqli_query($conecta,$update_recusado);
		header('location: ../home_empresa.php?cadastro=true');
	}
?>

<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../estilos/topo.css" rel="stylesheet">
		<link href="../estilos/cadastro_convenio.css" rel="stylesheet">
	</head>
	<body>
		<?php require('../include/topo.php') ?>
		<form id="checkboxs" action="cadastro_convenio.php" method="POST">
			<div id="check">
				<p style="text-align:center">Cadastro de convênio</p>
				<p style="text-align:left"> <font size="4">Selecione os cursos de interesse para estágio: </font> </p><br>
				<?php while($dados = mysqli_fetch_assoc($query)) { ?>
					<?php
						$id = $dados["id"];
						$nome = $dados["nome"]; 
					?>
					<input type="checkbox" name="cursos[]" value="<?php echo $id ?>"><?php echo utf8_encode($nome); ?><br>
				<?php } ?>
			</div>
			
			<input type="submit" value="Solicitar">
		</form>
	</body>
</html>
<?php mysqli_close($conecta) ?>