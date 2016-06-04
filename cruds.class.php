<?php
//classe responsavel em fazer as ações do crud.
class Cruds
 {	
 	//função de cadastro de portal,onde recebe por parametro as variaveis que pegaram as informações do formulario por POST para realizar o cadastro
	public function CadastroPortal($nm_portal,$site,$email){//passo por parametro as variaveis que vão pegar as informações nos formularios
	$query = "INSERT INTO portal(nm_portal,site,email) VALUES('$nm_portal','$site','$email')";//variavel onde vai receber os comandos que serão executados no banco
	//caso não ocorra nenhum erro,executo a query para realizar o cadastro no banco de dados
	pg_query($query) or die("nao cadastro");
	//após o cadastro,redireciono para o formulario de cadastro(mesma pagina)
	header('Location:form_cadastro_portal.php');

	}
	//função de deleção do portal,passo por parametro o id do portal onde ele vai ser pego por get na pagina de listagem dos portais,após clicar no link de delete,apagara o registro
	public function DeletePortal($id_portal){//passo por parametro as variaveis que vão pegar as informações nos formularios
	 $query = "DELETE FROM portal where id_portal = '$id_portal'";//variavel onde vai receber os comandos que serão executados no banco
	 //executo a query caso não ocorra nenhum erro
	 pg_query($query) or die ("nao deletou");
	 //após deletar o registro,redireciona para o formulario de cadastro
	 header('Location:form_cadastro_portal.php');

	}
	//função de update do portal,pego por get o id do portal para pegar especificamente um registro só,onde será redirecionado para um formulario para cadastrar as novas informações daquele registro
	public function PortalUpdate($id_portal,$nm_portal,$site,$email){//passo por parametro as variaveis que vão pegar as informações nos formularios
	//variavel onde vai receber os comandos que serão executados no banco
		$query = "UPDATE portal set nm_portal = '$nm_portal' , site = '$site' , email = '$email' WHERE id_portal = '$id_portal'";
		//executo a query caso não ocorra nenhum erro
		pg_query($query) or die("nao alterou");
		 //após atualizar o registro,redireciona para a listagem dos portais
		header('Location:listar_portal.php');
	}
	//crud portal fim

	//crud noticia inicio

	//função de cadastro de noticia,onde recebe por parametro as variaveis que pegaram as informações do formulario por POST para realizar o cadastro
	public function CadastroNoticia($id_portal,$titulo,$data,$gravata,$conteudo,$link){//passo por parametro as variaveis que vão pegar as informações nos formularios
		$query = "INSERT INTO noticia(id_portal,titulo,data,gravata,conteudo,link) VALUES('$id_portal','$titulo','$data','$gravata','$conteudo','$link')";//variavel onde vai receber os comandos que serão executados no banco
		pg_query($query) or die("nao cadastrou");//caso não ocorra nenhum erro,executo a query para realizar o cadastro no banco de dados
		//após deletar o registro,redireciona para o formulario de cadastro
		header('Location:form_cadastro_noticia.php');//após o cadastro,redireciono para o formulario de cadastro(mesma pagina)
	}
	//função de deleção da noticia,passo por parametro o id do portal onde ele vai ser pego por get na pagina de listagem das noticias,após clicar no link de delete,apagara o registro
	public function DeleteNoticia($id_noticia){
	//variavel onde vai receber os comandos que serão executados no banco
		$query = "DELETE FROM noticia WHERE id_noticia = '$id_noticia'";
		pg_query($query) or die ("nao deletou");//executo a query caso não ocorra nenhum erro
		header('Location:listar_noticia.php');//após deletar o registro,redireciona para a lista de noticias
	}
	//função de update da noticia,pego por get o id da noticia para pegar especificamente um registro só,onde será redirecionado para um formulario para cadastrar as novas informações daquele registro
	public function NoticiaUpdate($id_portal,$id_noticia,$titulo,$data,$gravata,$conteudo,$link){//passo por parametro as variaveis que vão pegar as informações nos formularios
		//variavel onde vai receber os comandos que serão executados no banco
		$query = "UPDATE noticia set titulo = '$titulo' , data = '$data' , gravata = '$gravata',conteudo = '$conteudo',link = '$link',id_portal = '$id_portal' WHERE id_noticia = '$id_noticia'";
		pg_query($query) or die("nao alterou");//executo a query caso não ocorra nenhum erro
		header('Location:listar_noticia.php');//após atualizar o registro,redireciona para a listagem das noticias
	}


	// crud noticia fim

	//imagem
	//função de cadastro de imagem,onde recebe por parametro as variaveis que pegaram as informações do formulario por POST para realizar o cadastro
	public function ImageUpload($id_noticia,$imagem,$destaque){//passo por parametro as variaveis que vão pegar as informações nos formularios
		$query = "INSERT INTO imagem(id_noticia,imagem,destaque) VALUES('$id_noticia','$imagem','$destaque')";//variavel onde vai receber os comandos que serão executados no banco
		pg_query($query) or die ("nao cadastrou");//executo a query caso não ocorra nenhum erro
		header('Location:form_cadastro_imagem.php');//após cadastrar o registro,redireciona para a listagem das noticias		
	}
    //função de deleção da imagem,passo por parametro o id da imagem onde ele vai ser pego por get na pagina de listagem das imagens,após clicar no link de delete,apagara o registro
	public function DeleteImagem($id_imagem){
		$query = "DELETE FROM imagem WHERE id_imagem = '$id_imagem'";//variavel onde vai receber os comandos que serão executados no banco
		pg_query($query) or die ("nao deletou");//executo a query caso não ocorra nenhum erro
		header('Location:listar_imagens.php');//após deletar o registro,redireciona para a lista de imagens
	}
    //função de update da imagem,pego por get o id da imagem para pegar especificamente um registro só,onde será redirecionado para um formulario para cadastrar as novas informações daquele registro
	public function ImagemUpdate($id_noticia,$id_imagem,$destaque){//passo por parametro as variaveis que vão pegar as informações nos formularios
		$query = "UPDATE imagem set id_noticia = '$id_noticia' , destaque = '$destaque' WHERE id_imagem = '$id_imagem'";//variavel onde vai receber os comandos que serão executados no banco
		pg_query($query) or die("nao alterou");//executo a query caso não ocorra nenhum erro
		header('Location:listar_imagens.php');//após atualizar o registro,redireciona para a listagem das imagens
	}

	//comentario
	//função de cadastro de comentarios,cada noticia tem um link para postar um comentario,pego o id da noticia pelo link,e nesse link vai ser redirecionado para o formulario de postagens de comentarios
	public function Comentario($id_noticia,$comentario,$email){//passo por parametro as variaveis que vão pegar as informações nos formularios
		$query = "INSERT INTO comentarios(id_noticia,comentario,email) VALUES('$id_noticia','$comentario','$email')";//variavel onde vai receber os comandos que serão executados no banco
		pg_query($query) or die ("nao cadastrou");//executo a query caso não ocorra nenhum erro
		header('Location:listar_noticias.php');//após cadastrar,redireciona para a listagem das noticias
	}


}