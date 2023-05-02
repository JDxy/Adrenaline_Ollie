<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSS/stores_style.css">
  <link rel="stylesheet" href="CSS/menu&footer_style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<?php
    require_once 'PHP/parts/header.php';
?>
<div class="container">
    <div class="producto">
        <img src="ASSETS/IMG/INDEX/skates/053da20d4201086b8c58970544fe6e38.jpg" alt="">
        <p>Producto 1</p>
        <p>Precio</p>
        <button id="comprar" class="w3-button w3-black">Comprar</button>
    </div>
    <div class="producto">
        <img src="ASSETS/IMG/INDEX/skates/053da20d4201086b8c58970544fe6e38.jpg" alt="">
        <p>Producto 1</p>
        <p>Precio</p>
        <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black">Comprar</button>
        <div id="id02" class="w3-modal w3-animate-opacity">
            <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('id02').style.display='none'" 
                class="w3-button w3-large w3-display-topright">&times;</span>
                <h2>Nombre del producto</h2>
            </header>
                <div class="w3-container">
                    <p>Some text..</p>
                    <p>Some text..</p>
                </div>

            </div>
        </div>
    </div>
</div>


<?php
    require_once 'PHP/parts/footer.php';
?>