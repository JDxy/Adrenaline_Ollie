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

<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <h1>Iniciar sesion</h1>
    <input type="text" name="name_email" id="id_email" placeholder="email">
    <input type="password" name="name_password" id="id_password" placeholder="password"> 
    <input class="send" name="send" type="submit" id="id_send" value="send">
    <p>Si no tienes cuenta <a href="register.php">REGISTRATE</a></p>
</form>

<?php
if (isset($_POST['send'])){
    require_once 'PHP/class/class_shop.php';
    $sh = new Shop();

    $name_email = $_POST['name_email'];
    $name_password = $_POST['name_password'];
    
    
    if ($sh->exist_client($name_email, $name_password)){
        $img = $sh->select_values("cliente", "img_cliente", "Correo_electronico_cliente = '{$name_email}'");
        $img = $img[0]['img_cliente'];
        $cliente = array('email' => $name_email, 'contrasena' => $name_password, 'img_cliente' => $img);
        setcookie('cliente', json_encode($cliente), time()+3600, '/');
        $url = 'index.php';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
        exit();
    }else{
        echo "<script>alert('Error al iniciar sesión');</script>";
    }

}
require_once 'PHP/parts/footer.php';

?>