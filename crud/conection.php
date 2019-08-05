<?
  @session_start();

  $host  = "localhost";   //Servidor do mysql
  $user  = "root"; 		    //Usuario do banco de dados
  $senha = "desenv"; 	    //senha do banco de dados
  $db    = "seraph_crud"; //banco de dados

  $db = new mysqli($host, $user, $senha, $db);

  if(mysqli_connect_errno()){
    echo mysqli_connect_error();
  }
  
