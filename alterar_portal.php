<?php
//teste
require_once('conexao.class.php');
$conect = new Conectar();
require_once('cruds.class.php');
$op = new Cruds('noticia');
$id_portal = $_GET['id_portal'];
?>
<a href="listar_portal.php">lista de portais cadastrados</a>
<br/>
<form action ="requests.php?acao=atualizar&id_portal=<?php echo $id_portal?>" method="post">
	<input type="hidden" value="<?php echo $id_portal ?>" name="id_portal">
	portal <input type="text" name="nm_portal"   required>
	<br/>
	site <input type="site" name="site"  required>
	<br/>
	email <input type="email" name="email"  required>
	<br/>
	<input type="submit" value="enviar">
</form>