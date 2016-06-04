<?php
require_once('conexao.class.php');
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
require_once('cruds.class.php');
//instancio um novo crud da tabela noticia
$op = new Cruds('noticia');
//pego o id por get
$id_noticia = $_GET['id_noticia'];
?>
<br/>
<form action ="requests_comentario.php?acao=cadastrar" method="post"><!--action que vai levar ao arquivo onde trata todos os requests 
	do formulario,se a ação for cadastrar,ele cadastra os dados no banco que foram pegos no formulario -->
	<input type="hidden" value="<?php echo $id_noticia ?>" name="id_noticia"><!--Id do registro que estou pegando
	 no input hidden,se eu não pegar este id,vou mandar o campo vazio causando erro no banco de dados(o campo id_noticia não pode receber vazio) -->
	comentario <input type="site" name="comentario"  required><!--input para pegar os dados digitados no formulario-->
	<br/>
	email <input type="email" name="email"  required><!--input para pegar os dados digitados no formulario-->
	<br/>
	<input type="submit" value="enviar"><!--input para pegar os dados do formulario e cadastrar no banco-->
</form>