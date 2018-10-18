<?php include_once("../db/conexao.php"); ?>
<?php
	session_start();
	$curso = "SELECT curso.nome FROM curso,professor WHERE professor.curso_id=curso.id";
    $curso = mysqli_query($conecta,$curso);
    
    $aluno = "SELECT aluno.id,aluno.nome FROM aluno,professor WHERE aluno.curso_id = professor.curso_id GROUP BY aluno.id AND aluno.id NOT IN (SELECT vinculo.aluno_id FROM vinculo)";
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
        $id_professor = $_SESSION['id'];


        $query = "INSERT INTO vinculo (aluno_id,empresa_id,professor_id,data,status) VALUES (".$id_aluno.",".$id_empresa.",".$id_professor.","."SYSDATE(),'pendente')";
        echo $query;
        $query = mysqli_query($conecta,$query);
        if($query){
            header('location: ../home_professor.php?cadastro=true');
        }else{
            echo mysqli_error($conecta);
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
            <label style="color:white">Aluno</label>
            <select name='aluno'>
                <?php while($alunos = mysqli_fetch_assoc($aluno)){ ?>
                    <option value="<?php echo $alunos['id']; ?>"><?php echo $alunos['nome']; ?></option>
                <?php } ?>
            </select>
            <label style="color:white">Empresa</label>
            <select name='empresa'>
                <?php while($empresas = mysqli_fetch_assoc($empresa)){ ?>
                    <option value="<?php echo $empresas['id']; ?>"><?php echo $empresas['nome']; ?></option>
                <?php } ?>
            </select>
            <?php $curso = mysqli_fetch_assoc($curso); ?>
            <input type="text" name="curso" value="<?php echo $curso['nome'] ?>" disabled style="color:white;width:400px;">
			<button type="submit">Vincular aluno</button>
		</form>
	</body>
</html>
<?php mysqli_close($conecta) ?>