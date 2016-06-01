<a href="form_cadastro_noticia.php">voltar</a>
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

<table border="3">
	<tr>
	<td>id portal</td>
	<td>id noticia</td>	
	<td>titulo</td>
	<td>data</td>
	<td>gravata</td>
	<td>conteudo</td>
	<td>link</td>
	<td>excluir</td>
	<td>alterar</td>	
	</tr>
	<tr>
  <td><?php echo $colunas ['id_portal']; ?></td>

  <td><?php echo $colunas ['id_noticia']; ?></td>

  <td><?php echo $colunas ['titulo']; ?></td>

  <td><?php echo $colunas ['data']; ?></td>

  <td><?php echo $colunas ['gravata']; ?></td>

  <td><?php echo $colunas ['conteudo']; ?></td>

   <td><?php echo $colunas ['link']; ?></td>

  <td><a href="requests_noticia.php?id_noticia=<?php echo $colunas['id_noticia'];?>&acao=excluir">Excluir</a></td>

  <td><a href="alterar_noticia.php?id_noticia=<?php echo $colunas['id_noticia'];?>">Alterar</a></td>

  </tr>
</table>
  <?php 
  endwhile
   ?>