<?php
include('conexion.php');

$con=connection();

$id=$_GET['id'];

$sql= "SELECT * FROM citass WHERE id=$id";
$query = mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);

session_start();

if(!isset($_SESSION['usuario'])){
    echo'
    <script>
        alert("Por favor debes iniciar sesion");
        </script>
        ';
        header("location: indexLogin.php");
        session_destroy();
        die();
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>EDITAR CITA</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="/citas/CSS/style.css">
    </head>

    <body>
        <div class="users-form">
        <form action="edit_citas.php" method="post">
        <h1>EDITAR CITA</h1>
        <input type="hidden" name="id" placeholder="Ingresa Tu Nombre Completo" value="<?= $row ['id'] ?>">    
        <input type="text" name="name" placeholder="Ingresa Tu Nombre Completo" value="<?= $row ['Nombre_Paciente'] ?>">
            <input type="text" name="genero" placeholder="M O F" value="<?= $row ['genero'] ?>">
            <input type="text" name="edad" placeholder="Ingresa tu edad" value="<?= $row ['edad'] ?>">
            <input type="email" name="email" placeholder="Ingresa tu correo electronico" value="<?= $row ['correo'] ?>">
            <input type="date" name="fecha" value="<?= $row ['fecha'] ?>">
            <input type="time" name="hora" value="<?= $row ['hora'] ?>">
            <input type="text" name="lugar" placeholder="Ingresa el lugar de la cita" value="<?= $row ['lugar'] ?>">
            <input type="text" name="descripcion" placeholder="Ingresa el motivo de la cita" value="<?= $row ['descripcion'] ?>">
            <input type="text" name="nutriologo" placeholder="Ingresa el nombre del nutriologo" value="<?= $row ['nutriologo'] ?>">

            <input type="submit" value="Actualizar Cita">
            </form>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
