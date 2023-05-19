<?php
require_once '../PHP/class/class_shop.php';
$shop = new Shop();

function total_rows_TEST() {
    global $shop;

    // Caso 1: Debería devolver 0 si se proporcionan argumentos vacíos
    assert($shop->total_rows('') == 0);

    // Caso 2: Debería devolver FALSE si el nombre de la tabla es incorrecto
    assert($shop->total_rows('Product') == FALSE);

    // Caso 3: Debería devolver la cantidad correcta de filas si la tabla existe
    assert($shop->total_rows('Producto') == 10);

    echo "Todos los tests de la función total_rows han pasado";
}

total_rows_TEST();
?>
