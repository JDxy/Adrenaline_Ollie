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
  <title>Document</title>
  <link rel="stylesheet" href="CSS/register_style.css">
  <link rel="stylesheet" href="CSS/menu&footer_style.css">
</head>
<?php
    require_once 'PHP/parts/header.php';
    // require_once 'PHP/class/class_shop.php';
    // $sh = new Shop();
    $nombre = 'cliente';
    $columnas = 'Correo_electronico_cliente, Nombre_cliente, Apellido_cliente, Img_cliente, Telefono, Direccion, CONTRASENA';
    $condiciones = "Correo_electronico_cliente = '" . json_decode($_COOKIE['cliente'], true)['email'] . "'";
    
    $cliente = $sh->select_values($nombre, $columnas, $condiciones);
?>

<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <div>
        <h1><?php echo $cliente[0]['Nombre_cliente'] ?></h1>
        <img src="<?php echo $cliente[0]['Img_cliente'] ?>" alt="">
    </div>
    <div>
    <h1>Informacion personal</h1>

        <p>Correo electrónico: <?php echo $cliente[0]['Correo_electronico_cliente'] ?></p>
        <p>Apellido: <?php echo $cliente[0]['Apellido_cliente'] ?></p>
        <p>Teléfono: <?php echo $cliente[0]['Telefono'] ?></p>
        <p>Dirección: <?php echo $cliente[0]['Direccion'] ?></p>
        <p>Contraseña: <?php echo $cliente[0]['CONTRASENA'] ?></p>
    </div>
    <input type="submit" name='send' value="Cerrar sesion">
</form>


<?php
require_once 'PHP/parts/footer.php';

?>