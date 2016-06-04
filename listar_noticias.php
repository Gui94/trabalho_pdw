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
<a href="rss.php">rss</a><!--link onde acessa a pagina rss das noticias-->
<?php
require_once'conexao.class.php';
$conect = new Conectar();//instancio uma nova conexão ao banco de dados
require_once'cruds.class.php';
$crud = new Cruds('noticia');//instancio um novo crud da tabela noticia

$sql = "SELECT * FROM noticia";//variavel onde vai receber os comandos que serão executados no banco


	$query = pg_query($sql);//executo a query

	while ($colunas = pg_fetch_assoc($query))://executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
?>
<br/>
<div id="noticia">
<center>
	<h2>Titulo</h2>
	<p><?php echo $colunas ['titulo']; ?></p><!--mostro na tela a coluna titulo -->
	<h2>Data</h2>
	<p><?php echo $colunas ['data']; ?></p><!--mostro na tela a coluna data -->
	<p><?php echo $colunas ['gravata']; ?></p><!--mostro na tela a coluna gravata -->
<p><a href="detalhes_noticia.php?id_noticia=<?php echo $colunas['id_noticia'];?>"><?php echo $colunas ['link']; ?></a></p>
<!--pego pelo link o id da noticia onde ira me levar a uma pagina com mais detalhes da noticia,aproveito e incluo o proprio link da noticia cadastrado no banco(variavel$colunas coluna['link']) -->
</center>
</div>
  <?php 
  endwhile//paro de executar o lanço while
   ?>