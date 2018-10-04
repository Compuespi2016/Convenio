<?php include_once('db/conexao.php'); ?>
<?php
    session_start();
    $query = "SELECT * FROM convenios WHERE empresa_id=".$_SESSION['id'];
    $query = mysqli_query($conecta,$query);
    $resultado = mysqli_num_rows($query);
    if(isset($_GET['cadastro'])){
?>
        <script>alert('Convênio solicitado com sucesso')</script>
<?php

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
        <?php if($resultado == 0){ ?>
            <a href="formularios/cadastro_convenio.php">Cadastro de convênio</a>
        <?php }else{ ?>
            <p>Você já é conveniado com a uespi!</p>
        <?php } ?>
        <a href="include/logout.php">Sair</a>
    </div>
</body>
</html>