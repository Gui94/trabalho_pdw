<?php
//classe para fazer a conexão do banco,onde cada atributo recebe as informações necessarias para se conectar no banco de dados
class Conectar{
   private $conexao;
   private $host = 'localhost';
   private $usuario = 'postgres';
   private $senha = 'abc123';
   private $banco = 'Noticias';
   //função onde cria a conexao com o banco
  function conectar(){
    $conect = pg_connect("host=localhost port=5432 dbname=Noticias user=postgres password=abc123");
       if(!$conect){
    //caso não seja encontrado nenhum usuario do banco,mostra a mensagem de erro
     die("Usuario incorreto ou não existe");
  }
  //caso não exista o banco de dados,mostra a mensagem de erro
  else{
    $this->conexao = $conect;
    $selecionarDB = $this->banco.$this->conexao;
      if(!$selecionarDB){
          die("banco de dados inexistente ou nome do banco incorreto");
      }
    }
  }
 }









?>
