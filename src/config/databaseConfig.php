<?php
namespace Project\config;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Conexion {
    
    private $_connection;
    private static $_instance;

    private $_host;
    private $_port;
    private $_username;
    private $_password;
    private $_database;

    public function __construct(){
        $this->_host = $_ENV['DB_HOST'];
        $this->_port = $_ENV['DB_PORT'];
        $this->_username = $_ENV['DB_USERNAME'];
        $this->_password = $_ENV['DB_PASSWORD'];
        $this->_database = $_ENV['DB_DATABASE'];

        try {
            $dsn = "pgsql:host={$this->_host};port={$this->_port};dbname={$this->_database}";
            $this->_connection = new PDO($dsn, $this->_username, $this->_password);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            trigger_error("Error al conectar con la Base de datos: " . $e->getMessage(), E_USER_ERROR);
        }
    }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection() {
        return $this->_connection;
    }

}