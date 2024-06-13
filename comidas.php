<?php

include 'C/database.php';

$query = "SELECT * FROM alimentos ";
$execute= $conexion->query($query);
$resultado = $execute->fetch_assoc();

?>

<?php
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comidas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="C/styleC.css">
</head>
<body>
    
<header data-bs-theme="success">
  <div class="collapse text-bg-success" id="navbarHeader">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </div>
  <div class="navbar navbar-expand-lg navbar-success bg-success ">
    <div class="container">
      <a class="navbar-brand">
        <strong>SerNutri</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="/index.php" class="nav-link active">Inicio</a>
            </li>
            <li class="nav-item">
                <a href="/citas/citas.php" class="nav-link active">Citas</a>
            </li>
            <li class="nav-item">
                <a href="/comidas.php" class="nav-link active">Alimentos</a>
            </li>
            <li class="nav-item">
                <a href="/platillos/platillos.php" class="nav-link active">Plan Alimenticio</a>
            </li>
            <li class="nav-item">
                <a href="/Nutriologos/nutriologo.php" class="nav-link active">Nutrilogos</a>
            </li>
        </ul>
        <img class="logo-2" src="/Imagenes/Sin título.png" alt="" width="150" height="100">
      </div>
    </div>
  </div>
</header>
<main>
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach($execute as $row){?>
        <div class="col">
          <div class="card shadow-sm">
          
           <img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']) ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nombre'];?></p>
              <p class="card-text">Calorias: <?php echo $row['calorias'];?></p>
              <p class="card-text"><?php echo $row['descripcion'];?></p>
              <p class="card-text">Cantidad:<?php echo $row['cantidad'];?></p>

                <div class="btn-group">
                    <h4 class="card-text"></a>
            
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
    </div>
</main>

<footer class="footer">
      <div class="footer-content container">
        <div class="link">
          <img src="/Imagenes/Sin título.png" class="logo" />
        </div>

        <div class="link">
          <ul>
            <li><a href="/index.php">Inicio</a></li>
            <li><a href="/Mision/mision.php">Mision</a></li>
            <li><a href="/Vision/vision.php">Vision</a></li>
            <li><a href="#">Contactos</a></li>
            <li><a onclick="window.alert('©2023 SERNUTRI(SERVICIOS NUTRITIVOS). Todos los derechos reservados.');">Derechos Reservados</a></li>
          </ul>
        </div>
      </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>



</body>
</html>