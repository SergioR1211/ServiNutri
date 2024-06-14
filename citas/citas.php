<?php session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <title>CITAS SERNUTRI</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">


    <style>
        .input-group { margin-bottom: 1rem; }
        .table { margin-top: 2rem; }
        .table td, .table th { padding: 0.75rem; vertical-align: middle; }
        .btn:hover { background-color: green !important; color: white !important; opacity: 0.7; }
        .centered-button { display: flex; justify-content: center; margin-top: 1rem; }
    </style>
</head>

<body>
<header data-bs-theme="success">
  <div class="navbar navbar-expand-lg navbar-success bg-success">
    <div class="container">
      <a class="navbar-brand"><strong>SerNutri</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a href="/index.php" class="nav-link active">Inicio</a></li>
            <li class="nav-item"><a href="/citas/citas.php" class="nav-link active">Citas</a></li>
            <li class="nav-item"><a href="/comidas.php" class="nav-link active">Alimentos</a></li>
            <li class="nav-item"><a href="/platillos/platillos.php" class="nav-link active">Plan Alimenticio</a></li>
            <li class="nav-item"><a href="/Nutriologos/nutriologo.php" class="nav-link active">Nutrilogos</a></li>
        </ul>
        <img class="logo-2" src="/Imagenes/Sin título.png" alt="" width="150" height="100">
      </div>
    </div>
  </div>
</header>
    <div class="container">
        <div class="users-form mb-4">
            <form id="citaForm">
                <h1 class="text-center">CREAR CITA</h1>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" name="Nombre_Paciente" id="editNombre" placeholder="Ingresa Tu Nombre Completo">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <input type="text" class="form-control" name="genero" id="editGenero" placeholder="M O F">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="text" class="form-control" name="edad" id="editEdad" placeholder="Ingresa tu edad">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" name="correo" id="editCorreo" placeholder="Ingresa tu correo electronico">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                    <input type="date" class="form-control" id="editFecha" name="fecha">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                    <input type="time" class="form-control" id="editHora" name="hora">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" class="form-control" name="lugar" id="editLugar" placeholder="Ingresa el lugar de la cita">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-text"></i></span>
                    <input type="text" class="form-control" name="descripcion" id="editDescripcion" placeholder="Ingresa el motivo de la cita">
                </div>

                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input type="text" class="form-control" name="nutriologo" id="editNutriologo" placeholder="Ingresa el nombre del nutriologo">
                </div>

                <div class="centered-button">
                    <button type="submit" class="btn btn-dark">Agregar Cita</button>
                </div>
            </form>
        </div>

        <div class="users-table">
            <h2>CITAS REGISTRADAS</h2>
            <table class="table table-striped table-hover" id="citasTable">
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
                    <!-- Las filas se llenarán dinámicamente con JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('citaForm');
            const citasTable = document.getElementById('citasTable').getElementsByTagName('tbody')[0];

            // Función para cargar todas las citas
            function loadCitas() {
                fetch('http://localhost:5000/citas/citas')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(citas => {
                        citasTable.innerHTML = '';
                        citas.forEach(cita => {
                            const row = citasTable.insertRow();
                            row.innerHTML = `
                                <td>${cita.id}</td>
                                <td>${cita.Nombre_Paciente}</td>
                                <td>${cita.genero}</td>
                                <td>${cita.edad}</td>
                                <td>${cita.correo}</td>
                                <td>${cita.fecha}</td>
                                <td>${cita.hora}</td>
                                <td>${cita.lugar}</td>
                                <td>${cita.descripcion}</td>
                                <td>${cita.nutriologo}</td>
                              <td><a href="#" class="btn btn-dark" onclick="updateCita(${cita.id})">Editar</a></td>
                                <td><a href="#" class="btn btn-danger" onclick="deleteCita(${cita.id})">Eliminar</a></td>
                            `;
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un problema al cargar las citas. Por favor intenta de nuevo más tarde.');
                    });
            }

            // Función para crear una nueva cita
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                const data = {};
                formData.forEach((value, key) => data[key] = value);

                fetch('http://localhost:5000/citas/create_citas', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(cita => {
                    alert('Cita creada con éxito');
                    form.reset();
                    loadCitas();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un problema al crear la cita. Por favor intenta de nuevo más tarde.');
                });
            });

   function updateCita(id) {
    // Obtener los datos del formulario
    const Nombre_Paciente = document.getElementById('editNombre').value;
    const genero = document.getElementById('editGenero').value;
    const edad = document.getElementById('editEdad').value;
    const correo = document.getElementById('editCorreo').value;
    const fecha = document.getElementById('editFecha').value;
    const hora = document.getElementById('editHora').value;
    const lugar = document.getElementById('editLugar').value;
    const descripcion = document.getElementById('editDescripcion').value;
    const nutriologo = document.getElementById('editNutriologo').value;

    // Construir el objeto con los datos a actualizar
    const data = {
        Nombre_Paciente,
        genero,
        edad,
        correo,
        fecha,
        hora,
        lugar,
        descripcion,
        nutriologo
    };

    // Llenar los campos del formulario con los datos de la cita
    document.getElementById('editNombre').value = Nombre_Paciente;
    document.getElementById('editGenero').value = genero;
    document.getElementById('editEdad').value = edad;
    document.getElementById('editCorreo').value = correo;
    document.getElementById('editFecha').value = fecha;
    document.getElementById('editHora').value = hora;
    document.getElementById('editLugar').value = lugar;
    document.getElementById('editDescripcion').value = descripcion;
    document.getElementById('editNutriologo').value = nutriologo;

    // Construir el objeto con los datos a actualizar
    fetch(`http://localhost:5000/citas/citas/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Network response was not ok - ${response.status} ${response.statusText}`);
        }
        return response.json();
    })
    .then(updatedCita => {
        // Aquí puedes actualizar la fila correspondiente en la tabla o cualquier otra acción que necesites realizar
        console.log('Cita actualizada:', updatedCita);
        alert('Cita actualizada exitosamente');
        // Puedes recargar la página para reflejar los cambios o actualizar la tabla dinámicamente
        window.location.reload();
    })
    .catch(error => {
        console.error('Error actualizando cita:', error);
        alert(`Hubo un problema al actualizar la cita: ${error.message}`);
    });
}

            // Función para eliminar una cita
            window.deleteCita = function(id) {
                if (!confirm('¿Estás seguro de que deseas eliminar esta cita?')) return;

                fetch(`http://localhost:5000/citas/citas/${id}`, {
                    method: 'DELETE'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(message => {
                    alert(message);
                    loadCitas();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un problema al eliminar la cita. Por favor intenta de nuevo más tarde.');
                });
            }

            // Cargar todas las citas al cargar la página
            loadCitas();
        });
    </script>
</body>

</html>
