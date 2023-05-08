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
?>

<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <h1>Registrarse</h1>

    <input type="email" name="name_email" id="id_email" placeholder="email" required>
    <input type="text" name="name_nombre" id="id_nombre" placeholder="nombre de usuario" required>
    <input type="text" name="name_apellidos" id="id_apellidos" placeholder="apellidos" required>
    <input type="text" name="name_telefono" id="id_telefono" placeholder="telefono" required>
    <input type="text" name="name_direccion" id="id_direccion" placeholder="direccion" required>
    <input type="password" name="name_password" id="id_password" placeholder="password" required> 
    <input class="send" type="submit" name='send' id="id_send" value="register" required>
</form>



<?php
    IF (isset($_POST['send'])){
        require_once 'PHP/class/class_shop.php';
        $sh = new Shop();

        
        $name_nombre = $_POST['name_nombre'];
        $name_apellidos = $_POST['name_apellidos'];
        $name_email = $_POST['name_email'];
        $name_telefono = $_POST['name_telefono'];
        $name_direccion = $_POST['name_direccion'];
        $name_password = $_POST['name_password'];
        
        // Crear una variable para los valores de la consulta
        $values = "'$name_email', '$name_nombre', '$name_apellidos', '$name_telefono', '$name_direccion', '$name_password'";
        
  
        echo $values;
        $columns = 'Correo_electronico_cliente, Nombre_cliente, Apellido_cliente,Telefono, Direccion, CONTRASENA';

        $sh->insert_value('CLIENTE', $columns, $values);
        header('Location: ' . 'start_session.php');
        // $sh->register($_POST['name_dni'], $_POST['name_nombre'], $_POST['name_apellidos'], $_POST['name_email'], $_POST['name_telefono'], $_POST['name_direccion'], $_POST['name_password']);
    }
    require_once 'PHP/parts/footer.php';
?>