<style>
#noticia{
	background-color:silver;
	width:400px;
	height:280px;
	position:relative;
	left:300px;

}

p{
  font-size:20px;	
}
</style>
<a href="index.php">voltar</a>
<br/>
<a href="rss.php">rss</a>
<?php
require_once'conexao.class.php';
$conect = new Conectar();
require_once'cruds.class.php';
$crud = new Cruds('noticia');

$sql = "SELECT * FROM noticia";


	$query = pg_query($sql);

	while ($colunas = pg_fetch_assoc($query)):
?>
<br/>
<div id="noticia">
<center>
	<h2>Titulo</h2>
	<p><?php echo $colunas ['titulo']; ?></p>
	<h2>Data</h2>
	<p><?php echo $colunas ['data']; ?></p>
	<p><?php echo $colunas ['gravata']; ?></p>
<p><a href="detalhes_noticia.php?id_noticia=<?php echo $colunas['id_noticia'];?>"><?php echo $colunas ['link']; ?></a></p>
</center>
</div>
  <?php 
  endwhile
   ?>