<?php include_once('db/conexao.php'); ?>
<?php
    session_start();
    $query = "SELECT * FROM convenios WHERE empresa_id=".$_SESSION['id'];
    $query = mysqli_query($conecta,$query);

    $verifica = "SELECT * FROM user_empresa WHERE id=".$_SESSION['id'];
    $verifica = mysqli_query($conecta,$verifica);
    $dados_empresa = mysqli_fetch_assoc($verifica);

    $resultado = mysqli_num_rows($query);
    if(isset($_GET['cadastro'])){
?>
        
        <script>alert('Convênio solicitado com sucesso!')</script>
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
    <p>Bem Vindo(a) <?php echo $dados_empresa['nome']; ?></p>
    <div id="menu">
        <?php if($resultado == 0 && $dados_empresa["recusado"] == '0'){ ?>
                <a href="formularios/cadastro_convenio.php">Solicitação de convênio</a>
        <?php }elseif($dados_empresa["recusado"] == '1')
        {
            ?>
            <p>Declaramos que a sua solicitação de convênio para estágio foi <b style="color:crimson">recusada</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI, dentro dos termos da legislação aplicável.</p>
        <?php }else{ ?>
            <p>Declaramos que a sua solicitação de convênio para estágio foi <b style="color:lightgreen">aprovada</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI, dentro dos termos da legislação aplicável.</p>
        <?php }  ?>
        <a href="cancelar_convenio.php" style="background-color: crimson">Cancelar Convênio</a>
        <a href="include/logout.php">Sair</a>
    </div>
</body>
</html>

<!-- Mostra cancelar convenio apenas para os que estão cadastrados