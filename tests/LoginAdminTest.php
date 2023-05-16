<?php
require_once '../PHP/class/class_shop.php';
$shop = new Shop();


// Definir los casos de prueba
assert($shop->login_admin('', '') == FALSE);
assert($shop->login_admin('admin2', 'contras2') == FALSE);
assert($shop->login_admin('admin2', 'contrasena1') == FALSE);
assert($shop->login_admin('admin1', 'contrasena1') == True);

ECHO "Todos los test de la funcion login_admin han pasado";


?>