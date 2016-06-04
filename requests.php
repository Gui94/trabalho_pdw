<?php

require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();//instancio uma nova conexão ao banco de dados
$op= New Cruds('portal');//instancio um novo crud da tabela portal

	$id_portal = $_GET['id_portal'];//pego o id do portal por get para fazer a exclusão ou para levar ao formulario de update
	$acao = $_GET['acao'];//variavel que vai determinar que tipo de ação será tomada após 
//clicar em algum link de exclusão,ou update ou depois de um cadastro

//pego as informações dos formularios por post para depois cadastrar as novas informações no banco(update)	
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_portal = $_GET['id_portal'];
	$nm_portal = $_POST['nm_portal'];
	$site = $_POST['site'];
	$email = $_POST['email'];
}

//pego as informações dos formularios por post para realizar o cadastro de um novo registro no banco
if($_SERVER['REQUEST_METHOD']=='POST'){
	$nm_portal = $_POST['nm_portal'];
	$site = $_POST['site'];
	$email = $_POST['email'];
}
//condição onde vai executar algum metodo
switch($acao){	
//se a ação for igual a 'cadastrar',executa o metodo de cadastro
	case'cadastro':{
		$op->CadastroPortal($nm_portal,$site,$email);//metodo de cadastro onde foi passado por parametro as variaveis que vão pegar as informações digitadas no formulario para depois cadastrar no banco
		break;//termino a condicional
	}
	//se a ação for igual a 'excluir',executa o metodo de exclusão
	case 'excluir':{
		$op->DeletePortal($id_portal);//metodo de excluir onde foi passado por parametro o id para excluir determinado registro
		break;//termino a condicional
		}
	//se a ação for igual a 'atualizar',executa o metodo de update
	case 'atualizar':{
		$op->PortalUpdate($id_portal,$nm_portal,$site,$email);//metodo de update onde foi passado por
		// parametro as variaveis que vão pegar as informações digitadas no formulario para depois cadastrar
		//no banco as informações atualizadas de um determinado registro
		break;//termino a condicional
	}
}	



?>















