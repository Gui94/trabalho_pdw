<a href="form_cadastro_imagem.php">voltar</a>
<?php
require_once'conexao.class.php';

$conect = new Conectar();//instancio uma nova conexão ao banco de dados

$sql = "SELECT * FROM imagem";//variavel onde vai receber os comandos que serão executados no banco

	$query = pg_query($sql);//executo a query

	while ($colunas = pg_fetch_assoc($query))://executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
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
  <td><?php echo $colunas ['id_imagem']; ?></td><!--mostro na tela a coluna id_imagem -->

  <td><?php echo $colunas ['id_noticia']; ?></td><!--mostro na tela a coluna id_noticia -->

  <td><img height="200px" src="<?php echo $colunas ['imagem'];?>"></td><!--mostro na tela a imagem -->

  <td><?php echo $colunas ['destaque']; ?></td><!--mostro na tela a coluna destaque -->

  <td><a href="requests_imagem.php?id_imagem=<?php echo $colunas['id_imagem'];?>&acao=excluir">Excluir</a></td>
  <!--pego pelo link o id da imagem para fazer a exclusão,se a açào for igual a excluir no arquivo que trata as requests,vai executar o metodo de exclusão do registro selecionado-->
  <td><a href="alterar_imagem.php?id_imagem=<?php echo $colunas['id_imagem'];?>">Alterar</a></td>
<!--pego o id da imagem pelo link,onde o link ira me levar ao formulario de atualização das informações do registro selecionado-->
  </tr>
</table>
  <?php 
  endwhile//paro de executar o lanço while
   ?>