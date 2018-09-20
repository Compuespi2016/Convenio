<?php
	$usuario = 'root';
	$senha = '';
	$host = 'localhost';
	$dbname = 'convenio';

	$conecta = mysqli_connect($host,$usuario,$senha,$dbname);
	
	if(!$conecta){
		echo 'erro';
	}
	
?>