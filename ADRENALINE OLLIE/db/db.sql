DROP DATABASE IF EXISTS adrenaline_ollie;
CREATE DATABASE adrenaline_ollie;
USE adrenaline_ollie;

CREATE TABLE ADMINISTRADORES(
    NOMBRE VARCHAR(50) NOT NULL,
    EMAIL VARCHAR(50) NOT NULL,
    CONTRASENA VARCHAR(50) NOT NULL,
    PRIMARY KEY(NOMBRE)
);

CREATE TABLE Producto (
  ID_producto INT NOT NULL AUTO_INCREMENT,
  Img_producto VARCHAR(50) NOT NULL,
  Nombre_producto VARCHAR(50) NOT NULL,
  Tipo_producto VARCHAR(50) NOT NULL,
  PRIMARY KEY (ID_producto)
);

CREATE TABLE Marca (
  ID_marca INT NOT NULL AUTO_INCREMENT,
  ID_producto INT NOT NULL,
  Marca VARCHAR(50) NOT NULL,
  Descripcion VARCHAR(255),
  PRIMARY KEY (ID_marca),
  FOREIGN KEY (ID_producto) REFERENCES Producto(ID_producto)
);

CREATE TABLE Precio (
  ID_precio INT NOT NULL AUTO_INCREMENT,
  ID_producto INT NOT NULL,
  Precio_unitario DECIMAL(10,2) NOT NULL,
  Cantidad_disponible INT NOT NULL,
  PRIMARY KEY (ID_precio),
  FOREIGN KEY (ID_producto) REFERENCES Producto(ID_producto)
);

CREATE TABLE Cliente (
  Correo_electronico_cliente VARCHAR(100) NOT NULL UNIQUE,
  Nombre_cliente VARCHAR(50) NOT NULL,
  Apellido_cliente VARCHAR(50) NOT NULL,

  Telefono VARCHAR(15) NOT NULL,
  Direccion VARCHAR(255) NOT NULL,
  CONTRASENA VARCHAR(255) NOT NULL,
  PRIMARY KEY (Correo_electronico_cliente)
);

-- CARRITO
CREATE TABLE Pedido (
  ID_PEDIDO INT NOT NULL AUTO_INCREMENT,
  ID_producto INT NOT NULL,
  Correo_electronico_cliente VARCHAR(255) NOT NULL,
  Cantidad INT NOT NULL,
  Precio_unitario DECIMAL(10,2) NOT NULL,
  Fecha_pedido DATE NOT NULL,
  PRIMARY KEY (ID_PEDIDO),
  FOREIGN KEY (ID_producto) REFERENCES Producto(ID_producto),
  FOREIGN KEY (Correo_electronico_cliente) REFERENCES Cliente(Correo_electronico_cliente)
);

INSERT INTO ADMINISTRADORES (NOMBRE, EMAIL, CONTRASENA) VALUES ('Juan', 'juan@example.com', 'secreto123');
INSERT INTO ADMINISTRADORES (NOMBRE, EMAIL, CONTRASENA) VALUES ('Maria', 'maria@example.com', 'contraseña123');
INSERT INTO ADMINISTRADORES (NOMBRE, EMAIL, CONTRASENA) VALUES ('Pedro', 'pedro@example.com', 'password123');


INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('Trucks', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','SKATE');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('Trucks', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','SKATE');

INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('ruedas', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','TABLA');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('ruedas', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','TABLA');

INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('skate_completo', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RUEDAS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('skate_completo', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RUEDAS');

INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('tabla', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','TRUCKS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('tabla', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','TRUCKS');


INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RODAMIENTOS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RODAMIENTOS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RODAMIENTOS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RODAMIENTOS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RODAMIENTOS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RODAMIENTOS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga__1_-removebg-preview.png','RODAMIENTOS');
INSERT INTO Producto (Nombre_producto, Img_producto, Tipo_producto) VALUES ('rodamiento', '../ASSETS/IMG/SKATES/descarga_1_-removebg-preview.png','RODAMIENTOS');




INSERT INTO Marca (ID_producto, Marca, Descripcion) VALUES (1, 'Nike', 'Camiseta de algodón para hombre');
INSERT INTO Marca (ID_producto, Marca, Descripcion) VALUES (2, 'Adidas', 'Camiseta de poliéster para mujer');
INSERT INTO Marca (ID_producto, Marca, Descripcion) VALUES (3, 'Levi Strauss', 'Pantalón vaquero unisex');

INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (1, 20.50, 50);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (2, 35.99, 30);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (3, 99.99, 10);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (4, 20.50, 50);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (5, 35.99, 30);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (6, 99.99, 10);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (7, 20.50, 50);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (8, 35.99, 30);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (7, 20.50, 50);
INSERT INTO Precio (ID_producto, Precio_unitario, Cantidad_disponible) VALUES (8, 35.99, 30);



INSERT INTO Cliente (Correo_electronico_cliente, Nombre_cliente, Apellido_cliente,  Telefono, Direccion, CONTRASENA) VALUES ('juanperez@example.com','Juan', 'Pérez',  '555-1234', 'Calle Falsa 123','dadadada');
INSERT INTO Cliente (Correo_electronico_cliente, Nombre_cliente, Apellido_cliente, Telefono, Direccion, CONTRASENA) VALUES ( 'mariagarcia@example.com','Maria', 'García', '555-5678', 'Avenida Siempreviva 742','dadadada');
INSERT INTO Cliente (Correo_electronico_cliente, Nombre_cliente, Apellido_cliente, Telefono, Direccion, CONTRASENA) VALUES ( 'mariagarcia@example.com','Maria', 'García', '555-5678', 'Avenida Siempreviva 742','dadadada');

INSERT INTO Pedido (ID_producto, ID_cliente, Cantidad, Precio_unitario, Fecha_pedido) VALUES (1, 1, 1, 20.50, '2022-03-15');
INSERT INTO Pedido (ID_producto, ID_cliente, Cantidad, Precio_unitario, Fecha_pedido) VALUES (2, 2, 2,  35.99, '2022-03-14');
INSERT INTO Pedido (ID_producto, ID_cliente, Cantidad, Precio_unitario, Fecha_pedido) VALUES (3,2, 3,  99.99, '2022-03-13');


SELECT * FROM MARCA;
SELECT * FROM PRECIO;
SELECT * FROM Producto;
SELECT * FROM Pedido;
SELECT ID_producto FROM pedido WHERE ID_producto = 1;