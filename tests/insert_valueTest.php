<?php
require_once '../PHP/class/class_shop.php';

function insert_valueTest() {
    $shop = new Shop();
    $columns = "Correo_electronico_cliente, Nombre_cliente, Apellido_cliente, Telefono, Direccion, CONTRASENA";
    $values = "'cliente4@example.com', 'Juan', 'Pérez', '555-1234', 'Calle Falsa 123', 'contraseña3'";

    // Caso 1: Debería devolver FALSE si hay un elemento vacío
    // assert($shop->insert_value('CLIENTE', '', $values) == FALSE);

    // Caso 2: Debería devolver FALSE si el elemento existe
    assert($shop->insert_value('CLIENTE', $columns, $values) == FALSE);

    $shop->delete_element('CLIENTE', 'Correo_electronico_cliente', 'cliente4@example.com');
    // Verificar si el registro existe antes de intentar eliminarlo
    if (!$shop->exist_element('CLIENTE', 'Correo_electronico_cliente', 'cliente4@example.com')) {
        // Eliminar el registro
        assert($shop->insert_value('CLIENTE', $columns, $values) == TRUE, "No se pudo eliminar el registro");
        echo "Todos los tests de la función insert_value han pasado";
    } else {
        // Mostrar mensaje de error si el registro no existe
        echo "El registro no existe en la base de datos";
    }
}

insert_valueTest();
?>


