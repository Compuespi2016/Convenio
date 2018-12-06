<?php
//Concluir pagina
include_once('db/conexao.php');
session_start();
if(!isset($_SESSION['id'])) {
	header("location: index.php");
	exit();
}

$query = "SELECT aluno.nome nome_aluno,vinculo.motivo_freq FROM vinculo,aluno WHERE vinculo.professor_id =".$_SESSION['id']." AND vinculo.id = ".$_GET['id']." AND vinculo.aluno_id = aluno.id AND vinculo.status='aceito'";
$data = mysqli_query($conecta,$query);

if($data === FALSE){
	echo mysqli_error($conecta);
}

$dados_aluno = mysqli_fetch_assoc($data);
if(isset($_POST['motivo'])){
	$motivo = $_POST['motivo'];
    $dados = "UPDATE vinculo SET motivo_freq='$motivo' WHERE id=".$_GET['id'];
    $dados = mysqli_query($conecta,$dados);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link href="estilos/topo.css" rel="stylesheet">
    <link href="estilos/tabela.css" rel="stylesheet">
    <link href="estilos/plano.css" rel="stylesheet">
    <title>Aprovar Frequencia</title>
</head>
<body>
    <?php require('include/topo.php'); ?>
    <div id="menu_left">
        <a href="alunos_vinculados.php"><img src="imgs/back.png" style="width:28px;height:20px"/>Alunos Vinculados</a>
        <a href="home_professor.php"><img src="imgs/back.png" style="width:28px;height:20px"/>Voltar</a>
    </div>
    
    <form id="vincular" action="recusar_frequencia.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <p style="font-size:35px">Aluno: <?php echo $dados_aluno['nome_aluno']; ?></p>
        <label for="motivo">Motivo</label>
        <textarea type="text" name="motivo"><?php echo $dados_aluno['motivo_freq']; ?></textarea>
        <button style="margin-top:20px" type="submit">Atualizar motivo</button>
    </form>
</body>
</html>