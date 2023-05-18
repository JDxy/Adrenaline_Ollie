<?php
require_once '../PHP/class/class_shop.php';

function Update_valueTest() {
    $shop = new Shop();
    $columns = "Correo_electronico_cliente, Nombre_cliente, Apellido_cliente, Telefono, Direccion, CONTRASENA";
    $values = "'cliente9@example.com', 'Juan', 'Pérez', '555-1234', 'Calle Falsa 123', 'contrasena3'";
    if ($shop->exist_element('CLIENTE', 'Correo_electronico_cliente', 'cliente9@example.com') == FALSE) {
        $shop->insert_value('CLIENTE', $columns, $values);
    }

    // Caso 1: Actualizar un registro que no existe en la tabla
    assert($shop->update_value('CLIENTE', "Nombre_cliente = 'TEST'", "Correo_electronico_cliente = 'cliente_no_existente@example.com'") == FALSE);

    // Caso 2: Actualizar un registro con valores inválidos
    assert($shop->update_value('CLIENTE', "Nombre_cliente = 'TEST'", "''") == FALSE);

    // Caso 3: Actualizar un registro con valores válidos
    assert($shop->update_value('CLIENTE', "Nombre_cliente = 'TEST'", "Correo_electronico_cliente = 'cliente9@example.com'") == TRUE);

    $shop->delete_element('CLIENTE', 'Correo_electronico_cliente', 'cliente9@example.com');
    echo "Todo ha salido bien.";
}

Update_valueTest();
?>
