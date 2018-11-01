<?php include_once('db/conexao.php'); ?>
<?php
    session_start();
    if(isset($_GET['cadastro'])){
        echo "<script> alert('Vinculo registrado com sucesso!') </script>";
    }
    $query = "select nome from professor where id = " . $_SESSION['id'];
    $query = mysqli_query($conecta,$query);
    $dados = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="estilos/topo.css" rel="stylesheet">
    <link href="estilos/menu_home.css" rel="stylesheet">
</head>
<body>
	<?php require('include/topo.php')?>
    <p>Bem Vindo(a) <?php echo $dados['nome']; ?></p>
    <div id="menu">
        <a href="formularios/vincular_aluno.php">Vincular Aluno</a>
        <a href="lista_vinculo_professor.php">Lista de Alunos Vinculados</a>
        <a href="frequencia.php">Frequencia de Alunos</a>
        <a href="include/logout.php">Sair</a>

    </div>
</body>
</html>