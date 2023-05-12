<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina principal</title>
  <link rel="stylesheet" href="CSS/index_style.css">
  <link rel="stylesheet" href="CSS/menu&footer_style.css">
  <link rel="shortcut icon" href="ASSETS/IMG/INDEX/icons/main-icon.png" type="image/x-icon">
</head>
<?php
  require_once 'PHP/parts/header.php';
?>
    <header>
      <h1>ADRENALINE OLLIE</h1>
    </header>
    <section class="section-1"> 
        <p>Nacimos como una marca por y para skaters</p>
        <h2>Nuestra marca</h2>
        <div class="flecha"></div>
        <img src="ASSETS/IMG/INDEX/skateboard-316565-removebg-preview.png" alt="">
    </section>
    
    
    
    <section class="section-2"> 
        <h2>Nuestros diseños</h2>
        <div class="slider">
            <img src="ASSETS/IMG/INDEX/skates/descarga-removebg-preview.png" alt="" class="slide active">
            <img src="ASSETS/IMG/INDEX/skates/descarga__1_-removebg-preview.png" alt="" class="slide">
            <img src="ASSETS/IMG/INDEX/skates/pdc5b02808-7fda-4780-903e-324c75f027f8LGM-removebg-preview.png" alt="" class="slide">
        </div>
    </section>

    <section class="section-3"> 
        <h2>Haz tu propio skate</h2>
 
        <div>
          <p>Crea tu skate con tu propio diseño desde cero
            y personaliza tu skate con las mejores marcas
          </p>
          <img  src="ASSETS/IMG/INDEX/marcas/pngwing.com (4).png" alt="">
          <img  src="ASSETS/IMG/INDEX/marcas/pngwing.com (6).png" alt="">
          <img  src="ASSETS/IMG/INDEX/marcas/pngwing.com (5).png" alt="">
        </div>

        <img class="main-img" src="ASSETS/IMG/INDEX/best-skateboard-brands-decks-trucks-wheels.jpg" alt="">
    </section>
    <!-- <script src="index_script.js"></script> -->
<?php
  require_once 'PHP/parts/footer.php';
?>