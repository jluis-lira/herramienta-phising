<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Catalogue</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/estilos.css">

</head>
<body id="Catalogue">
  <a name="Home"></a>
  <header>
    <img src="img/logo.png">
    <nav class="menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Reservaciones</a></li>
          <li><a href="#">Mis Viajes</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Nosotros</a></li>
        </ul>
      </nav>
  </header>
  <div class="mainCatalogue">
    <!-- Main SLIDESHOW -->
    <div class="swiper-container slideshow1">
      <div class="swiper-wrapper wrapper1">
        <?php
          include ('../Manager/db/DB_driver.php');
          $Con = connect();
          $SQL ="SELECT I.ruta,P.clave,P.destino,P.salida, P.id_paquete,P.descripcion,P.precio,P.vencimiento 
            FROM paquetes P, paquetes_img I 
            WHERE P.type = 1 AND P.clave = I.clave  AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
          $Result = Consult($Con,$SQL);
          //Procesar resultados

          $n = mysqli_num_rows($Result); 
          for($F=0;$F<$n;$F++)
          {

            $Row = mysqli_fetch_row($Result);// Obt el num de Rows de  un vect

            setlocale(LC_TIME, 'spanish');
            $Home = strftime("%d de %B del %Y", strtotime($Row[7]));
            print("
              
              <div class='swiper-slide slide1' style='background-image:url(paquetes_img/".$Row[0].")'>
                <div class='sb-description'>
                  <h1>Viaja a ".$Row[2]." saliendo de ".$Row[3]."</h1>
                  <p>Disfruta de unas fabulosas vacaciones por 3 dias en ".$Row[2]." con gastos de ".$Row[5]." incluidos. Disponible hasta el ".$Home."</p><br>
                  <form class='addCont'method='POST' action='#'>
                    <input type='hidden'name='idVenta' value='".$Row[4]."' required>
                    <input type='hidden'name='claveVenta' value='".$Row[1]."' required>
                    <input class='verMas' type='submit' value='Ver mas'>
                  </form>
                </div>
              </div>");
          };
          Cerrar($Con);

        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <hr>
    <h4><?php print("Visitas: ");engagement();?>.</h4>
    <hr>
    <h1 id="titlemain">Viajes</h1>
    <hr>
    <!-- SLIDESHOW SECUNDARIO-->
    <div class="swiper-container slideshow2">
      <div class="swiper-wrapper wrapper2">
        <?php
         
            $Con = connect();
            $SQL = "SELECT I.ruta,P.descripcion,P.destino,P.salida,P.precio, P.id_paquete, P.clave 
            FROM paquetes P, paquetes_img I 
            WHERE P.type = 2 AND P.clave = I.clave  AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
            $Result = Consult($Con,$SQL);
            //Procesar resultados

            $n = mysqli_num_rows($Result); //Obten el numero de Rows de  una relac.

            for($F=0;$F<$n;$F++)
            {
              $Row = mysqli_fetch_row($Result);// Obt el num de Rows de  un vect
              print("
                <div class='swiper-slide slide2'>
                  <img src='paquetes_img/".$Row[0]."'>
                  <h3>".$Row[1].$Row[5]."</h3>
                  <h1>Viaja a ".$Row[2]." saliendo de ".$Row[3]."</h1>
                  <h5>Precio por persona</h5>
                  <h4>MXN$</h4><h2>".$Row[4]."</h2>
                  <form class='addCont'method='POST' action='#'>
                    <input type='hidden'name='idVenta' value='".$Row[5]."' required>
                    <input type='hidden'name='claveVenta' value='".$Row[6]."' required>
                    <input class='verMas' type='submit' value='Ver mas'>
                  </form>
                </div>");
            };
            
            Cerrar($Con);
        ?>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
  <!-- FOOTER -->
  <footer id="contact">
      <div class="section-footer">
        <img src="img/logo.png" alt="">
      </div>
      <div class="section-footer">
        <h4>Hotel & Resort</h4>
        <a href="index.php">Home</a>
      </div>
      <div class="section-footer">
        <h4>Acerca de</h4>
        <a href="#">Hotel & Resort</a>
      </div>
      <div class="section-footer">
          <h4>Redes sociales</h4>
          <div class="social-media">
              <a href="#">f</a>
          </div>
      </div>
    </footer>
  <script src="js/swiper.min.js"></script>
    <!-- SLIDESHOW'S SCRIPTS-->
  <script>
    var swiper = new Swiper('.slideshow1', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      shadow: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
        shadow: true,
      },
      pagination: {
        
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
    });
    var swiper = new Swiper('.slideshow2', {
      slidesPerView: 3,
      spaceBetween: 30,
      shadow: true,
      scrollbar: {
        el: '.swiper-scrollbar',
        hide: true,
      },
    });
  </script>
</body>
</html>