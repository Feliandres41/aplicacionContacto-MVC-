<?php
class BaseDeDatos {
    private $servidor = "localhost";
    private $base_datos = "appcontactos";
    private $usuario = "zack";
    private $password = "5204";
    public $conexion;

    public function getConexion() {
        $this->conexion = null;
        try {
            $this->conexion = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->base_datos, $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conexion;
    }
}
?>