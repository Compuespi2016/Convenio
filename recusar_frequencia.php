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
    <title>Aprovar Frequencia</title>
</head>
<body>
    <?php require('include/topo.php'); ?>
    <div id="menu_left" style="display:flex;flex-direction:column;">
        <a href="#" style="text-align:start;width:150px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;margin-bottom:5px;">Alunos Vinculados ></a>
        <a href="home_professor.php" style="text-align:start;width:100px;color:white;text-decoration:none;padding:5px;background-color:#2268b2;position:relative;">Voltar ></a>
    </div>
    <h1>Aluno: <?php echo $dados_aluno['nome_aluno']; ?></h1>
    <form action="recusar_frequencia.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="motivo">Motivo</label>
        <input type="text" name="motivo" placeholder="Motivo" value="<?php echo $dados_aluno['motivo_freq']; ?>">
        <button type="submit">Atualizar motivo</button>
    </form>
</body>
</html>