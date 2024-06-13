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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERNUTRI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/style.css">
    
</head>
<body>
            <!--Encabezado-->

    <header>

        <div class="menu container">
            <img class="logo-1"src="Imagenes/Sin título.png" alt="">
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="Imagenes/menu.png" class="menu-icono" alt="">
            </label>
            <!--Barra de navegacion-->
            <nav class="navbar">
                <div class="navbar">
                    <ul>
                        <li><a href="/index.php">Inicio</a></li>
                        <li> <a href="/citas/citas.php">Citas</a></li>
                        <li><a href="/platillos/platillos.php">Plan Alimenticio</a></li>
                        <li><a href="/comidas.php">Alimentos</a></li>
                        <li><a href="/Nutriologos/nutriologo.php">Nutriologos</a></li>
                        
                    </ul>
                </div>
                <img class="logo-2" src="Imagenes/Sin título.png" alt="" width="1000" height="150">
            <div class="menu-2">
                    <ul>
                        <?php if (isset($_SESSION['usuario'])): ?>
                            <li><a href="#"><?php echo htmlspecialchars($_SESSION['usuario']); ?></a></li>
                            <li><a href="login/cerrar_sesion.php">Cerrar Sesión</a></li>
                        <?php else: ?>
                            <li><a href="../indexLogin.php">Iniciar Sesión</a></li>
                        <?php endif; ?>
                     </ul>
            </nav>
        </div>

        <div class="header-content container">
            <div class="swiper mySwiper-1">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="slaider">
                            <div class="slider-txt">
                                <h1>Ensalada</h1>
                                <p>La ensalada es un platillo muy consumible que cualquier
                                    especialista te recomienda ya que, pueden ser una buena 
                                    manera de obtener las vitaminas, minerales y fibra
                                </p>
                                <div class="botones">
                                    <a href="comidas.php" class="btn-1">Consultar Calorias</a>
                                    
                                </div>
                            </div>
                                <div class="slider-img">
                                    <img src="Imagenes/ensalada.jpg" alt="">
                                </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slaider">
                            <div class="slider-txt">
                                <h1>Atun</h1>
                                <p>El atun es un alimento muy saludable.
                                    Es rico en ácidos grasos omega-3. Además contiene proteínas de gran calidad. También es 
                                    rico en vitaminas liposolubles,
                                    como la A y la D, y en vitaminas del grupo B, como la B2, B3, B6, B9 y B12.
                                </p>
                                <div class="botones">
                                    <a href="comidas.php" class="btn-1">Consultar Calorias</a>
                                    
                                </div>
                            </div>
                                <div class="slider-img">
                                    <img src="/Imagenes/atun.png" alt="">
                                </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slaider">
                            <div class="slider-txt">
                                <h1>Barbacoa</h1>
                                <p>Es rico en ácidos grasos omega-3. Además contiene proteínas de gran calidad.
                                    También es rico en vitaminas liposolubles, 
                                    como la A y la D, y en vitaminas del grupo B, como la B2, B3, B6, B9 y B12.
                                </p>
                                <div class="botones">
                                    <a href="comidas.php" class="btn-1">Consultar Calorias</a>
                                 
                                </div>
                            </div>
                                <div class="slider-img">
                                    <img src="Imagenes/barbacoa.png" alt="">
                                </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slaider">
                            <div class="slider-txt">
                                <h1>Manzanas</h1>
                                <p>Las manzanas tienen muchos beneficios. Son ricas en vitamina C, 
                                    que estimula el sistema inmunológico. Están llenas de pectina, 
                                    que es una buena fibra.
                                </p>
                                <div class="botones">
                                    <a href="comidas.php" class="btn-1">Consultar Calorias</a>
                           
                                </div>
                            </div>
                                <div class="slider-img">
                                    <img src="Imagenes/Manzanas.jpg" alt="">
                                </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slaider">
                            <div class="slider-txt">
                                <h1>Refrescos</h1>
                                <p>Entre los componentes tóxicos se destaca el ácido fosfórico, que tiene un efecto corrosivo. 
                                    La aparición de diabetes mellitus, anemia, pérdida del esmalte de los dientes, 
                                    envejecimiento y obesidad, forman parte de los efectos dañinos a la salud
                                </p>
                                <div class="botones">
                                    <a href="comidas.php" class="btn-1">Consultar Calorias</a>
                                    
                                </div>
                            </div>
                                <div class="slider-img">
                                    <img src="Imagenes/messipepsi.jpg" alt="">
                                </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </div>

    </header>


    <main class="products">
        <div class="tabs container">
            <input type="radio" name="tabs" id="tab1" checked="checked" class="tabinput" value="1">
            <label for="tab1">Frutas</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper1">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/Manzanas.jpg" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Manzana</p>
                                    <span class="price">52 calorias</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/piña.jfif" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Piña</p>
                                    <span class="price">50 calorias</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/mango.jpg" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Mango</p>
                                    <span class="price">60 calorias</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <input type="radio" name="tabs" id="tab2" checked="checked" class="tabinput" value="2">
            <label for="tab2">Comida Chatarra</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper2">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/hambur.jpg" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Hamburguesa</p>
                                    <span class="price">295 calorias</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/sabritas.jpg" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Fritura</p>
                                    <span class="price">243 calorias</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/galleta.jfif" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Galletas</p>
                                    <span class="price">230 calorias</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>


            <input type="radio" name="tabs" id="tab3" checked="checked" class="tabinput" value="3">
            <label for="tab3">Platillo</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swipper3">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/gorditas.jpg" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Gorditas</p>
                                    <span class="price">290 calorias</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/food7.png" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Nuggets De Pollo</p>
                                    <span class="price">280 calorias</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>
                                    <img src="Imagenes/ensalada.jpg" alt="">
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Ensalada</p>
                                    <span class="price">123 calorias</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </main>


    <section class="info container">

        <div class="info-img">
            <img src="Imagenes/pacman.jpg" alt="">
        </div>

        <div class="info-txt">
            <h2>Informacion</h2>
            <p>¡Hola! En SerNutri, estamos comprometidos a guiarte en tu viaje hacia una vida más 
                saludable a través de la nutrición consciente y equilibrada. Descubre cómo pequeños 
                cambios en tu alimentación pueden marcar una gran diferencia en tu bienestar </p>
        <a href="/Nutriologos/nutriologo.html" class="btn-2">Nutriologos</a>
        </div>
    </section>

    <section class="Horario">
        <div class="Horario-info container">
            <h2>Consultorio con mejores Reseñas</h2>
            <div class="Horario-txt">
                <div class="txt">
                    <h4> Horario & Direccion</h4>  
                    <p>
                       Healthy Consultorio  
                    </p>
                    <p>
                        Felipe Angeles 209, Zona centro, Gomez Palacio,Dgo.
                    </p>
                </div>
                <h4>Horario</h4>  
                <p>
                    Lunes a Viernes
                </p>
                <p>
                    Sabado Y Domingo
                </p>
            </div>

            </div>
            </div>
        </div>
    </section>

    <section>
        <iframe class="map"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3599.4175479302517!2d-103.49532069022374!3d25.557771577386657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fd9b496f59c2b%3A0x151ba632bb54c85f!2sHealthy%20Consultorios!5e0!3m2!1ses-419!2smx!4v1697608678588!5m2!1ses-419!2smx" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
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

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>
    
</body>
</html>