<?php
require_once '../PHP/class/class_shop.php';
$shop = new Shop();

function login_admin_test() {
    global $shop;

    // Caso 1: Debería devolver FALSE si se proporcionan campos vacíos
    assert($shop->login_admin('', '') == FALSE);

    // Caso 2: Debería devolver FALSE si el nombre de usuario es incorrecto y la contraseña no coincide
    assert($shop->login_admin('admin2', 'contras2') == FALSE);

    // Caso 3: Debería devolver FALSE si el nombre de usuario es correcto pero la contraseña no coincide
    assert($shop->login_admin('admin2', 'contrasena1') == FALSE);

    // Caso 4: Debería devolver TRUE si el nombre de usuario y la contraseña son correctos
    assert($shop->login_admin('admin1', 'contrasena1') == TRUE);

    echo "Todos los tests de la función login_admin han pasado";
}

login_admin_test();
?>
