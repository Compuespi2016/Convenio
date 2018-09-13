<?php
	$usuario = 'compuespi2016';
	$senha = 'computacao';
	$host = 'db4free.net';
	$dbname = 'compuespi';

	$conecta = mysqli_connect($host,$usuario,$senha,$dbname);
	
	echo $conecta;
	
?>