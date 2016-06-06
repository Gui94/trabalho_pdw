<?php
require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();//instancio uma nova conexão ao banco de dados
$op= New Cruds('comentario');//instancio um novo crud da tabela comentario

$acao = $_GET['acao'];//variavel que vai determinar que tipo de ação será tomada após 
//clicar em algum link de exclusão,ou update ou depois de um cadastro
$id_comentario = $_GET['id_comentario'];//pego o id do comentario por get para fazer a exclusão ou para levar ao formulario de update

//pego todas as informações digitadas no formulario por post para fazer o cadastro
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_noticia = $_POST['id_noticia'];
	$comentario = $_POST['comentario'];
	$email = $_POST['email'];
}

//pego todas as informações digitadas no formulario por post para fazer o update
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_comentario = $_POST['id_comentario'];
	$id_noticia = $_POST['id_noticia'];
	$comentario = $_POST['comentario'];
	$email = $_POST['email'];
}



//condição onde vai executar algum metodo
switch($acao){	
//se a ação for igual a 'cadastrar',executa o metodo de cadastro
	case'cadastrar':{
		$op->Comentario($id_noticia,$comentario,$email);//metodo de cadastro onde foi passado por parametro as variaveis 
		//que vão pegar as informações digitadas no formulario
		break;//depois de executar o metodo,termino a condicional
	}

	case'excluir':{
		$op->DeleteComentario($id_comentario);//metodo de excluir onde foi passado por parametro o id para excluir determinado registro
		break;//depois de executar o metodo,termino a condicional
	}
	case 'atualizar':{
		$op->ComentarioUpdate($id_comentario,$id_noticia,$comentario,$email);//metodo de update onde foi passado por
		// parametro as variaveis que vão pegar as informações digitadas no formulario para depois cadastrar
		//no banco as informações atualizadas de um determinado registro
		break;//termino a condicional
	}
}



?>