<?php include_once('db/conexao.php'); ?>
<?php
    if(isset($_GET['id'])){
        $id_empresa = $_GET['id'];
        $verifica = "SELECT * FROM user_empresa WHERE id=".$_GET['id'];
        $verifica = mysqli_query($conecta,$verifica);
        $bool = mysqli_num_rows($verifica);
        if($bool > 0){
        ?>
            <script>alert('O id: <?php echo $id_empresa; ?> deverá ser utilizado para login')</script>
        <?php
        }
    }
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
        <a href="include/logout.php">Sair</a>
    </div>
</body>
</html>