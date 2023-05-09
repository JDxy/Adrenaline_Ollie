<?php
  if (isset($_POST["finalizar_transaccion"]) AND isset($_COOKIE["trolley"])) {
    // elimina el carrito
    setcookie('trolley', '', time()-3600);
    header('Location: ' . 'shop.php');
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
if (isset($_POST["finalizar_transaccion"]) AND isset($_COOKIE["trolley"])) {
 $pedido = $sh->show_table("pedido");
 // obtiene los valores necesarios del carrito
 $cookie_user = $_COOKIE['cliente'];
 $user = json_decode($cookie_user, true);
 
 $trolley = json_decode($_COOKIE['trolley'], true);
 $correo_electronico_cliente = $user['email']; // cambiar por el correo electrónico del cliente
 $fecha_pedido = date('Y-m-d'); // obtiene la fecha actual

 foreach ($trolley as $producto) {
   $id_producto = $producto[0]; // el ID del producto se encuentra en el índice 4 del array
   $cantidad = 1;
   $precio_unitario = $producto[3];

   // inserta el producto en la tabla Pedido
   $sh->insert_value('Pedido', 'ID_producto, Correo_electronico_cliente, Cantidad, Precio_unitario, Fecha_pedido',
     "{$id_producto}, '{$correo_electronico_cliente}', {$cantidad}, {$precio_unitario}, '{$fecha_pedido}'");
 }
}
// require 'PHP/class/class_shop.php';

// $sh = new Shop();
// $pedido = $sh->show_table("pedido");

?>

<div class="productos">
  
</div>




<?php
if (isset($_COOKIE['trolley'])){
$trolley = $_COOKIE['trolley'];
$total = 0;

foreach (json_decode($trolley) as $key => $value) {
  echo '<div class="producto">';
  echo '<h3>' . $value[0]  . '</h3>';
  echo '<img src="' . $value[1] . '.PNG" alt="">';
  echo '<p>' . $value[2]  . '</p>';
  echo '<p> Precio: </p>';
  echo '<p>' . $value[3]  . '</p>';
  echo '</div>';
  $total += (float) $value[3];
};



// echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">
// <input type="submit" class="myButton" name="submit" value="Pagar '.$total.'">
// </form>';

echo '<button class="myButton" id="abrir-modal" name="pagar" onclick="realizarPago()">Pagar ' . $total . '</button>';

};

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



<!-- <?php
 

  //   echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">

  //   <input type="submit" class="myButton" id="abrir-modal" name="pagar" value="Pagar">
 
  // </form>';

  // if (isset($_POST["pagar"])) {
  //   if (isset($_COOKIE["cliente"]) == FALSE){
  //     $url = 'index.php';
  //     echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
  //   }
  // }
?> -->
<!-- <button class="myButton" name="pagar" id="abrir-modal">Pagar</button> -->


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

  // if (isset($_POST["submit"]) AND isset($_COOKIE["trolley"])) {
  //   // obtiene los valores necesarios del carrito
  //   $cookie_user = $_COOKIE['cliente'];
  //   $user = json_decode($cookie_user, true);
    
  //   $trolley = json_decode($_COOKIE['trolley'], true);
  //   $correo_electronico_cliente = $user['email']; // cambiar por el correo electrónico del cliente
  //   $fecha_pedido = date('Y-m-d'); // obtiene la fecha actual
  
  //   foreach ($trolley as $producto) {
  //     $id_producto = $producto[0]; // el ID del producto se encuentra en el índice 4 del array
  //     $cantidad = 1;
  //     $precio_unitario = $producto[3];
  
  //     // inserta el producto en la tabla Pedido
  //     $sh->insert_value('Pedido', 'ID_producto, Correo_electronico_cliente, Cantidad, Precio_unitario, Fecha_pedido',
  //       "{$id_producto}, '{$correo_electronico_cliente}', {$cantidad}, {$precio_unitario}, '{$fecha_pedido}'");
  //   }
  
  //   // elimina el carrito
  //   setcookie('trolley', '', time()-3600);
  //   header('Location: ' . $_SERVER['REQUEST_URI']);
  // }
  
?>