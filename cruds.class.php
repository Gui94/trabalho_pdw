<?php
//classe responsavel em fazer as ações do crud.
class Cruds
 {	
 	//função de cadastro de portal,onde recebe por parametro as variaveis que pegaram as informações do formulario por POST para realizar o cadastro
 	//variavel onde vai receber os comandos que serão executados no banco
	public function CadastroPortal($nm_portal,$site,$email){
	$query = "INSERT INTO portal(nm_portal,site,email) VALUES('$nm_portal','$site','$email')";
	//caso não ocorra nenhum erro,executo a query para realizar o cadastro no banco de dados
	pg_query($query) or die("nao cadastro");
	//após o cadastro,redireciono para o formulario de cadastro(mesma pagina)
	header('Location:form_cadastro_portal.php');

	}
	//função de deleção do portal,passo por parametro o id do portal onde ele vai ser pego por get na pagina de listagem dos portais,após clicar no link de delete,apagara o registro
	//variavel onde vai receber os comandos que serão executados no banco
	public function DeletePortal($id_portal){
	 $query = "DELETE FROM portal where id_portal = '$id_portal'";
	 //executo a query caso não ocorra nenhum erro
	 pg_query($query) or die ("nao deletou");
	 //após deletar o registro,redireciona para o formulario de cadastro
	 header('Location:form_cadastro_portal.php');

	}
	//função de update do portal,pego por get o id do portal para pegar especificamente um registro só,onde será redirecionado para um formulario para cadastrar as novas informações daquele registro
	public function PortalUpdate($id_portal,$nm_portal,$site,$email){
	//variavel onde vai receber os comandos que serão executados no banco
		$query = "UPDATE portal set nm_portal = '$nm_portal' , site = '$site' , email = '$email' WHERE id_portal = '$id_portal'";
		//executo a query caso não ocorra nenhum erro
		pg_query($query) or die("nao alterou");
		 //após deletar o registro,redireciona para a listagem dos portais
		header('Location:listar_portal.php');
	}
	//crud portal fim

	//crud noticia inicio

	//função de cadastro de noticia,onde recebe por parametro as variaveis que pegaram as informações do formulario por POST para realizar o cadastro
	//variavel onde vai receber os comandos que serão executados no banco
	public function CadastroNoticia($id_portal,$titulo,$data,$gravata,$conteudo,$link){
		//caso não ocorra nenhum erro,executo a query para realizar o cadastro no banco de dados
		$query = "INSERT INTO noticia(id_portal,titulo,data,gravata,conteudo,link) VALUES('$id_portal','$titulo','$data','$gravata','$conteudo','$link')";
		//após o cadastro,redireciono para o formulario de cadastro(mesma pagina)
		pg_query($query) or die("nao cadastrou");
		//após deletar o registro,redireciona para o formulario de cadastro
		header('Location:form_cadastro_noticia.php');
	}
	//função de deleção da noticia,passo por parametro o id do portal onde ele vai ser pego por get na pagina de listagem dos portais,após clicar no link de delete,apagara o registro
	public function DeleteNoticia($id_noticia){
	//variavel onde vai receber os comandos que serão executados no banco
		$query = "DELETE FROM noticia WHERE id_noticia = '$id_noticia'";
		pg_query($query) or die ("nao deletou");
		header('Location:listar_noticia.php');
	}

	public function NoticiaUpdate($id_portal,$id_noticia,$titulo,$data,$gravata,$conteudo,$link){
		$query = "UPDATE noticia set titulo = '$titulo' , data = '$data' , gravata = '$gravata',conteudo = '$conteudo',link = '$link',id_portal = '$id_portal' WHERE id_noticia = '$id_noticia'";
		pg_query($query) or die("nao alterou");
		header('Location:listar_noticia.php');
	}


	// crud noticia fim

	//imagem
	public function ImageUpload($id_noticia,$imagem,$destaque){
		$query = "INSERT INTO imagem(id_noticia,imagem,destaque) VALUES('$id_noticia','$imagem','$destaque')";
		pg_query($query) or die ("nao cadastrou");
		header('Location:form_cadastro_imagem.php');		
	}

	public function DeleteImagem($id_imagem){
		$query = "DELETE FROM imagem WHERE id_imagem = '$id_imagem'";
		pg_query($query) or die ("nao deletou");
		header('Location:listar_imagens.php');
	}

	public function ImagemUpdate($id_noticia,$id_imagem,$destaque){
		$query = "UPDATE imagem set id_noticia = '$id_noticia' , destaque = '$destaque' WHERE id_imagem = '$id_imagem'";
		pg_query($query) or die("nao alterou");
		header('Location:listar_imagens.php');
	}

	//comentario
	public function Comentario($id_noticia,$comentario,$email){
		$query = "INSERT INTO comentarios(id_noticia,comentario,email) VALUES('$id_noticia','$comentario','$email')";
		pg_query($query) or die ("nao cadastrou");
		header('Location:listar_noticias.php');		
	}


}