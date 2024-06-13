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
    <title>VISION</title>
  </head>
  <body>
    <h3>VISIÓN DE SERNUTRI</h3>
    <br>
    <h4>
      En SERNUTRI, nos visualizamos como líderes
      inspiradores en el ámbito de la nutrición y el bienestar, siendo
      reconocidos por nuestra contribución significativa a la mejora de la salud
      de las personas a nivel global. Nuestra visión refleja un futuro en el que
      cada individuo tenga acceso a la información, el apoyo y los recursos
      necesarios para lograr una vida plena y saludable a través de la
      nutrición.
    </h4>
    <br>
    <br>

    <br>
    <h3>NUESTROS PILARES PARA EL FUTURO</h3>
    <H4>
        1.Impacto Positivo a Escala Global:
        Aspiramos a expandir nuestra influencia y llegar a comunidades en todo el mundo. Buscamos ser una fuente confiable y accesible de información nutricional, contribuyendo de manera significativa a la mejora de la salud y el bienestar a nivel global.
        <br>
        <br>
        2.Desarrollo de Herramientas Tecnológicas:
        Visualizamos la creación de herramientas tecnológicas innovadoras que faciliten la adopción de hábitos alimenticios saludables. Esto incluye aplicaciones interactivas, plataformas en línea y dispositivos inteligentes que apoyen a las personas en su viaje hacia la salud.
        <br>
        <br>
        3.Colaboración con Expertos en Salud:
        Buscamos establecer asociaciones sólidas con profesionales de la salud, organizaciones gubernamentales y empresas comprometidas con la promoción de la salud. A través de estas colaboraciones, aspiramos a influir en políticas de salud pública y contribuir a iniciativas que fomenten la alimentación saludable.
        <br>
        <br>
        4.Comunidad Activa y Empoderada:
        Imaginamos una comunidad activa y empoderada, donde los individuos comparten experiencias, conocimientos y apoyo mutuo en su búsqueda de una vida saludable. Buscamos ser el catalizador que impulse la formación y crecimiento de esta comunidad.
        <br>
        <br>
        5.Reconocimiento como Referente de Calidad:
        Nos esforzamos por ser reconocidos como un referente de calidad en el campo de la nutrición, con un equipo de nutricionistas altamente capacitados y servicios que superan las expectativas. Aspiramos a obtener reconocimientos y certificaciones que respalden nuestra dedicación a la excelencia.
    </H4>
    <img src="/Imagenes/Sin título.png" alt="">
  </body>
</html>
