<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController
{
    public function index()
    {
        $clienteModel = new Cliente();
        $clientes = $clienteModel->getAll();

        require_once __DIR__ . '/../views/clientes/index.php';
    }
}