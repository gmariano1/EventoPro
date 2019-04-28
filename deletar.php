<?php
require 'banco.php';
$id = $_GET['id'];
$query = 'DELETE FROM tb_usuario WHERE idt_usuario='.$id;
$delete = $conn->prepare($query);
if($delete->execute()){
	header("location: listar.php?x");
}
