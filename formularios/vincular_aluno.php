<?php include_once("../db/conexao.php"); ?>
<?php
	session_start();
	$curso = "SELECT * FROM curso";
    $curso = mysqli_query($conecta,$curso);
    
    $aluno = "SELECT * FROM aluno";
    $aluno = mysqli_query($conecta,$aluno);
    
    $empresa = "SELECT * FROM user_empresa";
    $empresa = mysqli_query($conecta,$empresa);
    
	if(!$empresa){
		echo mysqli_error($conecta);
    }
	if(!$curso){
		echo mysqli_error($conecta);
    }
    if(!$aluno){
		echo mysqli_error($conecta);
    }
    if(isset($_POST['aluno'])){
        $id_aluno = $_POST['aluno'];
        $id_empresa = $_POST['empresa'];
        $id_curso = $_POST['curso'];
        $id_professor = $_SESSION['id'];

        $query = "INSERT INTO vinculo (aluno_id,empresa_id,curso_id,professor_id,data) VALUES ('$id_aluno','$id_empresa','$id_curso','$id_professor',SYSDATE())";
        $query = mysqli_query($conecta,$query);
        if($query){
            header('location: ../home_professor.php?cadastro=true');
        }
    }

    
?>

<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../estilos/topo.css" rel="stylesheet">
		<link href="../estilos/cadastro.css" rel="stylesheet">
	</head>
	<body>
		<?php require('../include/topo.php') ?>
		<form id="cadastro" action="vincular_aluno.php" method="POST">
            <select name='aluno'>
                <?php while($alunos = mysqli_fetch_assoc($aluno)){ ?>
                    <option value="<php echo $alunos['id']; ?>"><?php echo $alunos['nome']; ?></option>
                <?php } ?>
            <select>
            
            <select name='empresa'>
                <?php while($empresas = mysqli_fetch_assoc($empresa)){ ?>
                    <option value="<php echo $empresas['id']; ?>"><?php echo $empresas['nome']; ?></option>
                <?php } ?>
            <select>

            <select name='curso'>
                <?php while($cursos = mysqli_fetch_assoc($curso)){ ?>
                    <option value="<php echo $cursos['id']; ?>"><?php echo $cursos['nome']; ?></option>
                <?php } ?>
            <select>
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>
<?php mysqli_close($conecta) ?>