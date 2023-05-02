
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
              </li>
              <li><a href="register.php">REGISTRARSE</a></li>
              <li><a href="start_session.php">INICIAR SESION</a></li>
              <li><a href="http:trolley.php"><img src="../../ASSETS/IMG/INDEX/anadir-a-la-cesta.png" alt=""></a></li>
              <li><a href="http://">CONTACTANOS</a></li>
            </ul>
          </nav>';
?>