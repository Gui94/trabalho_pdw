<?php
require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();
$op= New Cruds('comentario');

$acao = $_GET['acao'];

if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_noticia = $_POST['id_noticia'];
	$comentario = $_POST['comentario'];
	$email = $_POST['email'];
}

switch($acao){	

	case'cadastrar':{
		$op->Comentario($id_noticia,$comentario,$email);
		break;
	}
}



?>