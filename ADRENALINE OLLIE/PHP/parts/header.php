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
                    <li><a href="shop.php#Skates">SKATES COMPLETOS</a></li>
                    <li><a href="shop.php#Tablas">TABLAS</a></li>
                    <li><a href="shop.php#Ruedas">RUEDAS</a></li>
                    <li><a href="shop.php#Rodamientos">RODAMIENTOS</a></li>
                    <li><a href="shop.php#Trucks">TRUCKS</a></li>
                </ul>
            </li>';

if (!isset($_COOKIE["cliente"])) {
    echo '<li><a href="start_session.php">INICIAR SESION</a></li>';
}

echo '<li><a href="trolley.php"><img src="ASSETS/IMG/INDEX/anadir-a-la-cesta.png" alt=""></a></li>
      <li><a href="contact.php">CONTACTANOS</a></li>';

      if (isset($_COOKIE["cliente"])) {
        
        $cliente = json_decode($_COOKIE["cliente"], true);
        $email = $cliente['email'];
   
        $cliente = $sh->select_values('cliente', 'Nombre_cliente', "WHERE Correo_electronico_cliente = '$email'");
        $nombre = $cliente[0]['Nombre_cliente'];
        echo "<li><a href='user_account.php'>$nombre</a></li>";
    }
    

echo '</ul>
    </nav>

</body>';
?>



