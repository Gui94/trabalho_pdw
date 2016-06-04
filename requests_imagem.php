<?php
require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();//instancio uma nova conexão ao banco de dados
$op= New Cruds('imagem');//instancio um novo crud da tabela imagem

	$id_imagem = $_GET['id_imagem'];//pego o id da imagem por get para fazer a exclusão ou para levar ao formulario de update
	$acao = $_GET['acao'];//variavel que vai determinar que tipo de ação será tomada após 
//clicar em algum link de exclusão,ou update ou depois de um cadastro


//pego as informações dos formularios por post para realizar o cadastro de um novo registro no banco
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id_noticia = $_POST['id_noticia'];
		$imagem = $_POST['imagem'];
		$destaque = $_POST['destaque'];
	}

//pego as informações dos formularios por post para depois cadastrar as novas informações no banco(update)	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id_imagem = $_POST['id_imagem'];
		$id_noticia = $_POST['id_noticia'];
		$imagem = $_POST['imagem'];
		$destaque = $_POST['destaque'];
	}




//condição onde vai executar algum metodo
switch($acao){	
//se a ação for igual a 'cadastrar',executa o metodo de cadastro
	case'cadastrar':{
		$op->ImageUpload($id_noticia,$imagem,$destaque);//metodo de cadastro onde foi passado por parametro as variaveis que vão pegar as informações digitadas no formulario para depois cadastrar no banco
		break;//termino a condicional
	}
	//se a ação for igual a 'excluir',executa o metodo de exclusão
	case 'excluir':{
		$op->DeleteImagem($id_imagem);//metodo de excluir onde foi passado por parametro o id para excluir determinado registro
		break;//termino a condicional
		}
	//se a ação for igual a 'atualizar',executa o metodo de update	
	case 'atualizar':{
		$op->ImagemUpdate($id_noticia,$id_imagem,$destaque);//metodo de update onde foi passado por
		// parametro as variaveis que vão pegar as informações digitadas no formulario para depois cadastrar
		//no banco as informações atualizadas de um determinado registro
		break;//termino a condicional
	}
}	




?>