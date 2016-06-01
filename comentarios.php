<?php
require_once('conexao.class.php');
$conect = new Conectar();
require_once('cruds.class.php');
$op = new Cruds('noticia');
$id_noticia = $_GET['id_noticia'];
?>
<br/>
<form action ="requests_comentario.php?acao=cadastrar" method="post">
	<input type="hidden" value="<?php echo $id_noticia ?>" name="id_noticia">
	comentario <input type="site" name="comentario"  required>
	<br/>
	email <input type="email" name="email"  required>
	<br/>
	<input type="submit" value="enviar">
</form>