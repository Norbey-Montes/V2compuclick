<?php
require_once '../app/models/Persona.php';

class PersonaController {
    private $model;

    public function __construct() {
        $this->model = new Persona();
    }

    public function index() {
        $personas = $this->model->getAll();
        require_once '../app/views/personas/index.php';
    }

    public function crear() {
        require_once '../app/views/personas/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'tipodoc_id' => $_POST['tipodoc_id'],
                'documento' => $_POST['documento'],
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'email' => $_POST['email'],
                'tipopersona_id' => $_POST['tipopersona_id'],
                'ciudad_id' => $_POST['ciudad_id']
            ];
            $this->model->insert($data);
            header('Location: index.php?controller=persona&action=index');
        }
    }

    public function editar($id) {
        $persona = $this->model->getById($id);
        require_once '../app/views/personas/editar.php';
    }

    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'tipodoc_id' => $_POST['tipodoc_id'],
                'documento' => $_POST['documento'],
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'email' => $_POST['email'],
                'tipopersona_id' => $_POST['tipopersona_id'],
                'ciudad_id' => $_POST['ciudad_id']
            ];
            $this->model->update($id, $data);
            header('Location: index.php?controller=persona&action=index');
        }
    }
}
?>