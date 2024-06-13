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
    <title>Mision</title>
  </head>
  <body>
    <h1>NUESTRA MISION</h1>

    <h4>
      MISIÓN DE SERNUTRI: 
      <br>
      <br>
      En SERNUTRI, nos dedicamos fervientemente a transformar vidas a través del
      poder de la nutrición y el bienestar. Nuestra misión es inspirar y guiar a
      individuos hacia un estilo de vida más saludable, equilibrado y pleno,
      mediante un enfoque integral de la nutrición y la salud. 
    </h4>
    <br>
    <h4>NUESTROS PRINCIPIOS</h4>
    <H4>1.Diseñar Planes de Alimentación Personalizados:
        Reconocemos la singularidad de cada individuo y la importancia de abordar sus necesidades específicas. Nuestros nutricionistas trabajan para crear planes de alimentación personalizados que se adapten a los estilos de vida, metas y preferencias de cada persona.
        <br>
        <br>
        2.Fomentar Hábitos Alimenticios Saludables:
        Nos esforzamos por promover hábitos alimenticios sostenibles y saludables que perduren a lo largo del tiempo. Creemos en el equilibrio, la variedad y la moderación como elementos clave para lograr una alimentación consciente.
        <br>
        <br>
        3.Apoyar el Bienestar Integral:
        Reconocemos la interconexión entre la nutrición, la salud mental y el bienestar emocional. Buscamos apoyar el bienestar integral, considerando no solo la dieta, sino también otros aspectos que contribuyen a una vida plena y saludable.
        <br>
        <br>
        4.Crear una Comunidad de Apoyo:
        Aspiramos a construir una comunidad en la que los individuos se sientan respaldados y motivados en su viaje hacia una mejor salud. Valoramos la conexión y el intercambio de experiencias para inspirar y motivar mutuamente.
        <br>
        <br>
        5.Perseguir la Excelencia Profesional:
        Nos comprometemos a mantener los más altos estándares de profesionalismo y ética. Nuestro equipo de nutricionistas certificados se esfuerza por mantenerse actualizado en los avances científicos y brindar un servicio de calidad.
    </H4>
    <img src="/Imagenes/Sin título.png" alt="">
  </body>
</html>
