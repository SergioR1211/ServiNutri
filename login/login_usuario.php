<?php
session_start();
include 'conexion_be.php';

$correo =$_POST['correo'];
$contraseña=$_POST['clave'];

// Proteger contra inyección SQL
$correo = mysqli_real_escape_string($conexion, $correo);
$contraseña = mysqli_real_escape_string($conexion, $contraseña);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' 
and clave = '$contraseña'");


if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
    header("location: ../index.php");
    exit;
}else{
    echo'
    <script>
    alert("Usuario no existe en la base de datos, verifique los datos introducidos");
    window.location= "../indexLogin.php";
    </script>
    ';
}
?>