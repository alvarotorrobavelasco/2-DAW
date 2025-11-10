<?php
class Conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "";
    private $base_datos = "instituto";
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
            
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
            
            $this->conexion->set_charset("utf8");
        } catch (Exception $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function cerrarConexion() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }
}
?>