<?php
require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();//instancio uma nova conexão ao banco de dados
$op= New Cruds('comentario');//instancio um novo crud da tabela comentario

$acao = $_GET['acao'];//variavel que vai determinar que tipo de ação será tomada após 
//clicar em algum link de exclusão,ou update ou depois de um cadastro

//pego todas as informações digitadas no formulario por post
if($_SERVER['REQUEST_METHOD']=='POST'){
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
}



?>