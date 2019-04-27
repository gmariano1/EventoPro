<?php
//conexão com o banco de dados
$sgbd = 'mysql:host=localhost;dbname=eventopro';
$user = 'eventouser';
$senha = 'senhauser';
$options = [];
try {
	$conn = new PDO($sgbd,$user,$senha,$options); //definir usuário e senha para o banco no MySql
} catch (PDOException $e) {
	
}
