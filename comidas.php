<?php

include 'C/database.php';

$query = "SELECT * FROM alimentos ";
$execute= $conexion->query($query);
$resultado = $execute->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header data-bs-theme="success">
        <div class="navbar navbar-expand-lg navbar-success bg-success ">
            <div class="container">
                <a class="navbar-brand"><strong>SerNutri</strong></a>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="/index.html" class="nav-link active">Inicio</a></li>
                        <li class="nav-item"><a href="/citas/citas.html" class="nav-link active">Citas</a></li>
                        <li class="nav-item"><a href="/alimentos.html" class="nav-link active">Alimentos</a></li>
                        <li class="nav-item"><a href="/plan.html" class="nav-link active">Plan Alimenticio</a></li>
                        <li class="nav-item"><a href="/nutriologos.html" class="nav-link active">Nutrilogos</a></li>
                    </ul>
                    <img class="logo-2" src="/Imagenes/Sin título.png" alt="" width="150" height="100">
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="alimentos-container">
                <!-- Aquí se insertarán las tarjetas dinámicamente -->
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
                    <li><a href="/index.html">Inicio</a></li>
                    <li><a href="/mision.html">Mision</a></li>
                    <li><a href="/vision.html">Vision</a></li>
                    <li><a href="#">Contactos</a></li>
                    <li><a onclick="window.alert('©2023 SERNUTRI(SERVICIOS NUTRITIVOS). Todos los derechos reservados.');">Derechos Reservados</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script>
        fetch('http://localhost:5000/comida/alimentos',
            {
                method: "GET",
                headers: {
                    "Content-Type": "application/json"
                }
            }
        )
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('alimentos-container');
                data.forEach(alimento => {
                    const card = document.createElement('div');
                    card.className = 'col';
                    card.innerHTML = `
                        <div class="card shadow-sm">
                            <img src="data:image/jpg;base64,${alimento.imagen}" alt="Imagen de ${alimento.nombre}">
                            <div class="card-body">
                                <h5 class="card-title">${alimento.nombre}</h5>
                                <p class="card-text">Calorías: ${alimento.calorias}</p>
                                <p class="card-text">${alimento.descripcion}</p>
                                <p class="card-text">Cantidad: ${alimento.cantidad}</p>
                            </div>
                        </div>
                    `;
                    container.appendChild(card);
                });
            })
            .catch(err => console.error(err));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
