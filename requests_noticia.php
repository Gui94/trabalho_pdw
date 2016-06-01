<?php

require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();
$op= New Cruds('noticia');

	$id_noticia = $_GET['id_noticia'];
	$acao = $_GET['acao'];

	if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_portal = $_POST['id_portal'];
	$titulo = $_POST['titulo'];
	$data = $_POST['data'];
	$gravata = $_POST['gravata'];
	$conteudo = $_POST['conteudo'];
	$link = $_POST['link'];
}

	if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_noticia = $_POST['id_noticia'];
	$id_portal = $_POST['id_portal'];
	$titulo = $_POST['titulo'];
	$data = $_POST['data'];
	$gravata = $_POST['gravata'];
	$conteudo = $_POST['conteudo'];
	$link = $_POST['link'];
}
	
	if($acao=='cadastrar'){
		$op->CadastroNoticia($id_portal,$titulo,$data,$gravata,$conteudo,$link);
		echo'cadastrado com sucesso';
		}else{
			echo'nao cadastrou';
		}
	if($acao=='excluir'){
		$op->DeleteNoticia($id_noticia);
		echo'excluido com isso';
		}else{
			echo'nao excluiu';
		}
	if($acao=='atualizar'){
		$op->NoticiaUpdate($id_portal,$id_noticia,$titulo,$data,$gravata,$conteudo,$link);
		echo'atualizado com sucesso';
		}else{
			echo'atualizado cadastrou';
		}

	



?>