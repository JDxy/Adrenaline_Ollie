<?php
  if (isset($_POST["finalizar_transaccion"])) {
    // elimina el carrito
    setcookie('trolley', '', time()-3600);
    header('Location: ' . 'shop.php');
  };
  if (isset($_COOKIE['trolley'])){
    $trolley = json_decode($_COOKIE['trolley'], true);
    $array_cantidad = [];
    $array_precios = [];

   

    foreach ($trolley as $key => $value) {
      array_push($array_cantidad, $value[0]);
      $array_precios[$value[0]] = $value[3];
      }
      $total = 0;
      $count = array_count_values($array_cantidad);

      foreach ($array_precios as $key => $value) {
        $total = $total + $value * $count[$key];
        
      }
    $valores_unicos = array_map("unserialize", array_unique(array_map("serialize", $trolley)));



 
}

if (isset($_POST['eliminar_producto'])) {
  $producto_id = $_POST['eliminar_producto'];
  $new_trolley = [];
  foreach ($trolley as $key => $value) {
    if ($value[0] != $producto_id) {
      array_push($new_trolley, $value);
    }
  }
  $cookie_value = json_encode($new_trolley);
  setcookie('trolley', $cookie_value, time()+3600);
  header('Location: ' . $_SERVER['PHP_SELF']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="CSS/menu&footer_style.css">
    <link rel="stylesheet" href="CSS/trolley_style.css">
    <link rel="shortcut icon" href="ASSETS/IMG/INDEX/icons/main-icon.png" type="image/x-icon">
</head>
<?php
require_once 'PHP/parts/header.php';
?>

<!-- 
<div class="productos">
  
</div> -->

<h1>Tu carrito</h1>


<?php

if (isset($_COOKIE['trolley'])){

  $array = [];


  foreach ($valores_unicos as $key => $value) {
    echo '<div class="producto">';
    echo '<h3>' . $value[0]  . '</h3>';
    echo '<img src="' . $value[1] . '.PNG" alt="">';
    echo '<p>' . $value[2]  . '</p>';
    echo '<p> Cantidad: </p>';
    echo '<p id="cantidad">' . $count[$value[0]] . '</p>';
    echo '<p> Precio unitario: </p>';
    echo '<p>' . $value[3]  . '</p>';
    echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
    echo '<input type="hidden" name="eliminar_producto" value="' . $value[0] . '">';
    echo '<button type="submit">Eliminar producto</button>';
    echo '</form>';
    echo '</div>';
  }
#FORM PARA ACTUALIZAR CANTIDAD


  echo '<button class="myButton pagar" id="abrir-modal" name="pagar" onclick="realizarPago()">Pagar ' . $total . '</button>';

}else {
  echo '<h2 class="no_existance">No hay productos en el carrito</h2>';
};
?>


<?php


  if (isset($_POST["finalizar_transaccion"])) {
    $pedido = $sh->show_table("pedido");
    // obtiene los valores necesarios del carrito
    $cookie_user = $_COOKIE['cliente'];
    $user = json_decode($cookie_user, true);
    

    $correo_electronico_cliente = $user['email']; // cambiar por el correo electrónico del cliente
    $fecha_pedido = date('Y-m-d'); // obtiene la fecha actual

  foreach ($valores_unicos as $producto) {

    
    $id_producto = $producto[0]; 
    $cantidad = $count[$producto[0]];
    $precio_unitario = $producto[3];

    // inserta el producto en la tabla Pedido
    $sh->insert_value('Pedido', 'ID_producto, Correo_electronico_cliente, Cantidad, Precio_unitario, Fecha_pedido',
      "{$id_producto}, '{$correo_electronico_cliente}', {$cantidad}, {$precio_unitario}, '{$fecha_pedido}'");
  }
  }

?>


<script>

function realizarPago() {
  if (!document.cookie.includes("cliente")) {
    window.location.href = "start_session.php";
  } else {
    const modal = document.querySelector('.modal-overlay');
    modal.classList.add('activo');
  }
}
</script>



<div class="modal-overlay">
    <div class="modal">
      <h2>Introduce tus datos de pago</h2>

    <label>
      Nombre del titular:
      <input type="text" name="nombre" required>
    </label>
    <label>
      Número de tarjeta:
      <input type="text" name="tarjeta" required>
    </label>
    <label>
      Fecha de vencimiento:
      <input type="date" name="vencimiento" required>
    </label>
    <label>
      CVV:
      <input type="number" name="cvv" required>
    </label>
<?php
 

    echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">

    <input type="submit" class="myButton" name="finalizar_transaccion" value="Pagar '.$total.'">
 
  </form>';

?>

      <button class="close_button" type="button">Cerrar</button>
  </div>
</div>

<script>
const modal = document.querySelector('.modal-overlay');
const abrirModalBtn = document.getElementById('abrir-modal');
const cerrarModalBtn = document.querySelector('.modal button[type="button"]');

abrirModalBtn.addEventListener('click', () => {
  modal.classList.add('activo');
});

cerrarModalBtn.addEventListener('click', () => {
  modal.classList.remove('activo');
});

</script>

<script src="JS/trolley_script.js"></script> 

<?php
  require_once 'PHP/parts/footer.php';
?>