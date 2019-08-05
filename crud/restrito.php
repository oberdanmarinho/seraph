<?php
  
  include("conection.php");

  $login = @$_POST['login'];
  $password = @$_POST['password'];
  
  $sql = "SELECT * FROM crud_login WHERE login = '$login' and password = '$password' ";
  $result = $db->query($sql);
  $user = $result->fetch_object();
  $db->close();
  
  if($user->username == "") { 
    header("Location:index.php?erro=Login e/ ou senha invalidos !" );
  } else {
    $_SESSION["name"] = $user->username;
    $_SESSION["login"] = $user->login;
    header("Location: index.php");
  }
