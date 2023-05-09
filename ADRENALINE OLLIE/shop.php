<?php
require_once 'PHP/parts/header.php';

if (isset($_POST["send"])) {
  $producto = [$_POST["ID_producto"], $_POST["Img_producto"], $_POST["Nombre_producto"], $_POST["precio"]];

  if (isset($_COOKIE['trolley'])) {
    $lista = json_decode($_COOKIE['trolley'], true);
    array_push($lista, $producto);
  } else {
    $lista = array($producto);
  }

  setcookie('trolley', json_encode($lista), time()+3600); 
}

?> 

<!DOCTYPE html>+
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="CSS/shop_style.css">

    <link rel="stylesheet" href="CSS/menu&footer_style.css">
    <link rel="shortcut icon" href="ASSETS/IMG/INDEX/icons/main-icon.png" type="image/x-icon">

</head>


<?php
//https://animista.net/play/basic/shadow-drop-2
// require_once 'PHP/parts/header.php';
// require 'PHP/class/class_shop.php';
?> 
   <img class="etiqueta" src="ASSETS/IMG/STORE/etiqueta.png" alt="">
<div class="slider">
    <?php
      
      $producto = $sh->select_values('Producto', 'Img_producto', 'ORDER BY ID_producto DESC LIMIT 3');
      foreach ($producto as $key => $value) {
        echo '<img src="' . substr($value['Img_producto'],3) . '" alt="">';
      }
    ?>
   
      <!-- <img src="ASSETS/IMG/INDEX/skates/descarga-removebg-preview.png" alt="" class="slide active">
      <img src="ASSETS/IMG/INDEX/skates/descarga__1_-removebg-preview.png" alt="" class="slide">
      <img src="ASSETS/IMG/INDEX/skates/pdc5b02808-7fda-4780-903e-324c75f027f8LGM-removebg-preview.png" alt="" class="slide"> -->
  </div>




<div class="productos">
</div>

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

<!--  Sección para los trucks -->
<h2>Trucks</h2>
<section>
  <?php
    $sh->show_products('TRUCKS');
  ?>
</section>
</div>


<script>

const modales = document.querySelector('.modal-overlay');
const abrirModalBtns = document.querySelectorAll('.abrir-modal');
const cerrarModalBtns = document.querySelectorAll('.modal button[type="button"]');

abrirModalBtns.forEach((abrirModalBtn, index) => {
  abrirModalBtn.addEventListener('click', () => {
    modales[index].classList.add('activo');
  });
});

cerrarModalBtns.forEach((cerrarModalBtn, index) => {
  cerrarModalBtn.addEventListener('click', () => {
    modales[index].classList.remove('activo');
  });
});




</script>

<script src="JS/shop_script.js"></script>

<?php


 require_once 'PHP/parts/footer.php';

?>