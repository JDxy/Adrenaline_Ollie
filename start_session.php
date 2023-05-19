<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesion</title>
  <link rel="stylesheet" href="CSS/form_style.css">
  <link rel="stylesheet" href="CSS/menu&footer_style.css">

<?php
    require_once 'PHP/parts/header.php';
?>

<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <h1>Iniciar sesion</h1>
    <input type="text" name="name_email" id="id_email" placeholder="email">
    <input type="password" name="name_password" id="id_password" placeholder="password"> 
    <input class="send" name="send" type="submit" id="id_send" value="send">
    <p>Si no tienes cuenta, <a href="register.php">REGISTRATE AQUI</a></p>
</form>

<?php
if (isset($_POST['send'])){
    // Crear una instancia de la clase Shop
    // require_once 'PHP/class/class_shop.php';
    // $sh = new Shop();

    // Obtener los datos enviados por el formulario
    $name_email = $_POST['name_email'];
    $name_password = $_POST['name_password'];
    
    // Verificar si el cliente existe mediante el método exist_client()
    if ($sh->exist_client($name_email, $name_password)){
        // Crear un array con los datos del cliente
        $cliente = array('email' => $name_email, 'contrasena' => $name_password);
        
        // Crear una cookie con los datos del cliente y establecer su tiempo de expiración (30 días)
        setcookie('cliente', json_encode($cliente), time()+2592000);
        
        // Redireccionar a la página de inicio
        $url = 'index.php';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
        exit();
    }else{
        // Mostrar mensaje de error si las credenciales son incorrectas
        echo "<script>alert('Error al iniciar sesión');</script>";
    }
}

// Incluir el archivo de pie de página
require_once 'PHP/parts/footer.php';
?>