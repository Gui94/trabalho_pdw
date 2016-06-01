<?php
require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();
$op= New Cruds('imagem');

	$id_imagem = $_GET['id_imagem'];
	$acao = $_GET['acao'];

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id_noticia = $_POST['id_noticia'];
		$imagem = $_POST['imagem'];
		$destaque = $_POST['destaque'];
	}

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id_noticia = $_POST['id_noticia'];
		$imagem = $_POST['imagem'];
		$destaque = $_POST['destaque'];
	}

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id_imagem = $_POST['id_imagem'];
		$id_noticia = $_POST['id_noticia'];
		$imagem = $_POST['imagem'];
		$destaque = $_POST['destaque'];
	}





switch($acao){	

	case'cadastrar':{
		$op->ImageUpload($id_noticia,$imagem,$destaque);
		break;
	}
	case 'excluir':{
		$op->DeleteImagem($id_imagem);
		break;
		}
	case 'atualizar':{
		$op->ImagemUpdate($id_noticia,$id_imagem,$destaque);
		break;
	}
}	




?>