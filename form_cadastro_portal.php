<?php
require_once 'conexao.class.php';
require_once 'cruds.class.php';
$conect = new Conectar();
$op = new Cruds('portal');
?>


<a href="index.php">voltar</a>
<br/>
<a href="listar_portal.php">lista de portais cadastrados</a>
<br/>
<form action ="requests.php?acao=cadastro" method="post">
	portal <input type="text" name="nm_portal" required>
	<br/>
	site <input type="site" name="site" required>
	<br/>
	email <input type="email" name="email" required>
	<br/>
	<input type="submit" value="enviar">
</form>