<?php

require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();//instancio uma nova conexão ao banco de dados
$op= New Cruds('noticia');//instancio um novo crud da tabela portal

	$id_noticia = $_GET['id_noticia'];//pego o id do portal por get para fazer a exclusão ou para levar ao formulario de update
	$acao = $_GET['acao'];//variavel que vai determinar que tipo de ação será tomada após 
//clicar em algum link de exclusão,ou update ou depois de um cadastro


//pego as informações dos formularios por post para realizar o cadastro de um novo registro no banco
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_portal = $_POST['id_portal'];
	$titulo = $_POST['titulo'];
	$data = $_POST['data'];
	$gravata = $_POST['gravata'];
	$conteudo = $_POST['conteudo'];
	$link = $_POST['link'];
}
//pego as informações dos formularios por post para depois cadastrar as novas informações no banco(update)	
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_noticia = $_POST['id_noticia'];
	$id_portal = $_POST['id_portal'];
	$titulo = $_POST['titulo'];
	$data = $_POST['data'];
	$gravata = $_POST['gravata'];
	$conteudo = $_POST['conteudo'];
	$link = $_POST['link'];
}
	//condição onde vai executar algum metodo
	if($acao=='cadastrar'){//se a ação for igual a 'cadastrar',executa o metodo de cadastro
		$op->CadastroNoticia($id_portal,$titulo,$data,$gravata,$conteudo,$link);//metodo de cadastro onde foi passado por parametro as variaveis que vão pegar as informações digitadas no formulario para depois cadastrar no banco
		echo'cadastrado com sucesso';//se não ocorreu algum erro,ocorrera o cadastra e mostrara a mensagem de "ok"
		}else{
			echo'nao cadastrou';//se ocorreu algum erro,não cadastra e mostra a mensagem de erro
		}
	//condição onde vai executar algum metodo
	if($acao=='excluir'){//se a ação for igual a 'excluir',executa o metodo de exclusão
		$op->DeleteNoticia($id_noticia);//metodo de excluir onde foi passado por parametro o id para excluir determinado registro
		echo'excluido com isso';//se não ocorreu algum erro,ocorrera a exclusão do registro selecionado e mostrara a mensagem de "ok"
		}else{
			echo'nao excluiu';//se ocorreu algum erro,mostra a mensagem de erro
		}
	//condição onde vai executar algum metodo
	if($acao=='atualizar'){//se a ação for igual a 'atualizar',executa o metodo de update
		$op->NoticiaUpdate($id_portal,$id_noticia,$titulo,$data,$gravata,$conteudo,$link);//metodo de update onde foi passado por
		// parametro as variaveis que vão pegar as informações digitadas no formulario para depois cadastrar
		//no banco as informações atualizadas de um determinado registro

		echo'atualizado com sucesso';//se não ocorreu algum erro,ocorrera o update e mostrara a mensagem de "ok"
		}else{
			echo'atualizado cadastrou';//se ocorreu algum erro,mostra a mensagem de erro
		}

	



?>