# V2compuclick

Sistema web de e-commerce e inventario para la venta de equipos de cómputo, desarrollado bajo el patrón arquitectónico **MVC (Modelo-Vista-Controlador)** con **PHP**, **PDO** y base de datos en **MySQL**.

## Estructura del Proyecto

El sistema está organizado de la siguiente manera:

```text
V2compuclick/
├── app/
│   ├── controllers/
│   │   ├── PersonaController.php
│   │   ├── ClienteController.php
│   │   ├── ProveedorController.php
│   │   ├── ComputadorController.php
│   │   ├── VentaController.php
│   │   ├── CompraController.php
│   │   └── CatalogoController.php
│   ├── models/
│   │   ├── Persona.php
│   │   ├── Cliente.php
│   │   ├── Proveedor.php
│   │   ├── Computador.php
│   │   ├── Venta.php
│   │   ├── Compra.php
│   │   ├── Ubicacion.php
│   │   └── Parametrica.php
│   └── views/
│       ├── personas/
│       ├── clientes/
│       ├── proveedores/
│       ├── computadores/
│       ├── ventas/
│       ├── compras/
│       └── parametros/
├── config/
│   └── Database.php
├── public/
│   └── index.php
└── README.md
Tecnologías Utilizadas
Lenguaje: PHP (Programación Orientada a Objetos)

Base de Datos: MySQL (XAMPP / phpMyAdmin)

Conexión: PDO con patrón Singleton

Arquitectura: Modelo-Vista-Controlador (MVC)