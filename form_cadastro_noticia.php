<?php
require_once('conexao.class.php');
$conect = new Conectar();
require_once('cruds.class.php');
$op = new Cruds('noticia');
?>
<a href="listar_noticia.php">lista de noticias cadastradas</a>
<br/>
<a href="index.php">voltar</a>
<form action="requests_noticia.php?acao=cadastrar" method="post">

		Portais<select name="id_portal" required></br>
			<?php
			$sql = "SELECT * FROM portal order by id_portal"; 
			$query = pg_query($sql);
			while($portal= pg_fetch_assoc($query)){
				
				echo "<option value=$portal[id_portal]>$portal[nm_portal]</option>";
			}
			?>
		</select></br>
	Titulo:<input type="text" name="titulo" required>
	<br/>
	Data:<input type="text" name="data" required>dia/mes/ano
	<br/>
	Gravata:<input type="text" name="gravata" required>
	<br/>
	Conteudo da noticia<input type="text" name="conteudo" required>
	<br/>
	Link:<input type="text" name="link" required>
	<br/>
	<input type="submit" value="enviar"required>
</form>