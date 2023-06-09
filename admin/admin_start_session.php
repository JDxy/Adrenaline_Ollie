<?php
    session_start();
    require '../PHP/class/class_shop.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesion para admin</title>
  <link rel="stylesheet" href="../CSS/form_style.css">
  <link rel="stylesheet" href="../CSS/menu&footer_style.css">

<?php
  require_once '../PHP/parts/header_admin.php';
?>


<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <h1>Iniciar sesion</h1>
    <input type="text" name="name_nombre" id="id_nombre" placeholder="nombre">
    <input type="password" name="name_password" id="id_password" placeholder="password"> 
    <input class="send" type="submit" name="send" id="id_send" value="Enviar">
</form>

<?php
    // Verificar si se ha enviado el formulario
    if(isset($_POST["send"])){
        // Obtener los datos enviados por el formulario
        $name = $_POST["name_nombre"];
        $password = $_POST["name_password"];

        // Crear una instancia de la clase Shop
        $shop = new Shop();

        // Verificar si las credenciales son válidas mediante el método login_admin()
        if ($shop->login_admin($name, $password)){
            // Establecer las variables de sesión para el administrador
            $_SESSION["admin_name"] = $name;
            $_SESSION["password"] = $password;

            // Redireccionar a la página de inicio del administrador
            $url = 'admin_index.php';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
            exit();
        }else{
            // Mostrar mensaje de error si las credenciales son incorrectas
            echo "Error al iniciar sesión";
        }
    }

    // Incluir el archivo de pie de página para el administrador
    require_once '../PHP/parts/footer_admin.php';
?>