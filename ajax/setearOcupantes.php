<?php
  require '../rb-mysql.php';
  require_once ("../config/db.php");
  require_once ("../config/conexion.php");
  R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

  $pass1 = $_POST['user_password'];
  $sqlCarpa = "SELECT user_password_hash FROM Users WHERE user_name = 'admin'";
  $pass = R::getRow($sqlCarpa);
<<<<<<< HEAD
  
  if (password_verify($pass1, $pass['user_password_hash']))
  {
    echo "Las contraseñas coinciden.";
=======

  if (password_verify($pass1, $pass['user_password_hash']))
  {
    echo "Las contraseñas coinciden.";
    R::exec("UPDATE Carpas SET ocupacion_actual=0;");
>>>>>>> df2343bfb207afc6dc788c066efcf7a6c9f18892
  }
  else
  {
    echo "Las contraseñas no coinciden.";
  }
?>