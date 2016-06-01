<?php

require_once 'conexao.class.php';
require_once 'cruds.class.php';

$conect = New Conectar();
$op= New Cruds('portal');

	$id_portal = $_GET['id_portal'];
	$acao = $_GET['acao'];
	
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_portal = $_GET['id_portal'];
	$nm_portal = $_POST['nm_portal'];
	$site = $_POST['site'];
	$email = $_POST['email'];
}


if($_SERVER['REQUEST_METHOD']=='POST'){
	$nm_portal = $_POST['nm_portal'];
	$site = $_POST['site'];
	$email = $_POST['email'];
}
switch($acao){	

	case'cadastro':{
		$op->CadastroPortal($nm_portal,$site,$email);
		break;
	}
	case 'excluir':{
		$op->DeletePortal($id_portal);
		break;
		}
	case 'atualizar':{
		$op->PortalUpdate($id_portal,$nm_portal,$site,$email);
		break;
	}
}	



?>















