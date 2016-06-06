<a href="listar_noticias.php">voltar</a>
<?php
require_once'conexao.class.php';
$conect = new Conectar();//instancio uma nova conexão ao banco de dados

$sql = "SELECT * FROM comentarios";//variavel onde vai receber os comandos que serão executados no banco

	$query = pg_query($sql);//executo a query

	while ($colunas = pg_fetch_assoc($query))://executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
?>
<br/>
<style>
	#comentario{
	width:450px;
	height:300px;
	position:relative;
	left:350px;
	background-color:silver;
	}
</style>


<div id="comentario">
	<center>
	<h2>comentario</h2>
	<p><?php echo $colunas ['comentario']; ?></p><!--mostro na tela a coluna comentario -->
	<br/>
	<h2>email</h2>	
	<p><?php echo $colunas ['email']; ?></p><!--mostro na tela a coluna email -->
	<br/>
</center>
</div>
  <?php 
  endwhile//paro de executar o lanço while
   ?>