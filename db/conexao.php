<?php
	$usuario = 'root';
	$senha = '';
	$host = 'localhost';
	$dbname = 'convenio';
=======
<<<<<<< HEAD
	$usuario = 'root';
	$senha = '';
	$host = '761ac413.ngrok.io';
	$dbname = 'convenio';
<<<<<<< HEAD

	$conecta = mysqli_connect($host,$usuario,$senha,$dbname);

=======
=======
	$usuario = 'compuespi2016';
	$senha = 'computacao';
	$host = 'db4free.net';
	$dbname = 'compuespi';
>>>>>>> e49b03562bc39bb100c43d32cf3b07286879be87
>>>>>>> f0f50f82b1214f2fda74adf316f8b077cc5f1d0d

	$conecta = mysqli_connect($host,$usuario,$senha,$dbname);
	
	if(!$conecta){
		echo 'erro';
	}
	
>>>>>>> f08c9e048f405d8908c9959d64d2e7fe090fda76
?>