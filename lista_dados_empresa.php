<?php include_once('db/conexao.php') ?>
<?php
	if(isset($_GET["id"])){
		$query = "SELECT * FROM user_empresa WHERE id =".$_GET["id"]." LIMIT 1";
		$query = mysqli_query($conecta,$query);
		if(!$query){
			echo mysqli_error($conecta);
        }
        $dados = mysqli_fetch_assoc($query);
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="estilos/topo.css" rel="stylesheet">
	<link href="estilos/cursos.css" rel="stylesheet">
	<link href="estilos/lista_cursos.css" rel="stylesheet">
</head>
<body>
    <?php require('include/topo.php') ?>
	<ul id="cursos">
        <li>Nome da empresa: <?php echo ($dados["nome"]) ?></li>
        <li>CNPJ: <?php echo ($dados["cnpj"]) ?></li>
        <li>Ramo: <?php echo ($dados["ramo"]) ?></li>
        <li>Endereço: <?php echo ($dados["endereco"]) ?></li>
        <li>Telefone: <?php echo ($dados["telefone_dono"]) ?></li>
        <li>Email: <?php echo ($dados["email"]) ?></li>
        <li>Dono: <?php echo ($dados["dono"]) ?></li>
        <li style="margin-top:20px"><a style="text-decoration:none;font-size:23px" href="solicitacoes.php">Voltar</a></li>
	</ul>
</body>
</html>