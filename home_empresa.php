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
    if(isset($_GET['desfazer'])){
        echo "<script>alert('Convênio desfeito!')</script>";
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
        <?php if($dados_empresa["recusado"] == 'vazio'){ ?>
                <a href="formularios/cadastro_convenio.php">Solicitação de convênio</a>
        <?php }elseif($dados_empresa["recusado"] == 'sim'){ ?>
            <p>Declaramos que a sua solicitação de convênio para estágio foi <b style="color:crimson">recusada</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI, dentro dos termos da legislação aplicável.</p>
        <?php }elseif($dados_empresa["recusado"] == 'nao'){ ?>
            <p>Declaramos que a sua solicitação de convênio para estágio foi <b style="color:lightgreen">aprovada</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI, dentro dos termos da legislação aplicável.</p>
        <?php }elseif($dados_empresa["recusado"] == 'pendente'){  ?>
            <p>Declaramos que a sua solicitação de convênio para estágio está <b style="color:yellow">Em análise</b> pela PREG - Pro-Reitoria de Ensino e Graduação da Universidade Estadual do Piauí - UESPI, em breve você receberá uma resposta</p>

        <?php }elseif($dados_empresa["motivo"] != ''){ ?>
            <p><?php echo $dados_empresa["motivo"]; ?></p>
        <?php } ?>

        <?php if($dados_empresa["recusado"] == 'nao'){ ?>
            <a href="cancelar_convenio.php" style="background-color: crimson">Cancelar Convênio</a>
        <?php }if($dados_empresa["recusado"] == 'pendente'){ ?>
            <a href="desfazer_convenio_empresa.php" style="background-color: crimson">Desfazer Convênio</a>
        <?php } ?>
        <a href="frequencia.php">Frequencia Aluno</a>
        <a href="include/logout.php">Sair</a>
    </div>
</body>
</html>