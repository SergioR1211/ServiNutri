<?php
include('conexion.php');
$con=connection();

$id=null;
$name = $_POST['name'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$nutriologo = $_POST['nutriologo'];

$sql = "INSERT INTO citass VALUES('$id','$name','$genero','$edad','$email','$fecha','$hora','$lugar','$descripcion','$nutriologo')";
$query = mysqli_query($con,$sql);

if($query){
    Header("Location: citas.php");
}
?>