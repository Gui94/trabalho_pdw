<a href="index.php">voltar</a>
<?php
require_once'conexao.class.php';
$conect = new Conectar();//instancio uma nova conexão ao banco de dados

$sql = "SELECT * FROM comentarios";//variavel onde vai receber os comandos que serão executados no banco

	$query = pg_query($sql);//executo a query

	while ($colunas = pg_fetch_assoc($query))://executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
?>
<br/>

<table border="3">
	<tr>
	<td>id comentario</td>
	<td>id noticia</td>	
	<td>comentario</td>
	<td>email</td>
	<td>excluir</td>
	<td>alterar</td>	
	</tr>
	<tr>
  <td><?php echo $colunas ['id_comentario']; ?></td><!--mostro na tela a coluna id_comentario -->

  <td><?php echo $colunas ['id_noticia']; ?></td><!--mostro na tela a coluna id_noticia -->

  <td><?php echo $colunas ['comentario']; ?></td><!--mostro na tela a coluna comentario -->

  <td><?php echo $colunas ['email']; ?></td><!--mostro na tela a coluna email -->

  <td><a href="requests_comentario.php?id_comentario=<?php echo $colunas['id_comentario'];?>&acao=excluir">Excluir</a></td>
<!--pego pelo link o id do comentario para fazer a exclusão,se a açào for igual a excluir no arquivo que trata as requests,vai executar o metodo de exclusão do registro selecionado-->
  <td><a href="alterar_comentario.php?id_comentario=<?php echo $colunas['id_comentario'];?>">Alterar</a></td>
  <!--pego o id do comentario pelo link,onde o link ira me levar ao formulario de atualização das informações do registro selecionado-->

  </tr>
</table>
  <?php 
  endwhile//paro de executar o lanço while
   ?>