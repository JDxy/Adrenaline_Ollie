<?php
 if (isset($_POST['send'])){
    setcookie('cliente', '', time()-3600);
    header('Location: ' . 'start_session.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi cuenta</title>
  <link rel="stylesheet" href="CSS/form_style.css">
  <link rel="stylesheet" href="CSS/menu&footer_style.css">
  <link rel="shortcut icon" href="ASSETS/IMG/INDEX/icons/main-icon.png" type="image/x-icon">
</head>
<?php
    require_once 'PHP/parts/header.php';
    // require_once 'PHP/class/class_shop.php';
    // $sh = new Shop();
    $nombre = 'cliente';
    $columnas = 'Correo_electronico_cliente, Nombre_cliente, Apellido_cliente, Telefono, Direccion, CONTRASENA';
    $condiciones = "WHERE Correo_electronico_cliente = '" . json_decode($_COOKIE['cliente'], true)['email'] . "'";
  
    $cliente = $sh->select_values($nombre, $columnas, $condiciones);
?>

<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <div>
        <h1><?php echo $cliente[0]['Nombre_cliente'] ?></h1>
    </div>
    <div>
    <h1>Informacion personal</h1>

        <p>Correo electrónico: <?php echo $cliente[0]['Correo_electronico_cliente'] ?></p>
        <p>Apellido: <?php echo $cliente[0]['Apellido_cliente'] ?></p>
        <p>Teléfono: <?php echo $cliente[0]['Telefono'] ?></p>
        <p>Dirección: <?php echo $cliente[0]['Direccion'] ?></p>
        <p>Contraseña: <?php echo $cliente[0]['CONTRASENA'] ?></p>
    </div>
    <h2>Compras realizadas</h2>
    <div class="compras">
        <?php
        $correo = $cliente[0]['Correo_electronico_cliente'];
        $compras = $sh->select_values("Pedido", "*", "WHERE Correo_electronico_cliente = '$correo'");
        $producto = $sh->select_values("Producto", "*", "WHERE ID_producto = '$correo'");
        ?>
        <div>
            <table>
                <thead>
                    <tr>
             
                        <th>ID_producto</th>
                        <th>Cantidad</th>
                        <th>Precio_unitario</th>
                        <th>Fecha_pedido</th>
                        <!-- <th>Acciones</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $compra) { ;?>
                        <tr>
                            
                            <td><?php echo $compra['ID_producto'] ?></td>
                            <td><?php echo $compra['Cantidad'] ?></td>
                            <td><?php echo $compra['Precio_unitario'] ?></td>
                            <td><?php echo $compra['Fecha_pedido'] ?></td>
                            <!-- <input type="hidden" name="name_idpedido" value="<?php echo $compra['ID_PEDIDO'] ?>">
                            <td><input type="submit" name="cancelar" value="Cancelar"></td> -->
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>  

    <input type="submit" name='send' value="Cerrar sesion">
</form>



<?php

if (isset($_POST["cancelar"])) {
    $id_pedido = $_POST['name_idpedido'];
    // $sh->delete_element('Pedido','PEDIDO',$id_pedido);
}



require_once 'PHP/parts/footer.php';



// Redirigir al usuario a la página del perfil del cliente después de eliminar la compra



?>