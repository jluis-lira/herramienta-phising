<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Catalogue</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="estilos.css">

</head>
<body id="Catalogue">
  <a name="Home"></a>
  <header>
    <img src="">
    <nav class="menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Reservations</a></li>
          <li><a href="#">Destinations</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
      </nav>
  </header>
  <div class="mainCatalogue">
    <!-- Main Index -->
    <hr>
    <h4><?php include ('../Manager/db/DB_driver.php'); print("Visits: ");engagement(); ?>.</h4>
    <hr>
  </div>
  <!-- FOOTER -->
  <footer class="contact">
  <div class="section-footer">
      <h4>Home</h4>
      <img src="" alt="">
    </div>
    <div class="section-footer">
      <h4>Hotel & Resort</h4>
      <a href="index.php">Home</a>
    </div>
    <div class="section-footer">
      <h4>About Us</h4>
      <a href="#">Hotel & Resort</a>
    </div>
    <div class="section-footer">
      <h4>Social Media</h4>
      <div class="social-media">
        <a href="#">f</a>
      </div>
    </div>
  </footer>
</body>
</html>