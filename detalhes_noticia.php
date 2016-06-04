<a href="listar_noticias.php">voltar</a>
<?php
require_once('conexao.class.php');
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
require_once('cruds.class.php');
//instancio um novo crud da tela noticia
$op = new Cruds('noticia');
$id_noticia = $_GET['id_noticia'];
//pego o id por get
$sql = "SELECT * FROM noticia";
//variavel onde vai receber os comandos que serão executados no banco
$query = pg_query($sql);
//executo a query
while ($colunas = pg_fetch_assoc($query))://executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
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
	<p><?php echo $colunas ['titulo']; ?></p><!--listo a coluna titulo -->
	<h2>Data</h2>
	<p><?php echo $colunas ['data']; ?></p><!--listo a coluna data -->
	<h2>Conteudo</h2>
	<p><?php echo $colunas ['conteudo']; ?></p><!--listo a coluna conteudo -->
	<br/>
<p><a href="comentarios.php?id_noticia=<?php echo $colunas['id_noticia'];?>">Postar um comentario</a></p><!--pego o id da noticia pelo link para postar o comentario -->
</center>
</div>
  <?php 
  endwhile//paro de executar o lanço while
   ?>