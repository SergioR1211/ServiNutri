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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nutriologos</title>
    <link rel="stylesheet" href="styleN.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <header class="header">
      <div class="menu container">
        <img src="/Imagenes/Sin título.png" class="logo" />
        <label for="menu">
          <img src="/Imagenes/menu.png" class="menu-icono" alt="menu" />
        </label>

        <nav class="navbar">
          <ul>
            <li><a href="/index.php">Inicio</a></li>
            <li> <a href="/citas/citas.php">Citas</a></li>
            <li><a href="/platillos/platillos.php">Plan Alimenticio</a></li>
            <li><a href="/comidas.php">Alimentos</a></li>
            <li><a href="/Nutriologos/nutriologo.php">Nutriologos</a></li>
          </ul>
        </nav>
      </div>

      <div class="header-content container">
        <div class="header-txt">
          <h1>Nutriologos</h1>
          <p>
            Dentro de este apartado de nuestra pagina te mostraremos los
            diferentes nutriologos, asi como una descripcion de su trabajo y
            algun diplomado con el que cuenten.
          </p>
        </div>
        <div class="header-img">
          <img src="/Imagenes/dia-de-nutriologo.jpg" alt="" />
        </div>
      </div>
    </header>

    <main class="servicios">
      <h2>Servicios</h2>
      <div class="servicios-content container">
        <div class="servicio-1">
          <i class="fa-sharp fa-solid fa-hospital-user"></i>
          <h3>Perdida de peso</h3>
        </div>

        <div class="servicio-1">
          <i class="fa-sharp fa-solid fa-stethoscope"></i>
          <h3>Ganar peso</h3>
        </div>

        <div class="servicio-1">
          <i class="fa-solid fa-hospital"></i>
          <h3>Control alimenticio</h3>
        </div>
      </div>
    </main>


    <section class="about container">
      <div class="about-img">
        <img src="/Imagenes/doc.jpg" alt="" />
      </div>
      <div class="about-txt">
        <h2>Dr.Maria Fernanda Lara</h2>
        <p>
          ¡Hola! Soy Maria Fernanda Lara, una apasionada profesional de la
          salud especializada en nutrición y bienestar. Mi objetivo es ayudarte
          a alcanzar tus metas de salud a través de una alimentación balanceada
          y personalizada.
        </p>
        <br/>
        <img src="/Imagenes/diploma.jpg" alt="" />
      </div>
      <div class="about-img">
        <img src="/Imagenes/doc.jesus.jpg" alt="" />
      </div>
      <div class="about-txt">
        <h2>Nutriologo. Jesus Olivares Banda</h2>
        <p>
          ¡Hola! Soy Jesus Olivares Banda, una apasionada profesional de la
          salud especializada en nutrición y bienestar. Mi objetivo es ayudarte
          a alcanzar tus metas de salud a través de una alimentación balanceada
          y personalizada.
        </p>
        <br />
        <img src="/Imagenes/nutridip.png" alt="" />
      </div>
      </div>
    </section>
    <section class="about container">
      <div class="about-img">
        <img src="/Imagenes/Nutrición diabetes.jpg" alt="" />
      </div>
      <div class="about-txt">
        <h2>Dr.Beatriz Vivar Mora</h2>
        <p>
          ¡Hola! Soy Beatriz Vivar Mora, una apasionada profesional de la
          salud especializada en nutrición y bienestar. Mi objetivo es ayudarte
          a alcanzar tus metas de salud a través de una alimentación balanceada
          y personalizada.
        </p>
        <br/>
        <img src="/Imagenes/Diploma-Nutricion-Humana.jpg" alt="" />
      </div>
      <div class="about-img">
        <img src="/Imagenes/uwu.jpeg" alt="" />
      </div>
      <div class="about-txt">
        <h2>Dr.Maria Lorenzo Ibañez</h2>
        <p>
          ¡Hola! Soy Maria Lorenzo Ibañez, una apasionada profesional de la
          salud especializada en nutrición y bienestar. Mi objetivo es ayudarte
          a alcanzar tus metas de salud a través de una alimentación balanceada
          y personalizada.
        </p>
        <br />
        <img src="/Imagenes/maridipl.png" alt="" />
      </div>
      </div>
    </section>
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
  </body>
</html>
