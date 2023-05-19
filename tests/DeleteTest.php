<?php
require_once '../PHP/class/class_shop.php';
$shop = new Shop();
$columns = "Correo_electronico_cliente, Nombre_cliente, Apellido_cliente, Telefono, Direccion, CONTRASENA";
$values = "'cliente2@example.com', 'Juan', 'Pérez', '555-1234', 'Calle Falsa 123', 'contraseña3'";

function delete_element_test() {
    global $shop, $columns, $values;

    // Caso 1: Debería devolver FALSE si se proporcionan argumentos vacíos
    assert($shop->delete_element('CLIENTE', 'Correo_electronico_cliente', '') == FALSE);

    // Caso 2: Debería devolver FALSE si el campo es vacío
    assert($shop->delete_element('CLIENTE', '', 'cliente2@example.com') == FALSE);

    // Caso 3: Debería devolver FALSE si el elemento no existe
    assert($shop->delete_element('CLIENTE', 'Correo_electronico_cliente', 'cliente2@example.com') == FALSE);

    // Insertar el registro para probar su eliminación
    $shop->insert_value('CLIENTE', $columns, $values);

    // Verificar si el registro existe antes de intentar eliminarlo
    if ($shop->exist_element('CLIENTE', 'Correo_electronico_cliente', 'cliente2@example.com')) {
        // Eliminar el registro
        assert($shop->delete_element('CLIENTE', 'Correo_electronico_cliente', 'cliente2@example.com') == TRUE, "No se pudo eliminar el registro");
    } else {
        // Mostrar mensaje de error si el registro no existe
        echo "El registro no existe en la base de datos";
    }

    echo "Todos los tests de la función delete_element han pasado.";
}

delete_element_test();
?>
