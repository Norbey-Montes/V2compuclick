# V2compuclick

Sistema web de e-commerce e inventario para la venta de equipos de cómputo, desarrollado bajo el patrón arquitectónico **MVC (Modelo-Vista-Controlador)** con **PHP**, **PDO** y base de datos en **MySQL**.


## Aprendizajes del día 21/09/2026

Durante esta sesión se implementaron las siguientes mejoras en la arquitectura MVC del proyecto **V2compuclick**:

1. **Gestión de Bases de Datos (MySQL / phpMyAdmin):**
   * Creación y manipulación de tablas relacionales con restricciones de clave foránea (`FOREIGN KEY`).
   * Alteración de esquemas de tablas mediante `ALTER TABLE` para reestructurar campos (`preciocompra` y `precioventa`).

2. **Backend PHP (Patrón MVC):**
   * **Modelo (`Computador.php`):** Implementación de consultas SQL asociativas (`JOIN`) para integrar la información de marcas y preparación de sentencias seguras (`PDO`).
   * **Controlador (`ComputadorController.php`):** Manejo de flujo de datos y control de excepciones mediante bloques `try-catch`.
   * **Vista (`index.php`):** Renderizado dinámico de tablas HTML limpias, aplicando la separación de responsabilidades al ocultar datos internos como claves foráneas o stock.

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

