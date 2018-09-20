<?php
<<<<<<< HEAD
	$usuario = 'root';
	$senha = '';
	$host = '761ac413.ngrok.io';
	$dbname = 'convenio';
=======
	$usuario = 'compuespi2016';
	$senha = 'computacao';
	$host = 'db4free.net';
	$dbname = 'compuespi';
>>>>>>> e49b03562bc39bb100c43d32cf3b07286879be87

	$conecta = mysqli_connect($host,$usuario,$senha,$dbname);
	
	echo $conecta;
	
?>