<?php
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
        $cliente = json_decode($_COOKIE["cliente"]);
      
        echo '<li><a href="">Tu cuenta <img src="' . $cliente->img_cliente . '"></a></li>';
    }
    

echo '</ul>
    </nav>
</body>';
?>
