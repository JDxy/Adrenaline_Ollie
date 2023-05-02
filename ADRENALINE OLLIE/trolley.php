<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/menu&footer_style.css">
    <link rel="stylesheet" href="CSS/trolley_style.css">
</head>


<?php
require_once 'PHP/parts/header.php';
require 'PHP/class/class_shop.php';

$sh = new Shop();
// $pedido = $sh->show_table("pedido");
?>

<div class="productos">

</div>

<button class="myButton pay">Pagar: </button> 


<!-- <?php

// foreach ($pedido as $pedido) {

//     echo '<div class="producto">';
//     echo '<img src="' . $producto['Img_producto'] . '.PNG" alt="">';
//     echo '<h3>' . $producto['Nombre_producto'] . '</h3>';
//     echo '<p>' . $producto['Tipo_producto'] . '</p>';
//     echo '</div>';
  
// }


?> -->


<script src="JS/trolley_script.js"></script> 
<?php
  require_once 'PHP/parts/footer.php';
?>