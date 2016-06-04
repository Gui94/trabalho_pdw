<?php
require_once 'conexao.class.php';
require_once 'cruds.class.php';
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
//instancio um novo crud da tabela portal
$op = new Cruds('portal');
?>


<a href="index.php">voltar</a>
<br/>
<a href="listar_portal.php">lista de portais cadastrados</a>
<br/>
<form action ="requests.php?acao=cadastro" method="post"><!--action que vai levar ao arquivo onde trata todos os requests 
	do formulario,se a ação for cadastro,ele cadastra os dados no banco que foram pegos no formulario -->
	portal <input type="text" name="nm_portal" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	site <input type="site" name="site" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	email <input type="email" name="email" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	<input type="submit" value="enviar"><!--input para pegar os dados do formulario e cadastrar no banco-->
</form>