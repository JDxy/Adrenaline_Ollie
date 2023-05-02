<?php
require_once 'PHP/parts/header.php';
require 'PHP/class/class_shop.php';
$sh = new Shop();

if (isset($_POST["send"])) {
  if ($_POST["email"] != "") {
    $email = $_POST["email"];
    $producto = [$_POST["ID_producto"], $_POST["Img_producto"], $_POST["Nombre_producto"], $_POST["precio"]];
    if (isset($_COOKIE[$email])) {
      $lista = json_decode($_COOKIE[$email], true);
      $lista[] = $producto;
    } else {
      $lista = array($producto);
    }
    setcookie('TROLLEY_OF:{$_POST["email"]}', json_encode($lista), time() + 86400 * 30); // la cookie expirará en 30 días
  } else {
    $url = 'start_session.php';
    echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
  }
}


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/shop_style.css">
    <link rel="stylesheet" href="CSS/menu&footer_style.css">

</head>


<?php
// require_once 'PHP/parts/header.php';
// require 'PHP/class/class_shop.php';
?> 

<div class="slider">
      <img src="ASSETS/IMG/INDEX/skates/descarga-removebg-preview.png" alt="" class="slide active">
      <img src="ASSETS/IMG/INDEX/skates/descarga__1_-removebg-preview.png" alt="" class="slide">
      <img src="ASSETS/IMG/INDEX/skates/pdc5b02808-7fda-4780-903e-324c75f027f8LGM-removebg-preview.png" alt="" class="slide">
  </div>


<?php
  // $sh = new Shop();
?>

<div class="productos">

<!-- Sección para los skates -->
<h2>Skates</h2>
<section>
  <?php
  $sh->show_products('SKATE');
  ?>
</section>

<!-- Sección para las tablas -->
<h2>Tablas</h2>
<section>

  <?php
    $sh->show_products('TABLA');
  ?>
</section>

<!-- Sección para las ruedas -->
<h2>Ruedas</h2>
<section>


  <?php
    $sh->show_products('RUEDAS');
  ?>
</section>

<!-- Sección para los rodamientos -->
<h2>Rodamientos</h2>
<section>


  <?php
    $sh->show_products('RODAMIENTOS');
  ?>
</section>

<!-- Sección para los trucks -->
<h2>Trucks</h2>
<section>
  <?php
    $sh->show_products('TRUCKS');
  ?>
</section>
</div>

<script src="JS/shop_script.js"></script>

<?php
if(isset($_COOKIE['email'])) {
  $cookieValue = $_COOKIE['email'];
  $lista = json_decode($cookieValue, true);
  print_r($lista);
  // Hacer algo con $lista
}

// if (isset($_POST["send"])) {

//     if ($_POST["email"] != "") {
      
//       $lista = [$_POST["email"], [$_POST["ID_producto"], $_POST["Img_producto"], $_POST["Nombre_producto"], $_POST["precio"]]]

      
//     }else {
//       $url = 'start_session.php';
//       echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
//     }
//   }

  // if (isset($_POST["send"])) {
  //   if ($_POST["email"] != "") {
  //     $email = $_POST["email"];
  //     $producto = [$_POST["ID_producto"], $_POST["Img_producto"], $_POST["Nombre_producto"], $_POST["precio"]];
  //     if (isset($_COOKIE[$email])) {
  //       $lista = json_decode($_COOKIE[$email], true);
  //       $lista[] = $producto;
  //     } else {
  //       $lista = array($producto);
  //     }
  //     setcookie($email, json_encode($lista), time() + 86400 * 30); // la cookie expirará en 30 días
  //   } else {
  //     $url = 'start_session.php';
  //     echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
  //   }
  // }



 require_once 'PHP/parts/footer.php';




?>
