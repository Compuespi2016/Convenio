<?php
    include_once('db/conexao.php');
    session_start();
    
    if(isset($_POST['id_aluno'])){
		$id_aluno = $_POST["id_aluno"];
        $nota = $_POST["nota"];
        $comentario = $_POST['comentario'];
		
		$updateplano = "UPDATE plano_estagio SET comentario='$comentario',nota=".$nota." WHERE aluno_id=".$id_aluno;
		$updateplano = mysqli_query($conecta,$updateplano);

		if(!$updateplano){
			echo mysqli_error($conecta);
		}

		$dados_aluno = $_POST["id_aluno"];
		$dados_aluno = "SELECT * FROM aluno WHERE id=".$dados_aluno;
		$dados_aluno = mysqli_query($conecta,$dados_aluno);
		$dados_aluno = mysqli_fetch_assoc($dados_aluno);

		$dados_vinculo = "SELECT * FROM plano_estagio WHERE aluno_id=".$_POST['id_aluno']." AND empresa_id=".$_SESSION['id'];
		$dados_vinculo = mysqli_query($conecta,$dados_vinculo);
		$dados_vinculo = mysqli_fetch_assoc($dados_vinculo);
	}

	if(isset($_GET['id'])){
		$dados_aluno = $_GET["id"];
		$dados_aluno = "SELECT * FROM aluno WHERE id=".$dados_aluno;
		$dados_aluno = mysqli_query($conecta,$dados_aluno);
		$dados_aluno = mysqli_fetch_assoc($dados_aluno);

		$dados_vinculo = "SELECT * FROM plano_estagio WHERE aluno_id=".$_GET['id']." AND empresa_id=".$_SESSION['id'];
		$dados_vinculo = mysqli_query($conecta,$dados_vinculo);
		$dados_vinculo = mysqli_fetch_assoc($dados_vinculo);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Plano de estágio</title>
	<link href="estilos/popup.css" rel="stylesheet">
	<link href="estilos/cadastro.css" rel="stylesheet">
	<link href="estilos/topo.css" rel="stylesheet">
	<script>
		function validanota(elem){
			if(parseInt(elem.value) > 10){
				elem.value = 10
			}
		}
	</script>
</head>
<body>
	<?php require('include/topo.php') ?>
	<div id="menu_left" style="display:flex;flex-direction:column;">
		<a href="frequencia.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
	</div>
    <form id="cadastro" action="plano_estagio.php" method="POST">
        <div id="titulo_divisao">Plano de estágio</div>
        <p style="color:white;font-size: 20px;font-weight: 200">Aluno(a): <?php echo $dados_aluno["nome"]; ?></p>

        <?php $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id_aluno']; ?>
		<input type="hidden" name="id_aluno" value="<?php echo $id ?>">

        <label for="plano" style="color:white">Plano de estágio</label>
        <p name="plano"><?php echo $dados_vinculo['plano']; ?></p>

        <label for="avaliacao" style="color:white">Avaliação</label>
        <p name="avaliacao"><?php echo $dados_vinculo['avaliacao']; ?></p>

        <label for="nota" style="color:white">Nota</label>
        <input type="number" name="nota" min=0 max=10 maxlength=4 value="<?php echo $dados_vinculo['nota']; ?>" onchange="validanota(this)">

        <label for="comentario" style="color:white">Comentário</label>
        <input type="text" name="comentario" value="<?php echo $dados_vinculo['comentario']; ?>"/>
        
        <div id="divisao"></div>
        
        <button type="submit">Registrar nota</button>
    </form>
</body>
</html>