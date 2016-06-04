<?php
require_once ('conexao.class.php');
$conect = new Conectar();//instancio uma nova conexão ao banco de dados
header("Content-Type: application/xml; charset=UTF-8");//para não ter problemas de identificação,o navegador ira interpretar este arquivo php como um arquivo xml
echo '<?xml version="1.0" encoding="UTF-8" ?>';//tag de inicio do xml
?>
<rss version="2.0"><!-- tag de inicio do rss-->
<channel><!-- tag obrigatoria onde une blocos de informações-->
	<title>Noticias unopar</title><!-- tag onde mostra o titulo do conteudo-->
	<language>pt-br</language><!-- tag onde mostra qual é o idioma das noticias -->


<?php 
$sql = "SELECT * FROM noticia";//variavel que vai executar um select da tabela de noticias


	$query = pg_query($sql);//executo a query

	while ($colunas = pg_fetch_assoc($query))://com o laço while,listo todas as colunas  da tabela noticias
		$titulo = $colunas['titulo'];
		$link = $colunas['link'];
		$conteudo  = $colunas['conteudo'];
		$data = $colunas['data']; 
?>		 

<item><!-- tag item que gera outro bloco de informações,as tags title,link e description são obrigatorias,pub date é opcional-->
	<title><?php echo $colunas['titulo'];?></title><!-- ainda com o laço while,listo as clunas,titulo,link,
	conteudo e a data da minha tabela de noticias na pagina rss-->
	<link><?php echo $colunas['link']; ?></link>
	<description><?php echo $colunas['conteudo']; ?></description>
	<pubDate><?php echo $colunas['data']; ?></pubDate>
</item><!-- fecho a tag item-->
<?php endwhile?><!-- termina o laço while-->
</channel><!-- fecho a tag channel-->
</rss><!-- fecho a tag rss-->