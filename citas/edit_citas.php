<?php
include('conexion.php');
$con=connection();

$id=$_POST['id'];
$name = $_POST['name'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$nutriologo = $_POST['nutriologo'];

$sql = "UPDATE citass SET Nombre_Paciente='$name',genero='$genero',edad='$edad',
correo='$email',fecha='$fecha',hora='$hora',lugar='$lugar',descripcion='$descripcion',nutriologo='$nutriologo' WHERE id=$id";
$query = mysqli_query($con,$sql);

if($query){
    Header("Location: citas.php");
}


?>