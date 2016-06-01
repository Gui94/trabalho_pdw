<a href="index.php">voltar</a>
<br/>
<a href="listar_imagens.php">lista de imagens cadastradas</a>
<?php
require_once('conexao.class.php');
$conect = new Conectar();
require_once('cruds.class.php');
$op = new Cruds('imagem');
?>

<form action="requests_imagem.php?acao=cadastrar" method="post">
		Noticias<select name="id_noticia" required></br>
			<?php
			$sql = "SELECT * FROM noticia order by id_noticia"; 
			$query = pg_query($sql);
			while($noticia= pg_fetch_assoc($query)){
			echo "<option value=$noticia[id_noticia]>$noticia[titulo]</option>";
			}
			?>
		</select></br>
destaque?<label>Sim
   <input type="radio" name="destaque" value="true" />
</label> 
<label>Nao
   <input type="radio" name="destaque" value="false" />
</label>
<br/>
Upload de imagem:<input type="file" name="imagem">
<br/>
<input type="submit" value="cadastrar">
</form>