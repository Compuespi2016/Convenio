<?php include_once("../db/conexao.php"); ?>
<?php
	session_start();
	$curso = "SELECT curso.nome FROM curso,professor WHERE professor.curso_id=curso.id AND professor.id=".$_SESSION['id'];
    $curso = mysqli_query($conecta,$curso);
    
    $aluno = "SELECT aluno.id,aluno.nome FROM aluno,professor WHERE aluno.curso_id = professor.curso_id AND aluno.id NOT IN (SELECT vinculo.aluno_id FROM vinculo) GROUP BY aluno.id ";
    $aluno = mysqli_query($conecta,$aluno);
    
    $empresa = "SELECT * FROM user_empresa WHERE recusado='nao'";
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
        //$query = mysqli_query($conecta,$query);
        //if($query){
        //    header('location: ../home_professor.php?cadastro=true');
        //}else{
        //    echo mysqli_error($conecta);
        //}
    }
?>

<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../estilos/topo.css" rel="stylesheet">
		<link href="../estilos/vincular.css" rel="stylesheet">
	</head>
	<body>
        <?php require('../include/topo.php') ?>
        <div id="menu_left">
    		<a href="../home_professor.php"><img src="../imgs/back.png" style="width:28px;height:20px"/> Voltar</a>
	    </div>
		<form id="vincular" action="vincular_aluno.php" method="POST">
            <div id="titulo_divisao">Vincular aluno</div>
            <label style="color:rgba(0,0,0,.8);font-size:20px">Aluno</label>
            <div class="custom-select" style="width:200px;">
                <select name='aluno' style="margin-bottom:20px">
                    <?php while($alunos = mysqli_fetch_assoc($aluno)){ ?>
                        <option value="<?php echo $alunos['id']; ?>"><?php echo $alunos['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <label style="color:rgba(0,0,0,.8);font-size:20px">Empresa</label>
            <div class="custom-select" style="width:200px;">
                <select name='empresa'>
                    <?php while($empresas = mysqli_fetch_assoc($empresa)){ ?>
                        <option value="<?php echo $empresas['id']; ?>"><?php echo $empresas['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php $curso = mysqli_fetch_assoc($curso); ?>
            <input type="text" name="curso" value="<?php echo "Curso: ".utf8_encode($curso['nome']) ?>" disabled style="width:400px;margin-bottom:20px">
			<button type="submit">Vincular aluno</button>
		</form>
	</body>
</html>
<?php mysqli_close($conecta) ?>
<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
