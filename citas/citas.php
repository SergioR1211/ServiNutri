<?php
include('conexion.php');

$con = connection();

$sql = "SELECT * FROM citass";
$query = mysqli_query($con, $sql);

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
    <title>CITAS SERNUTRI</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <style>
        .input-group {
            margin-bottom: 1rem;
        }
        .table {
            margin-top: 2rem;
        }
        .table td, .table th {
            padding: 0.75rem;
            vertical-align: middle;
        }
        .btn:hover {
            background-color: green !important;
            color: white !important;
            opacity: 0.7;
        }
        .centered-button {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }
    </style>
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
    <div class="container">
        <div class="users-form mb-4">
            <form action="insert_citas.php" method="post">
            <h1 class="text-center">CREAR CITA</h1>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Ingresa Tu Nombre Completo">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <input type="text" class="form-control" name="genero" placeholder="M O F">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="text" class="form-control" name="edad" placeholder="Ingresa tu edad">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo electronico">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                    <input type="date" class="form-control" name="fecha">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                    <input type="time" class="form-control" name="hora">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" class="form-control" name="lugar" placeholder="Ingresa el lugar de la cita">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-text"></i></span>
                    <input type="text" class="form-control" name="descripcion" placeholder="Ingresa el motivo de la cita">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input type="text" class="form-control" name="nutriologo" placeholder="Ingresa el nombre del nutriologo">
                </div>

                <div class="centered-button">
                    <button type="submit" class="btn btn-dark">Agregar Cita</button>
                </div>
            </form>
        </div>

        <div class="users-table">
            <h2>CITAS REGISTRADAS</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Lugar</th>
                        <th>Descripcion</th>
                        <th>Nutriologo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['Nombre_Paciente'] ?></td>
                        <td><?= $row['genero'] ?></td>
                        <td><?= $row['edad'] ?></td>
                        <td><?= $row['correo'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['hora'] ?></td>
                        <td><?= $row['lugar'] ?></td>
                        <td><?= $row['descripcion'] ?></td>
                        <td><?= $row['nutriologo'] ?></td>
                        <td><a href="update.php?id=<?= $row['id'] ?>" class="btn btn-dark">Editar</a></td>
                        <td><a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4JQ+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
