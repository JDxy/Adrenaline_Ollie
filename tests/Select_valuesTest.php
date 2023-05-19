<?php
require_once '../PHP/class/class_shop.php';



function Select_valuesTest() {
    $shop = new Shop();

    // // Caso 1: Debería devolver FALSE si hay un elemento vacío
    assert($shop->select_values('', 'Correo_electronico_cliente', 'cac') == FALSE);

    // // Caso 2: Debería devolver FALSE si hay no lo a encontrado
    assert($shop->select_values('CLIENT', 'Correo_electronico_cliente', '') == FALSE);

    // Caso 3: Debería no devolver FALSE si el valor existe
    assert($shop->select_values('CLIENTE', 'Correo_electronico_cliente', '') != FALSE);
    echo "Todos los tests de la función Select_values han pasado";

}
Select_valuesTest();
?>


