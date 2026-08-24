<?php
require_once __DIR__ . '/../models/Persona.php';

class PersonaController {
    private $model;

    public function __construct() {
        $this->model = new Persona();
    }

    public function index() {
        $personas = $this->model->getAll();
        require_once __DIR__ . '/../views/personas/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/personas/crear.php';
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
            exit;
        }
    }

    public function editar($id) {
        $persona = $this->model->getById($id);
        if (!$persona) {
            http_response_code(404);
            exit('Persona no encontrada.');
        }
        require_once __DIR__ . '/../views/personas/editar.php';
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
            exit;
        }
    }
}
?>
