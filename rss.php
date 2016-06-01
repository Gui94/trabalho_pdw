<?php
require_once ('conexao.class.php');
$conect = new Conectar();
header("Content-Type: application/xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<rss version="2.0">
<channel>
	<title>Noticias unopar</title>
	<language>pt-br</language>


<?php 
$sql = "SELECT * FROM noticia";


	$query = pg_query($sql);

	while ($colunas = pg_fetch_assoc($query)):
		$titulo = $colunas['titulo'];
		$link = $colunas['link'];
		$conteudo  = $colunas['conteudo'];
		$data = $colunas['data']; 
?>		 

<item>
	<title><?php echo $colunas['titulo'];?></title>
	<link><?php echo $colunas['link']; ?></link>
	<description><?php echo $colunas['conteudo']; ?></description>
	<pubDate><?php echo $colunas['data']; ?></pubDate>
</item>
<?php endwhile?>
</channel>
</rss>