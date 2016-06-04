<a href="form_cadastro_portal.php">voltar</a>
<?php
require_once'conexao.class.php';
$conect = new Conectar();//instancio uma nova conexão ao banco de dados
require_once'cruds.class.php';
$crud = new Cruds('portal');//instancio um novo crud da tabela noticia

$sql = "SELECT * FROM portal";//variavel onde vai receber os comandos que serão executados no banco

	$query = pg_query($sql);//executo a query

	while ($colunas = pg_fetch_assoc($query))://executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
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
  <td><?php echo $colunas ['nm_portal']; ?></td><!--mostro na tela a coluna nm_portal -->

  <td><?php echo $colunas ['site']; ?></td><!--mostro na tela a coluna site-->

  <td><?php echo $colunas ['email']; ?></td><!--mostro na tela a coluna email -->

  <td><a href="requests.php?id_portal=<?php echo $colunas['id_portal'];?>&acao=excluir">Excluir</a></td>
<!--pego pelo link o id do portal para fazer a exclusão,se a açào for igual a excluir no arquivo que trata as requests,vai executar o metodo de exclusão do registro selecionado-->
  <td><a href="alterar_portal.php?id_portal=<?php echo $colunas['id_portal'];?>">Alterar</a></td>
<!--pego o id do portal pelo link,onde o link ira me levar ao formulario de atualização das informações do registro selecionado-->
  </tr>
</table>
  <?php 
  endwhile//paro de executar o lanço while
   ?>