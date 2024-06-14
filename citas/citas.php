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
            <h1 class="text-center" id="formTitle">CREAR CITA</h1>
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
                <button type="submit" class="btn btn-dark" id="addButton">Agregar Cita</button>
                <button type="button" class="btn btn-primary" id="updateButton" style="display: none;">Actualizar Cita</button>
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
                    <th>Detalles Del Lugar</th>
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
    const addButton = document.getElementById('addButton');
    const updateButton = document.getElementById('updateButton');
    const formTitle = document.getElementById('formTitle');

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
                        <td><a href="#" class="btn btn-dark" data-id="${cita.id}" onclick="editCita(this)">Editar</a></td>
                        <td><a href="#" class="btn btn-danger" data-id="${cita.id}" onclick="deleteCita(this)">Eliminar</a></td>
                        <td><a href="#" class="btn btn-info btn-sm detailButton"">Ver Detalles</a></td>
                    `;
                    row.querySelector('.detailButton').addEventListener('click', () => showDetalleLugar(cita.id));
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

    // Función para editar una cita
    window.editCita = function(element) {
        const id = element.getAttribute('data-id');
        fetch(`http://localhost:5000/citas/citas/${id}`)
            .then(response => response.json())
            .then(cita => {
                document.getElementById('editNombre').value = cita.Nombre_Paciente;
                document.getElementById('editGenero').value = cita.genero;
                document.getElementById('editEdad').value = cita.edad;
                document.getElementById('editCorreo').value = cita.correo;
                document.getElementById('editFecha').value = cita.fecha;
                document.getElementById('editHora').value = cita.hora;
                document.getElementById('editLugar').value = cita.lugar;
                document.getElementById('editDescripcion').value = cita.descripcion;
                document.getElementById('editNutriologo').value = cita.nutriologo;

                // Set the id to the update button data attribute
                updateButton.setAttribute('data-id', id);
                updateButton.style.display = 'block';
                addButton.style.display = 'none';
                formTitle.textContent = 'EDITAR CITA';
            })
            .catch(error => {
                console.error('Error al cargar la cita:', error);
                alert('Hubo un problema al cargar la cita. Por favor intenta de nuevo más tarde.');
            });
    };

    // Función para actualizar una cita
    updateButton.addEventListener('click', function() {
        const id = updateButton.getAttribute('data-id');
        const data = {
            Nombre_Paciente: document.getElementById('editNombre').value,
            genero: document.getElementById('editGenero').value,
            edad: document.getElementById('editEdad').value,
            correo: document.getElementById('editCorreo').value,
            fecha: document.getElementById('editFecha').value,
            hora: document.getElementById('editHora').value,
            lugar: document.getElementById('editLugar').value,
            descripcion: document.getElementById('editDescripcion').value,
            nutriologo: document.getElementById('editNutriologo').value,
        };

        fetch(`http://localhost:5000/citas/citas/${id}`, {
            method: 'PUT',
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
        .then(updatedCita => {
            alert('Cita actualizada exitosamente');
            form.reset();
            updateButton.style.display = 'none';
            addButton.style.display = 'block';
            formTitle.textContent = 'CREAR CITA';
            loadCitas();
        })
        .catch(error => {
            console.error('Error actualizando cita:', error);
            alert('Hubo un problema al actualizar la cita. Por favor intenta de nuevo más tarde.');
        });
    });

    // Función para eliminar una cita
    window.deleteCita = function(element) {
        const id = element.getAttribute('data-id');
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
    };

    function showDetalleLugar() {
    fetch(`http://localhost:5000/Registro/ObtenerDetalles`, {
        method: 'GET'
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Convertir la respuesta a JSON
        })
        .then(detalle => {
            alert(`Detalles del Lugar:
                Nombre: ${detalle.nombre}
                Dirección: ${detalle.direccion}
                Ciudad: ${detalle.ciudad}
                Estado: ${detalle.estado}
                Código Postal: ${detalle.codigo_postal}
                País: ${detalle.pais}
            `);
        })
        .catch(error => console.error('Error al obtener los detalles del lugar:', error));
}


    // Cargar todas las citas al cargar la página
    loadCitas();
});
</script>
</body>
</html>

