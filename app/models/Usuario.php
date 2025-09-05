<?php
class Usuario {
    private $conexion;
    private $nombre_tabla = "usuarios";
    public $id;
    public $nombre;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function iniciarSesion() {
        $consulta = "SELECT id, email FROM " . $this->nombre_tabla . " WHERE email = :email AND password = :password LIMIT 0,1";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrar() {
        $consulta = "INSERT INTO " . $this->nombre_tabla . "(nombre, email, password, fecha_creacion) VALUES (:nombre, :email, :password, NOW())";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        return $stmt->execute();
    }

    public function existeEmail() {
        $consulta = "SELECT id FROM " . $this->nombre_tabla . " WHERE email = :email";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getNombre() {
        $consulta = "SELECT nombre FROM " . $this->nombre_tabla . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila['nombre'] ?? '';
    }
}
?>