<?php
require_once '../PHP/class/class_shop.php';
$shop = new Shop();


 
// Definir los casos de prueba
// // Caso 1: Debería devolver FALSE si se proporcionan argumentos vacíos
assert($shop->total_rows('') == 0);

// // Caso 2: Debería devolver FALSE si el where es vacío
assert($shop->total_rows('Product') == FALSE);

// Caso 3: Debería devolver TRUE si se elimina el registro correctamente
 assert($shop->total_rows('Producto') == 10);

echo "Todos los tests de la función total_rows han pasado";

?>
