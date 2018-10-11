<?php include_once('db/conexao.php'); ?>
<?php
    session_start();
    if(isset($_GET['cadastro'])){
        echo "<script> alert('Vinculo registrado com sucesso!') </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="estilos/topo.css" rel="stylesheet">
    <link href="estilos/menu_home.css" rel="stylesheet">
</head>
<body>
	<?php require('include/topo.php') ?>
    <div id="menu">
        <a href="formularios/vincular_aluno.php">Vincular aluno</a>
        <a href="lista_vinculo_professor.php"></a>
        <a href="include/logout.php">Sair</a>

    </div>
</body>
</html>