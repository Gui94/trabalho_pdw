<?php
require_once('conexao.class.php');
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
require_once('cruds.class.php');
//instancio um novo crud da tabela noticia
$op = new Cruds('noticia');
?>
<a href="listar_noticia.php">lista de noticias cadastradas</a>
<br/>
<a href="index.php">voltar</a>

<form action="requests_noticia.php?acao=cadastrar" method="post"><!--action que vai legar ao arquivo onde trata todos os requests 
	do formulario,se a ação for cadastrar,ele cadastra os dados no banco que foram pegos no formulario -->
		Portais<select name="id_portal" required></br><!-- listo os portais no select -->
			<?php
			$sql = "SELECT * FROM portal order by id_portal"; //variavel onde vai receber os comandos que serão executados no banco
			$query = pg_query($sql);//executo a query
			while($portal= pg_fetch_assoc($query)){//executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
				
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
