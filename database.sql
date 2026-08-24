CREATE DATABASE IF NOT EXISTS v2compuclick
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE v2compuclick;

CREATE TABLE IF NOT EXISTS marca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS tipodoc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS tipopago (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS tipopersona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS departamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS ciudad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    departamento_id INT NULL,
    CONSTRAINT fk_ciudad_departamento
        FOREIGN KEY (departamento_id) REFERENCES departamento(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS persona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipodoc_id INT NOT NULL,
    documento VARCHAR(30) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    direccion VARCHAR(150) NULL,
    telefono VARCHAR(30) NULL,
    email VARCHAR(120) NULL,
    tipopersona_id INT NOT NULL,
    ciudad_id INT NOT NULL,
    UNIQUE KEY uq_persona_documento (documento),
    CONSTRAINT fk_persona_tipodoc
        FOREIGN KEY (tipodoc_id) REFERENCES tipodoc(id)
        ON UPDATE CASCADE,
    CONSTRAINT fk_persona_tipopersona
        FOREIGN KEY (tipopersona_id) REFERENCES tipopersona(id)
        ON UPDATE CASCADE,
    CONSTRAINT fk_persona_ciudad
        FOREIGN KEY (ciudad_id) REFERENCES ciudad(id)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    UNIQUE KEY uq_clientes_persona (persona_id),
    CONSTRAINT fk_clientes_persona
        FOREIGN KEY (persona_id) REFERENCES persona(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS proveedor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    empresa VARCHAR(150) NOT NULL,
    CONSTRAINT fk_proveedor_persona
        FOREIGN KEY (persona_id) REFERENCES persona(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS computador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca_id INT NOT NULL,
    modelo VARCHAR(120) NOT NULL,
    procesador VARCHAR(120) NOT NULL,
    ram VARCHAR(60) NOT NULL,
    almacenamiento VARCHAR(100) NOT NULL,
    precio DECIMAL(12,2) NOT NULL DEFAULT 0,
    stock INT NOT NULL DEFAULT 0,
    CONSTRAINT fk_computador_marca
        FOREIGN KEY (marca_id) REFERENCES marca(id)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS venta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    tipopago_id INT NOT NULL,
    fecha DATETIME NOT NULL,
    total DECIMAL(12,2) NOT NULL DEFAULT 0,
    CONSTRAINT fk_venta_cliente
        FOREIGN KEY (cliente_id) REFERENCES clientes(id)
        ON UPDATE CASCADE,
    CONSTRAINT fk_venta_tipopago
        FOREIGN KEY (tipopago_id) REFERENCES tipopago(id)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS descripventa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT NOT NULL,
    computador_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(12,2) NOT NULL,
    CONSTRAINT fk_descripventa_venta
        FOREIGN KEY (venta_id) REFERENCES venta(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_descripventa_computador
        FOREIGN KEY (computador_id) REFERENCES computador(id)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS compra (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proveedor_id INT NOT NULL,
    fecha DATETIME NOT NULL,
    total DECIMAL(12,2) NOT NULL DEFAULT 0,
    CONSTRAINT fk_compra_proveedor
        FOREIGN KEY (proveedor_id) REFERENCES proveedor(id)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS descripcompra (
    id INT AUTO_INCREMENT PRIMARY KEY,
    compra_id INT NOT NULL,
    computador_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(12,2) NOT NULL,
    CONSTRAINT fk_descripcompra_compra
        FOREIGN KEY (compra_id) REFERENCES compra(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_descripcompra_computador
        FOREIGN KEY (computador_id) REFERENCES computador(id)
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO marca (id, nombre) VALUES
    (1, 'Dell'),
    (2, 'HP'),
    (3, 'Lenovo');

INSERT IGNORE INTO tipodoc (id, nombre) VALUES
    (1, 'CC'),
    (2, 'NIT'),
    (3, 'CE');

INSERT IGNORE INTO tipopago (id, nombre) VALUES
    (1, 'Efectivo'),
    (2, 'Tarjeta'),
    (3, 'Transferencia');

INSERT IGNORE INTO tipopersona (id, nombre) VALUES
    (1, 'Cliente'),
    (2, 'Proveedor');

INSERT IGNORE INTO departamento (id, nombre) VALUES
    (1, 'Cundinamarca'),
    (2, 'Antioquia');

INSERT IGNORE INTO ciudad (id, nombre, departamento_id) VALUES
    (1, 'Bogota', 1),
    (2, 'Medellin', 2);
