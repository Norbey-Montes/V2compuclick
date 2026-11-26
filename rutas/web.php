<?php

$rutas = [
    'GET' => [

        '/' => ['ComputadorController', 'listar'],

        '/api/computador' => ['ComputadorController', 'listarJson'], 

        // Listar (GET all)
        '/' => ['HomeController', 'index'],
        '/computadores' => ['ComputadorController', 'listar'],
        '/clientes'     => ['ClienteController', 'listar'],
        '/proveedores'  => ['ProveedorController', 'listar'],
        '/compras'      => ['CompraController', 'listar'],
        '/personas'     => ['PersonaController', 'listar'],
        '/ventas'       => ['VentaController', 'listar'],
        '/categorias'   => ['CategoriaController', 'listar'],

        // Formularios de creación (GET)
        '/computadores/crear' => ['ComputadorController', 'crear'],
        '/clientes/crear'     => ['ClienteController', 'crear'],
        '/proveedores/crear'  => ['ProveedorController', 'crear'],
        '/compras/crear'      => ['CompraController', 'crear'],
        '/personas/crear'     => ['PersonaController', 'crear'],
        '/ventas/crear'       => ['VentaController', 'crear'],
        '/categorias/crear'   => ['CategoriaController', 'crear'],

        // Formularios de edición / ver (GET)
        '/computadores/editar' => ['ComputadorController', 'editar'],
        '/clientes/editar'     => ['ClienteController', 'editar'],
        '/proveedores/editar'  => ['ProveedorController', 'editar'],
        '/compras/ver'         => ['CompraController', 'ver'],
        '/personas/editar'     => ['PersonaController', 'editar'],
        '/ventas/ver'          => ['VentaController', 'ver'],
        '/categorias/editar'   => ['CategoriaController', 'editar'],
    ],

    'POST' => [
        // Guardar nuevos registros
        '/computadores' => ['ComputadorController', 'guardar'],
        '/clientes'     => ['ClienteController', 'guardar'],
        '/proveedores'  => ['ProveedorController', 'guardar'],
        '/compras'      => ['CompraController', 'guardar'],
        '/personas'     => ['PersonaController', 'guardar'],
        '/ventas'       => ['VentaController', 'guardar'],
        '/categorias'   => ['CategoriaController', 'guardar'],

        // Actualizar registros existentes
        '/computadores/actualizar' => ['ComputadorController', 'actualizar'],
        '/clientes/actualizar'     => ['ClienteController', 'actualizar'],
        '/proveedores/actualizar'  => ['ProveedorController', 'actualizar'],
        '/personas/actualizar'     => ['PersonaController', 'actualizar'],
        '/categorias/actualizar'   => ['CategoriaController', 'actualizar'],

        // Eliminar registros
        '/computadores/eliminar' => ['ComputadorController', 'eliminar'],
        '/clientes/eliminar'     => ['ClienteController', 'eliminar'],
        '/proveedores/eliminar'  => ['ProveedorController', 'eliminar'],
        '/compras/eliminar'      => ['CompraController', 'eliminar'],
        '/personas/eliminar'     => ['PersonaController', 'eliminar'],
        '/ventas/eliminar'       => ['VentaController', 'eliminar'],
        '/categorias/eliminar'   => ['CategoriaController', 'eliminar'],
    ],
];

return $rutas;