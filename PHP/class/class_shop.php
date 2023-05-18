<?php

class Shop{
    private $conn;
    function __construct(){
  
        
        // require_once 'config.php';
        // $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $config = include 'config.php';

    try {
       
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $this->conn = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        
    }catch(PDOException $error){
        echo $error->getMessage();
    }
    }

    /**
     * Intenta iniciar sesión como administrador con un nombre de usuario y contraseña determinados.
     *
     * @param string $nombre El nombre de usuario del administrador.
     * @param string $password La contraseña del administrador.
     *
     * @return bool Devuelve verdadero si las credenciales del administrador son válidas, false en caso contrario.
     */
    public function login_admin($nombre, $password){
        try {
            $consulta = "SELECT * FROM ADMINISTRADORES WHERE nombre = '{$nombre}' AND contrasena = '{$password}'";
            $sql = $this->conn->prepare($consulta);
            $sql->execute();
            $result = $sql->fetchAll();
    
            if (count($result) > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {
            throw new Exception("Error en la consulta: " . $e->getMessage());
        }
        
    }

    /**
     * Intenta iniciar sesión como cliente con un correo electrónico y contraseña determinados.
     *
     * @param string $email El correo electrónico del cliente.
     * @param string $password La contraseña del cliente.
     *
     * @return bool Devuelve verdadero si las credenciales del cliente son válidas, false en caso contrario.
     */

     public function delete_element($nombre, $where, $id){
        try{
            $consulta = "DELETE FROM ".$nombre." WHERE ".$where." = '".$id."';";
            $sql = $this->conn->prepare($consulta);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return True;
            } else {
                return False;
            }
        } catch(PDOException $e){
            return False;
            echo "Error: " . $e->getMessage();
        }
    }
     
    /**
     * Inserta un valor en una tabla especificada.
     *
     * @param string $nombre El nombre de la tabla en la que se desea insertar un valor.
     * @param string $columns Los nombres de las columnas separados por comas en los que se insertarán los valores.
     * @param string $values Los valores separados por comas que se insertarán en las columnas correspondientes.
     *
     * @return void
     * @throws PDOException Si ocurre un error al ejecutar la consulta SQL.
     */
    public function insert_value($nombre, $columns, $values){
    try {

        $consulta = "INSERT INTO ".$nombre." (".$columns.") VALUES (".$values.");";
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return True;
        } else {
            return False;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return False;
    }
}



    /**
     * Comprueba si existe un registro en una tabla determinada que coincide con una cláusula WHERE y un valor de ID especificados.
     *
     * @param string $nombre El nombre de la tabla donde se realizará la búsqueda.
     * @param string $where La cláusula WHERE que se utilizará en la consulta.
     * @param int $id El valor de ID que se utilizará en la cláusula WHERE.
     *
     * @return bool Devuelve verdadero si se encuentra un registro que coincide con la cláusula WHERE y el valor de ID, false en caso contrario.
     */

    public function exist_element($nombre, $where, $id){
        try{

            $consulta = "SELECT ".$where." FROM ".$nombre." WHERE ".$where." = '".$id."';";
             $sql = $this->conn->prepare($consulta);
            

            $sql->execute();
           
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            if ($result != []){
                return TRUE;
            }else{
                return FALSE;
            }



        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
   
    }


    /**
     * Comprueba si existe un cliente con un correo electrónico y una contraseña determinados.
     *
     * @param string $email El correo electrónico del cliente.
     * @param string $contrasena La contraseña del cliente.
     *
     * @return bool Devuelve verdadero si existe un cliente con el correo electrónico y la contraseña especificados, false en caso contrario.
     */
    public function exist_client($email, $contrasena){
        try{
            $consulta = "SELECT Correo_electronico_cliente, contrasena FROM cliente WHERE Correo_electronico_cliente = :email AND contrasena = :contrasena";
            $sql = $this->conn->prepare($consulta);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':contrasena', $contrasena);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if (!empty($result)){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    
    /**
     * Devuelve el número máximo de filas de una tabla especificada.
     *
     * @param string $nombre El nombre de la tabla de la que se desea obtener el número máximo de filas.
     *
     * @return int El número máximo de filas de la tabla especificada.
     * @throws PDOException Si ocurre un error al ejecutar la consulta SQL.
     */
    public function total_rows($nombre) {
        try {
            $consulta = "SELECT MAX(ID_" . $nombre . ") as max_id FROM " . $nombre;
            $sql = $this->conn->prepare($consulta);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return $result['max_id'];
        } catch(PDOException $e) {
            return FALSE;
            echo "Error: " . $e->getMessage();
        }
    }
    


    /**
     * Actualiza los valores de una tabla
     *
     * @param string $nombre Nombre de la tabla
     * @param string $columns_values Valores a actualizar en formato "columna1 = valor1, columna2 = valor2, ..."
     * @param string $where_clause Cláusula WHERE en formato "columna = valor"
     *
     * @return void
     */

    public function update_value($nombre, $columns_values, $where_clause){
        try{
            
                $consulta = "UPDATE ".$nombre." SET ".$columns_values." WHERE ".$where_clause.";";
                $sql = $this->conn->prepare($consulta);
                echo $consulta;

                
                $sql->execute();
                $affected_rows = $sql->rowCount();
                if ($affected_rows > 0) {
                    return TRUE;
                } else {
                    return FALSE;
                }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            return FALSE;
        }
    }    

    /**
     * Obtiene el costo de un producto dado su ID
     *
     * @param int $id ID del producto
     *
     * @return float|null Precio unitario del producto o null si no se encuentra el producto
     */
    public function obtain_cost($id){
        try{
            $consulta = "SELECT CAST(Precio_unitario AS CHAR) AS Precio_unitario
                         FROM Precio
                         INNER JOIN Producto
                         ON Precio.ID_producto = Producto.ID_producto
                         WHERE Producto.id_producto = :id";
    
            $sql = $this->conn->prepare($consulta);
            $sql->bindParam(':id', $id);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return isset($result["Precio_unitario"]) ? $result["Precio_unitario"] : null;
    
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Muestra todos los registros de una tabla.
     *
     * @param string $nombre El nombre de la tabla.
     * @return array|null Los registros de la tabla o null si hay un error.
     */
    public function show_table($nombre){
        try{
            $sql = $this->conn->prepare("SELECT * FROM ".$nombre.";");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        
    }

    /**
     * Muestra los registros de una tabla que cumplan una condición.
     *
     * @param string $nombre El nombre de la tabla.
     * @param string $columnas Las columnas que se desean mostrar.
     * @param string $condiciones Las condiciones que deben cumplir los registros.
     * @return array|null Los registros de la tabla que cumplen la condición o null si hay un error.
     */
    public function select_values($nombre, $columnas, $condiciones){
        try{
            $sql = "SELECT ".$columnas." FROM ".$nombre;
            if ($condiciones != ''){
                $sql .= " ".$condiciones;
            }

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
      
        }catch(PDOException $e){
            // echo "Error: " . $e->getMessage();
            return FALSE;
        }
    }


    /**
     * Muestra los productos de un tipo determinado.
     *
     * @param string $tipos_productos El tipo de productos a mostrar.
     * @return void
     */
    function show_products($tipos_productos){
        $email = "";
        if(isset($_COOKIE['cliente'])) {
            $cliente = json_decode($_COOKIE['cliente'], true);
            $email = $cliente['email'];
        }
    
        $productos = $this->show_table("producto");
        
        foreach ($productos as $producto) {
            if ($producto['Tipo_producto'] == $tipos_productos) {
                $precio = $this->obtain_cost($producto["ID_producto"]);
                $descripcion = $this->select_values("marca", "Descripcion", "Where ID_producto = {$producto["ID_producto"]};");
                $cantidad = $this->select_values("precio", "Cantidad_disponible", "Where ID_producto = {$producto["ID_producto"]};");
                
          
                
                echo '<div class=" producto">';
                

                    echo '<img src="' . substr($producto['Img_producto'],3) . '" alt="">';
                    echo '<h3>' . $producto['Nombre_producto'] . '</h3>';
                    echo '<p> Precio: </p>';
                    echo '<p id="precio" name="'.$precio.'">' . $precio . '€</p>';
                    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
                    echo '<input type="hidden" name="email" value="' . $email . '">';
                    echo '<input type="hidden" name="ID_producto" value="' . $producto['ID_producto'] . '">';
                    echo '<input type="hidden" name="Img_producto" value="' . $producto['Img_producto'] . '">';
                    echo '<input type="hidden" name="Nombre_producto" value="' . $producto['Nombre_producto'] . '">';
                    echo '<input type="hidden" name="precio" value="' . $precio . '">';
                    echo '<input type="submit" value="Añadir al carrito" name="add_trolley" class="myButton"></input>';
                    echo "</form>";
                    // echo  '<input type="submit" class="myButton" value="Ver mas" name="show_modal" id="abrir-modal"></input>';
                    echo '<button class="myButton" data-modal="modal'.$producto["ID_producto"].'">Ver más</button>';

                echo '</div>';
                
                echo '

                <div id="modal'.$producto["ID_producto"].'" class="modal overlay">
                <div class="modal-content">
                    <span class="close">X</span>
                 
                        <ul>
                        <li><h2>'.$producto['Nombre_producto'].'</h2></li>
                        <li><img src="'.$producto['Img_producto'].'" alt=""></li>
                        <li>Precio: '.$precio.'€</li>
                  
                        <li>Cantidad disponible: 
                        '.$cantidad[0]["Cantidad_disponible"].'</li>
                     
                        <li>Descripcion:</li>
                        <li>'.$descripcion[0]["Descripcion"].'</li>
                        </ul>
                   
                </div>
                </div>
                ';   
       
            }
        }  
    }

}


?>




