<?php
require_once('conexao.class.php');
//instancio uma nova conexão ao banco de dados
$conect = new Conectar();
require_once('cruds.class.php');
//instancio um novo crud da tabela portal
$op = new Cruds('portal');
//pego o id por get
$id_portal = $_GET['id_portal'];
?>
<a href="listar_portal.php">lista de portais cadastrados</a>
<br/>
<form action ="requests.php?acao=atualizar&id_portal=<?php echo $id_portal?>" method="post"><!--action que vai levar ao arquivo onde trata todos os requests 
	do formulario,se a ação for atualizar,ele atualiza os dados no banco que foram pegos no formulario -->
	<input type="hidden" value="<?php echo $id_portal ?>" name="id_portal"><!--Id do registro que estou pegando
	 no input hidden,se eu não pegar este id,vou mandar o campo vazio causando erro no banco de dados(o campo id_portal não pode receber vazio) -->
	portal <input type="text" name="nm_portal"   required><!--input para pegar os dados digitados no formulario-->
	<br/>
	site <input type="site" name="site"  required><!--input para pegar os dados digitados no formulario-->
	<br/>
	email <input type="email" name="email"  required><!--input para pegar os dados digitados no formulario-->
	<br/>
	<input type="submit" value="enviar"><!--input para pegar os dados do formulario e cadastrar no banco-->
</form>