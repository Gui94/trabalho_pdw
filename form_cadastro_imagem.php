<a href="index.php">voltar</a>
<br/>
<a href="listar_imagens.php">lista de imagens cadastradas</a>
<?php
require_once('conexao.class.php');
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
?>

<form action="requests_imagem.php?acao=cadastrar" method="post"><!--action que vai legar ao arquivo onde trata todos os requests 
	do formulario,se a ação for cadastrar,ele cadastra os dados no banco que foram pegos no formulario -->
		Noticias<select name="id_noticia" required></br><!-- listo as noticias no select -->
			<?php
			$sql = "SELECT * FROM noticia order by id_noticia"; //variavel onde vai receber os comandos que serão executados no banco
			$query = pg_query($sql);//executo a query
			while($noticia= pg_fetch_assoc($query)){///executo o comando pg_fetch_assoc para poder listar os itens junto ao laço while
			echo "<option value=$noticia[id_noticia]>$noticia[titulo]</option>";//mostro numa tabela os itens da query
			}
			?>
		</select></br>
destaque?<label>Sim
   <input type="radio" name="destaque" value="true" /><!--input para pegar os valores do formulario,como estamos tratando de um booleano,os valores true e false se encontram no campo value,assim que for clicado
    em um dos circulos do input radio
    ,na hora do submit,pegara true ou false-->
</label> 
<label>Nao
   <input type="radio" name="destaque" value="false" />
</label>
<br/>
Upload de imagem:<input type="file" name="imagem"><!--input para fazer o upload da imagem-->
<br/>
<input type="submit" value="cadastrar"><!--input para pegar os dados do formulario e cadastrar no banco-->
</form>