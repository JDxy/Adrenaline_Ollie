<?php
    session_start();
    require '../PHP/class/class_shop.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/register_style.css">
  <link rel="stylesheet" href="../CSS/menu&footer_style.css">
</head>
<?php
  require_once '../PHP/parts/header_admin.php';
?>


<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <h1>Editar producto</h1>
    <input type="text" name="name_nombre" id="id_nombre" placeholder="nombre">
    <input type="text" name="name_imagen" id="id_imagen" placeholder="imagen">
    <input type="text" name="name_tipo" id="id_tipo" placeholder="tipo">

    <input type="text" name="name_precio" id="id_precio" placeholder="precio">
    <input type="text" name="name_stock" id="id_stock" placeholder="stock">

    <input type="text" name="name_marca" id="id_marca" placeholder="marca">
    <input type="text" name="name_descripcion" id="id_descripcion" placeholder="descripcion">

    <input class="send" type="submit" name="send" id="id_send" value="Enviar">

</form>

<?php
    if(isset($_POST["send"])){

        if (isset($_POST["send"])) {
            $shop = new Shop();
            $total = $_GET["id_producto"];
            $nombre_tabla = "Producto";
            $columnas_valores = "";
        
            if ($_POST["name_imagen"] != "") {
                $columnas_valores .= "Img_producto='{$_POST["name_imagen"]}', ";
            }
        
            if ($_POST["name_nombre"] != "") {
                $columnas_valores .= "Nombre_producto='{$_POST["name_nombre"]}', ";
            }
        
            if ($_POST["name_tipo"]  != "") {
                $columnas_valores .= "Tipo_producto='{$_POST["name_tipo"]}', ";
            }
        
            $columnas_valores = rtrim($columnas_valores, ", "); // Eliminar la última coma y espacio en blanco
        
            $condicion = "ID_producto = {$total}";
            $shop->update_value($nombre_tabla, $columnas_valores, $condicion);
        
            $nombre_tabla = "Marca";
            $columnas_valores = "";
        
            if ($_POST["name_marca"] != "") {
                $columnas_valores .= "Marca='{$_POST["name_marca"]}', ";
            }
        
            if ($_POST["name_descripcion"] != "") {
                $columnas_valores .= "Descripcion='{$_POST["name_descripcion"]}', ";
            }
        
            $columnas_valores = rtrim($columnas_valores, ", "); // Eliminar la última coma y espacio en blanco
        
            $condicion = "ID_producto={$total}";
            $shop->update_value($nombre_tabla, $columnas_valores, $condicion);
        
            $nombre_tabla = "Precio";
            $columnas_valores = "";
        
            if ($_POST["name_precio"] != "") {
                $columnas_valores .= "Precio_unitario='{$_POST["name_precio"]}', ";
            }
        
            if ($_POST["name_stock"]  != "") {
                $columnas_valores .= "Cantidad_disponible='{$_POST["name_stock"]}', ";
            }
        
            $columnas_valores = rtrim($columnas_valores, ", "); // Eliminar la última coma y espacio en blanco
        
            $condicion = "ID_producto = {$total}";
            $shop->update_value($nombre_tabla, $columnas_valores, $condicion);
        
            header("Location: admin_show_table_products.php");
        }
        
    
     

    }

    require_once '../PHP/parts/footer.php';
?>