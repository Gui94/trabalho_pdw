<a href="listar_noticias.php">voltar</a>
<?php
require_once('conexao.class.php');
$conect = new Conectar();
require_once('cruds.class.php');
$op = new Cruds('noticia');
$id_noticia = $_GET['id_noticia'];

$sql = "SELECT * FROM noticia";

$query = pg_query($sql);

while ($colunas = pg_fetch_assoc($query)):
?>
<style>
	#noticia{
	width:550px;
	height:400px;
	position:relative;
	left:350px;
	background-color:silver;
	}
</style>
<br/>

<div id="noticia">
<center>
	<h2>Titulo</h2>
	<p><?php echo $colunas ['titulo']; ?></p>
	<h2>Data</h2>
	<p><?php echo $colunas ['data']; ?></p>
	<h2>Conteudo</h2>
	<p><?php echo $colunas ['conteudo']; ?></p>
	<br/>
<p><a href="comentarios.php?id_noticia=<?php echo $colunas['id_noticia'];?>">Postar um comentario</a></p>
</center>
</div>
  <?php 
  endwhile
   ?>