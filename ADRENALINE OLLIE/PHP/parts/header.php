<?php
require_once 'PHP/class/class_shop.php';
$sh = new Shop();
echo '
<body>
    <nav id="menu">
        <input type="checkbox" id="responsive-menu" onclick="updatemenu()"><label></label>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="shop.php" class="dropdown-arrow">PRODUCTOS</a>
                <ul class="sub-menus">
                    <li><a href="http://">SKATES COMPLETOS</a></li>
                    <li><a href="http://">RUEDAS</a></li>
                    <li><a href="http://">TRUCKS</a></li>
                    <li><a href="http://">TABLAS</a></li>
                </ul>
            </li>';

if (!isset($_COOKIE["cliente"])) {
    echo '<li><a href="start_session.php">INICIAR SESION</a></li>';
}

echo '<li><a href="http:trolley.php"><img src="../../ASSETS/IMG/INDEX/anadir-a-la-cesta.png" alt=""></a></li>
      <li><a href="contact.php">CONTACTANOS</a></li>';

      if (isset($_COOKIE["cliente"])) {
        
        $cliente = json_decode($_COOKIE["cliente"], true);
        $email = $cliente['email'];
   
        $cliente = $sh->select_values('cliente', 'Nombre_cliente', "Correo_electronico_cliente = '$email'");
        $nombre = $cliente[0]['Nombre_cliente'];
        echo "<li><a href='user_account.php'>$nombre</a></li>";
    }
    

echo '</ul>
    </nav>
</body>';
?>



