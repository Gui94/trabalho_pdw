<a href="form_cadastro_imagem.php">voltar</a>
<?php
require_once'conexao.class.php';
$conect = new Conectar();
require_once'cruds.class.php';
$crud = new Cruds('imagem');

$sql = "SELECT * FROM imagem";

	$query = pg_query($sql);

	while ($colunas = pg_fetch_assoc($query)):
?>
<br/>

<table border="3">
	<tr>
	<td>id_noticia</td>
	<td>id_imagem</td>
	<td>imagem</td>
	<td>destaque</td>
	<td>excluir</td>
	<td>alterar</td>	
	</tr>
	<tr>
  <td><?php echo $colunas ['id_imagem']; ?></td>

  <td><?php echo $colunas ['id_noticia']; ?></td>

  <td><img height="200px" src="<?php echo $colunas ['imagem'];?>"></td>

  <td><?php echo $colunas ['destaque']; ?></td>

  <td><a href="requests_imagem.php?id_imagem=<?php echo $colunas['id_imagem'];?>&acao=excluir">Excluir</a></td>

  <td><a href="alterar_imagem.php?id_imagem=<?php echo $colunas['id_imagem'];?>">Alterar</a></td>

  </tr>
</table>
  <?php 
  endwhile
   ?>