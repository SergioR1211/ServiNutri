<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre'];
$correoE = $_POST['correo'];
$Usuario = $_POST['usuario'];
$Contraseña = $_POST['clave'];

$query = "INSERT INTO usuarios(nombre_completo,correo,usuario,clave) 
          VALUES('$nombre_completo','$correoE','$Usuario','$Contraseña')";

          //verificar que el correo no se repita en la base de datos

          $verificar=mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correoE'");

          if(mysqli_num_rows($verificar) > 0 ){
            echo' 
            <script>
                alert("Este correo ya existe en la base de datos");
                window.location= "../indexLogin.php";
            </script>
            ';
            exit();
          }

           //verificar que el usuario no se repita en la base de datos

           $verificarU=mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$Usuario'");

           if(mysqli_num_rows($verificarU) > 0 ){
             echo' 
             <script>
                 alert("Este usuario ya existe en la base de datos");
                 window.location="../indexLogin.php";
             </script>
             ';
             exit();
           }

 $ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
        alert("Usuario almacenado exitosamente");
        window.location="../indexLogin.php";
    </script>
    ';
}else{
    echo '
    <script>
        alert("Usuario no almacenado, intentalo nuevamente");
        window.location="../indexLogin.php";
    </script>
    ';
}

mysqli_close($conexion);
?>