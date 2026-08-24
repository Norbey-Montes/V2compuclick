<?php
declare(strict_types=1);

class Database {
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;

    public function __construct() {
        // Cargar las variables del archivo .env ubicado en la raíz del proyecto
        $env = parse_ini_file(__DIR__ . '/../.env');

        $this->host = $env['DB_HOST'];
        $this->port = $env['DB_PORT'];
        $this->dbname = $env['DB_NAME'];
        $this->username = $env['DB_USER'];
        $this->password = $env['DB_PASSWORD'];
    }

    public function conectar() {
        return new PDO(
            "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8mb4",
            $this->username,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    public function connect() {
        return $this->conectar();
    }

    public function getConnection() {
        return $this->conectar();
    }
}
?>