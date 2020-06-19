<?php
// Estableciendo la conexion a la base de datos
include("config/conn.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos

session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['login_id'];
// SQL Query para completar la informacion del usuario
$ses_sql=mysqli_query($connect, "select correo from usuario where correo='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['correo'];

if(!isset($login_session)){
mysqli_close($connect); // Cerrando la conexion
header('Location:/'); // Redirecciona a la pagina de inicio
}
?>