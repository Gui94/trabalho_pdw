<a href="form_cadastro_noticia.php">voltar</a>
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
  <td><?php echo $colunas ['id_portal']; ?></td><!--mostro na tela a coluna id_portal -->

  <td><?php echo $colunas ['id_noticia']; ?></td><!--mostro na tela a coluna id_noticia -->

  <td><?php echo $colunas ['titulo']; ?></td><!--mostro na tela a coluna titulo -->

  <td><?php echo $colunas ['data']; ?></td><!--mostro na tela a coluna data -->

  <td><?php echo $colunas ['gravata']; ?></td><!--mostro na tela a coluna gravata -->

  <td><?php echo $colunas ['conteudo']; ?></td><!--mostro na tela a coluna conteudo -->

   <td><?php echo $colunas ['link']; ?></td><!--mostro na tela a coluna link -->

  <td><a href="requests_noticia.php?id_noticia=<?php echo $colunas['id_noticia'];?>&acao=excluir">Excluir</a></td>
<!--pego pelo link o id da  noticia para fazer a exclusão,se a açào for igual a excluir no arquivo que trata as requests,vai executar o metodo de exclusão do registro selecionado-->
  <td><a href="alterar_noticia.php?id_noticia=<?php echo $colunas['id_noticia'];?>">Alterar</a></td>
  <!--pego o id da noticia pelo link,onde o link ira me levar ao formulario de atualização das informações do registro selecionado-->

  </tr>
</table>
  <?php 
  endwhile//paro de executar o lanço while
   ?>