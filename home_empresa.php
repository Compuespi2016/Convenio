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
        
        <script>alert('Solicitação de convênio realizada com sucesso!')</script>
<?php

    }
    if(isset($_GET['desfazer'])){
        echo "<script>alert('Solicitação de convênio cancelada!')</script>";

    }

    if(isset($_GET['cancelamento'])){
        echo "<script>alert('Contrato de convênio cancelado com sucesso!')</script>";
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
    <br>
    <h2> Bem Vindo(a) <?php echo $dados_empresa['nome']; ?></h2>
    <div id="menu">
        <?php if($dados_empresa["recusado"] == 'vazio'){ ?>
                <a href="formularios/cadastro_convenio.php">Solicitação de convênio</a>
        <?php }elseif($dados_empresa["recusado"] == 'sim'){ ?>
            <p>Declaramos que a sua solicitação de convênio para estágio foi <b style="color:crimson">recusada</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI, dentro dos termos da legislação aplicável.</p>
        <?php }elseif($dados_empresa["recusado"] == 'nao'){ ?>
            <p>Declaramos que a sua solicitação de convênio para estágio foi <b style="color:lightgreen">aprovada</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI, dentro dos termos da legislação aplicável.</p>
        <?php }elseif($dados_empresa["recusado"] == 'pendente'){  ?>
            <p>Declaramos que a sua solicitação de convênio para estágio está <b style="color:yellow">em análise</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI. Você receberá em breve uma mensagem informando a nossa decisão.</p>

        <?php }elseif($dados_empresa["motivo"] != ''){ ?>
            <p><?php echo $dados_empresa["motivo"]; ?></p>
        <?php } ?>

        <?php if($dados_empresa["recusado"] == 'nao'){ ?>
            <a href="cancela_convenio_empresa.php" style="background-color: crimson">Cancelar Convênio</a>
        <?php }if($dados_empresa["recusado"] == 'pendente'){ ?>
            <a href="desfazer_convenio_empresa.php" style="background-color: crimson">Desfazer Convênio</a>
        <?php } ?>
        <a href="include/logout.php">Sair</a>
    </div>
</body>
</html>