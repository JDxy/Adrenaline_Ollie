<?php
require_once '../PHP/class/class_shop.php';



function exist_elementTest() {
    $shop = new Shop();

    // Caso 1: Debería devolver FALSE si hay un elemento vacío
    assert($shop->exist_element('CLIENTE', 'Correo_electronico_cliente', '') == FALSE);

    // Caso 2: Debería devolver FALSE si hay no a encontrado
    assert($shop->exist_element('CLIENTE', 'Correo_electronico_cliente', 'cac') == FALSE);

    // Caso 3: Debería devolver TRUE si el valor existe
    assert($shop->exist_element('CLIENTE', 'Correo_electronico_cliente', 'cliente1@example.com'));
    echo "Todo ha salido bien";

}
exist_elementTest();
?>
