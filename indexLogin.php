<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("location: Index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                <!--Login-->
               <form class="formulario__login" onsubmit="loggin(event)">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electronico" id="username" name="correo" required>
                    <input type="password" placeholder="Contraseña" id="password" name="clave" required>
                    <button type="submit">Entrar</button>
              </form>

                   <!-- Register -->
                    <form class="formulario__register" onsubmit="register_API(event)">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre completo"  id="register_nombre_completo" name="nombre_completo" required>
                    <input type="text" placeholder="Correo Electronico" id="register_username" name="correo" required>
                    <input type="text" placeholder="Usuario" id="register_user" name="usuario" required>
                    <input type="password" placeholder="Contraseña"  id="register_password" name="clave" required>
                    <button type="submit">Regístrarse</button>
                    </form>

                </div>
            </div>

        </main>
        <script>
             function loggin(event) {
        event.preventDefault(); // Evita el envío del formulario
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        if (username && password) {
            fetch("http://localhost:5000/login/login", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ username, password })
            })
            .then(response => response.json())
            .then((res) => {
                console.log(res.done)
                console.log(res);
                // Aquí puedes agregar lógica adicional si el inicio de sesión es exitoso
            })
            .catch((err) => {
                console.log("Error al iniciar sesión");
                console.error(err);
            });
        }
    }
    
    function register_API(event) {
        event.preventDefault(); // Evita el envío del formulario
        const nombre_completo = document.getElementById('register_nombre_completo').value;
        const username = document.getElementById('register_username').value;
        const user = document.getElementById('register_user').value;
        const password = document.getElementById('register_password').value;

        if (nombre_completo && username && user && password) {
            fetch("http://localhost:5000/login/create", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ nombre_completo, username, user, password })
            })
            .then(response => response.json())
            .then((res) => {
                console.log(res.done)
                console.log(res);
                if (res.message) {
                    alert('Usuario creado exitosamente');
                }
            })
            .catch((err) => {
                console.log("Error al registrar usuario");
                console.error(err);
            });
        }else{
            alert("No haz ingresado todos los datos")
        }
    }
</script>


        <script src="/js/scriptLogin.js"></script>
</body>
</html>