<?php
require_once('conexao.class.php');
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
//pego o id por get
$id_noticia = $_GET['id_noticia'];
?>
<a href="listar_noticia.php">lista de noticias cadastradas</a>
<br/>
<form action="requests_noticia.php?acao=atualizar" method="post"><!--action que vai legar ao arquivo onde trata todos os requests 
	do formulario,se a ação for atualizar,ele atualiza os dados no banco que foram pegos no formulario -->
<input type="hidden" value="<?php echo $id_noticia ?>" name="id_noticia"><!--Id do registro que estou pegando
	 no input hidden,se eu não pegar este id,vou mandar o campo vazio causando erro no banco de dados(o campo id_noticia não pode receber vazio) -->
		Portais<select name="id_portal" required></br><!-- listo os portais no select -->
			<?php
			$sql = "SELECT * FROM portal order by id_portal"; //variavel onde vai receber os comandos que serão executados no banco
			$query = pg_query($sql);//executo a query
			while($portal= pg_fetch_assoc($query)){//executo o comando pg_fetch_assoc para poder listar os itens 
				
				echo "<option value=$portal[id_portal]>$portal[nm_portal]</option>";//mostro numa tabela os itens da query
			}
			?>
		</select></br>
	Titulo:<input type="text" name="titulo" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	Data:<input type="text" name="data" required>dia/mes/ano<!--input para pegar os dados digitados no formulario-->
	<br/>
	Gravata:<input type="text" name="gravata" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	Conteudo da noticia<input type="text" name="conteudo" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	Link:<input type="text" name="link" required><!--input para pegar os dados digitados no formulario-->
	<br/>
	<input type="submit" value="enviar"required><!--input para pegar os dados do formulario e cadastrar no banco-->
</form>
