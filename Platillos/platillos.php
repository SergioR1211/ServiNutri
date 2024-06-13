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
    <title>PLAN ALIMENTICIO</title>
    <link rel="stylesheet" href="StyleFruta.css" />
  </head>
  <body>
    <header>
      <div class="menu container">
        <a href="#">
          <img src="../Imagenes/Sin título.png" class="logo" alt=""
        /></a>
        <input type="checkbox" id="menu" />
        <label for="menu"
          ><img src="../Imagenes/menu.png" class="menu-icono" alt=""
        /></label>
        <nav class="navbar">
          <ul>
            <li><a href="/index.php">Inicio</a></li>
            <li><a href="/citas/citas.php">Citas</a></li>
            <li><a href="/platillos/platillos.php">Plan Alimenticio</a></li>
            <li><a href="/comidas.php">Alimentos</a></li>
            <li><a href="/Nutriologos/nutriologo.php">Nutriologos</a></li>
          </ul>
        </nav>
      </div>

      <div class="header-content container">
        <div class="header-txt">
          <h1>Plan Alimenticio</h1>
          <p>
            Un plan de alimentación es una guía personalizada para la
            organización de la dieta que permite tener una buena salud. Consiste
            en la correcta distribución de alimentos y comidas del día. Sin
            embargo, no aplica para todos de la misma manera, ya que se basa en
            las necesidades únicas de cada individuo.
          </p>
        </div>

        <div class="header-img">
          <img src="..//Imagenes/planA.jpg" class="hambur" alt="" />
        </div>
      </div>
    </header>

    <main class="product-menu">
      <div class="container">
        <div class="product">
          <h2 class="title">PLATILLOS</h2>
          <img class="hoja" src="../Imagenes/hoja.png" alt="" />
        </div>

        <div class="menu-nav">
          <div id="pro1" class="tab active">Desayuno</div>
          <div id="pro2" class="tab">Comida</div>
          <div id="pro3" class="tab">Cena</div>
        </div>

        <div class="pro1 tab-content">
          <div class="box-container-1">
            <div class="box-1">
              <div class="image">
                <img src="../Imagenes/Huevo_revuelto_con_jamón.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Huevo con jamon</h3>
                <p>
                  Huevo con jamon, es un buen platillo para comenzar el dia, que
                  como bien sabemos, nos proporcionan amplias cantidades de
                  nutrientes.
                </p>
                <div class="icons">
                  <span class="price">184 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-1">
              <div class="image">
                <img src="../Imagenes/huevos-revueltos-americanos.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Huevos revueltos</h3>
                <p>
                  Otro platillo comun son los huevos revueltos, que nos
                  proporcionan proteina y 14 nutrientes esenciales
                </p>
                <div class="icons">
                  <span class="price">155 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-1">
              <div class="image">
                <img src="/Imagenes/panqueques-avena-9.jpg" alt="" />
              </div>
              <div class="content">
                <h3>panqueques de avena y banana</h3>
                <p>
                  Los panqueques hechos de avena nos ayudan a tener un almuerzo
                  balanceado cuando estamos en etapa de dieta.
                </p>
                <div class="icons">
                  <span class="price">118 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-1">
              <div class="image">
                <img
                  src="/Imagenes/sopa-de-pollo-con-arroz-640x481.jpg"
                  alt=""
                />
              </div>
              <div class="content">
                <h3>Sopa de pollo con arroz</h3>
                <p>
                  Aporta Vitamina B12, vitamina C, antioxidantes, vitamina A y
                  D, esto también dependerá de los ingredientes con los que esté
                  elaborado.
                </p>
                <div class="icons">
                  <span class="price">75 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-1">
              <div class="image">
                <img src="/Imagenes/crema-de-verduras-deliciosa-1.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Crema de verduras</h3>
                <p>
                  Aportan fibra, la cual contribuye a un mejor tránsito
                  intestinal. Aportan un plus de energía. Son aptas para
                  personas con colesterol alto porque apenas contienen grasas.
                </p>
                <div class="icons">
                  <span class="price">36 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
          </div>
          <center>
            <div class="load-more" id="load-more-1">Cargar Mas</div>
          </center>
        </div>

        <div class="pro2 tab-content">
          <div class="box-container-2">
            <div class="box-2">
              <div class="image">
                <img src="/Imagenes/TAQUITOS-DORADOS-1-462x375.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Tacos Dorados</h3>
                <p>
                  Por los ingredientes que aportan los tacos dorados podemos
                  encontrar: proteínas, fibra, vitamina A, del complejo B, C y
                  hasta K
                </p>
                <div class="icons">
                  <span class="price">270 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-2">
              <div class="image">
                <img src="/Imagenes/torta.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Tortilla de patata</h3>
                <p>
                  Una porción de 100 g tiene aproximadamente 3.2 g de proteínas,
                  4.8 g de lípidos, 15.2 g de carbohidratos y 1.6 g de fibra.
                </p>
                <div class="icons">
                  <span class="price">126 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-2">
              <div class="image">
                <img src="/Imagenes/Pozole-Soup-1-3.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Pozole</h3>
                <p>
                  El pozole es una comida equilibrada y nutritiva, gracias a la
                  combinación de sus ingredientes. Este plato es naturalmente
                  rico en fibra, vitaminas y minerales esenciales como la
                  vitamina A, C, E, niacina, calcio, hierro, yodo, potasio y
                  magnesio
                </p>
                <div class="icons">
                  <span class="price">49 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-2">
              <div class="image">
                <img
                  src="/Imagenes/ravioles-de-verdura-y-salsa-light-foto-principal.jpg"
                  alt=""
                />
              </div>
              <div class="content">
                <h3>Ravioles de Verdura</h3>
                <p>
                  los ravioli suelen estar rellenos de ricota, una especie de
                  requesón y otros tipos de queso, espinaca, ortiga, carne,
                  riñones, sesos, etcétera
                </p>
                <div class="icons">
                  <span class="price">201 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-2">
              <div class="image">
                <img
                  src="/Imagenes/paella-de-marisco-casera-500x375.jpg"
                  alt=""
                />
              </div>
              <div class="content">
                <h3>Paella Marisco</h3>
                <p>
                  Esta variación de paella está repleta de pescado fresco,
                  camarones, calamares, mejillones y almejas , pero el verdadero
                  tesoro es el arroz.
                </p>
                <div class="icons">
                  <span class="price">87 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
          </div>
          <center>
            <div class="load-more" id="load-more-2">Cargar Mas</div>
          </center>
        </div>

        <div class="pro3 tab-content">
          <div class="box-container-3">
            <div class="box-3">
              <div class="image">
                <img src="/Imagenes/1651861522207.jpeg" alt="" />
              </div>
              <div class="content">
                <h3>ENSALADA DE FRUTAS</h3>
                <p>
                  Esta ensalada se puede servir como postre o de entrante.
                  Además de ser ligera, nos aporta fibra, más del 100% de las
                  necesidades diarias de vitamina C, antioxidantes y minerales.
                </p>
                <div class="icons">
                  <span class="price">50 calorias</span>
                  <span class="buy"><img src="Imagenes/car.svg" alt="" /></span>
                </div>
              </div>
            </div>
            <div class="box-3">
              <div class="image">
                <img src="/Imagenes/galletasAv.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Galletas de avena</h3>
                <p>
                  Adicionalmente son una gran fuente de micronutrientes como
                  vitaminas destacando las del complejo B y minerales sobre todo
                  el hierro, magnesio, fósforo, potasio, zinc, manganeso y
                  calcio
                </p>
                <div class="icons">
                  <span class="price">23 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-3">
              <div class="image">
                <img src="/Imagenes/cereal.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Cereal</h3>
                <p>
                  Aportan una gran cantidad de energía y nutrientes en
                  comparación con otras fuentes de carbohidratos.
                </p>
                <div class="icons">
                  <span class="price">378 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-3">
              <div class="image">
                <img src="/Imagenes/polloa.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Pollo a la plancha</h3>
                <p>
                  es fuente importante de nutrientes como proteínas, lípidos,
                  Vitamina 3 y minerales como calcio, hierro, zinc, sodio,
                  potasio y magnesio, entre otros.
                </p>
                <div class="icons">
                  <span class="price">111 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
            <div class="box-3">
              <div class="image">
                <img src="/Imagenes/huevoconchor.jpg" alt="" />
              </div>
              <div class="content">
                <h3>Huevo con chorizo</h3>
                <p>
                  Nos aporta proteínas de buena calidad, hidratos de carbono
                  complejos y grasas saludables. Es recomendable acompañar esta
                  receta con un plato de ensalada o unas verduritas al vapor
                </p>
                <div class="icons">
                  <span class="price">217 calorias</span>
                  <span class="buy"
                    ><img src="..Imagenes/car.svg" alt=""
                  /></span>
                </div>
              </div>
            </div>
          </div>
          <center>
            <div class="load-more" id="load-more-3">Cargar Mas</div>
          </center>
        </div>
      </div>
    </main>

    <section class="info">
      <div class="info-content container">
        <div class="info-txt">
          <p>Informacion Adicional</p>
          <h2>Plan Alimenticio</h2>
          <div class="info-sec">
            <div class="info-1">
              <img src="..Imagenes/f1.svg" alt="" />
              <div class="info-2">
                <p>
                  Nos enfocamos en brindarle al usuario, amplia variedad de
                  platillos donde, queda en responsabilidad del usuario, el
                  tomar acciones antes o despues de consultar a un profesional.
                </p>
              </div>
            </div>
            <div class="info-2">
              <img src="..Imagenes/f2.svg" alt="" />
            </div>
          </div>
        </div>
        <div class="info-img">
          <img src="/Imagenes/comidasA.jpg" alt="" />
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

    <script src="ScriptFruta.js"></script>
  </body>
</html>
