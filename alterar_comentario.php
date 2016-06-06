<?php
require_once('conexao.class.php');
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
require_once('cruds.class.php');
//pego o id por get
$id_comentario = $_GET['id_comentario'];
?>
<a href="listar_comentarios.php">voltar</a>
<br/>
<form action="requests_comentario.php?acao=atualizar" method="post"><!--action que vai levar ao arquivo onde trata todos os requests 
	do formulario,se a ação for atualizar,ele atualiza os dados no banco que foram pegos no formulario -->
<input type="hidden" value="<?php echo $id_comentario ?>" name="id_comentario"><!--Id do registro que estou pegando
	 no input hidden,se eu não pegar este id,vou mandar o campo vazio causando erro no banco de dados(o campo id_comentario não pode receber vazio) -->
		Noticia<select name="id_noticia" required></br><!-- listo os portais no select -->
			<?php
			$sql = "SELECT * FROM noticia order by id_noticia"; //variavel onde vai receber os comandos que serão executados no banco
			$query = pg_query($sql);//executo a query
			while($noticia= pg_fetch_assoc($query)){//executo o comando pg_fetch_assoc para poder listar os itens 
				
				echo "<option value=$noticia[id_noticia]>$noticia[titulo]</option>";//mostro numa tabela os itens da query
			}
			?>
		</select></br>
	Comentario:<input type="text" name="comentario" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	email:<input type="email" name="email" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	<input type="submit" value="enviar"required><!--input para pegar os dados do formulario e cadastrar no banco-->
</form>
