<a href="form_cadastro_portal.php">voltar</a>
<?php
require_once'conexao.class.php';
$conect = new Conectar();
require_once'cruds.class.php';
$crud = new Cruds('portal');

$sql = "SELECT * FROM portal";

	$query = pg_query($sql);

	while ($colunas = pg_fetch_assoc($query)):
?>
<br/>

<table border="3">
	<tr>
	<td>nome do portal</td>
	<td>site</td>
	<td>email</td>
	<td>excluir</td>
	<td>alterar</td>	
	</tr>
	<tr>
  <td><?php echo $colunas ['nm_portal']; ?></td>

  <td><?php echo $colunas ['site']; ?></td>

  <td><?php echo $colunas ['email']; ?></td>

  <td><a href="requests.php?id_portal=<?php echo $colunas['id_portal'];?>&acao=excluir">Excluir</a></td>

  <td><a href="alterar_portal.php?id_portal=<?php echo $colunas['id_portal'];?>">Alterar</a></td>

  </tr>
</table>
  <?php 
  endwhile
   ?>